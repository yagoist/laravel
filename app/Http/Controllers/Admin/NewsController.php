<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('admin.news.index', [
            'newsList' => $newsQueryBuilder->getNewsWithPagination()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder,): View
    {
        return \view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
           'title' => 'required'
        ]);

        $news = new News($request->except('_token', 'category_id'));

        if($news->save()) {
            return \redirect()->route('admin.news.index')->with('success', 'Новость добавлена');
        }

        return \back()->with('error', 'Не удалось сохранить новость');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->except('_token', 'category_ids'));
        if($news->save()) {
            $news->categories()->sync($request->input('category_ids'));
            return \redirect()->route('admin.news.index')->with('success', 'Новость изменена');
        }
        return \back()->with('error', 'Не удалось сохранить новость');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function save()
    {
    }
}
