@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_ids">Категория</label>
                <select class="form-control" name="category_ids[]" id="category_ids" multiple>
                    <option value="0"> --Выбрать-- </option>
                    @foreach($categories as $category)
                        <option
                            @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif
                        value="{{ $category->id }}">
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" value="{{ $news->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" id="author" name="author" value="{{ $news->author }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    @foreach($statuses as $status)
                        <option @if($news->$status === $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description">{!! $news->description !!}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
