<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index() {
        return $this->getNews();
    }

    public function show(int $id) {
        return $this->getNews($id);
    }
}
