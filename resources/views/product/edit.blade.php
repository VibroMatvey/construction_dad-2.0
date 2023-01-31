@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать товар</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-6 mx-auto mt-2">
                    <div class="card-body">
                        <form action="{{route('product.update', $product->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input name="title" type="text" value="{{$product->title ?? old('title')}}"
                                       class="form-control"
                                       id="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input name="description" type="text"
                                       value="{{$product->description ?? old('description')}}"
                                       class="form-control"
                                       id="description">
                            </div>
                            <div class="form-group">
                                <label for="content">Характеристики</label>
                                <input name="content" type="text" value="{{$product->content ?? old('content')}}"
                                       class="form-control"
                                       id="content">
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input name="price" type="number" min="1" step="1"
                                       value="{{$product->price ?? old('price')}}" class="form-control"
                                       id="price">
                            </div>
                            <div class="form-group">
                                <label for="count">Кол-во</label>
                                <input name="count" type="number" min="1" step="1"
                                       value="{{$product->count ?? old('count')}}"
                                       class="form-control"
                                       id="count">
                            </div>
                            <div class="form-group">
                                <label for="is_published">Публикация</label>
                                <select id="is_published" name="is_published" class="form-control" style="width: 100%;">
                                    <option {{ $product->is_published == 1 ? 'selected' : '' }} value="1">Опубликовано
                                    </option>
                                    <option {{ $product->is_published == 0 ? 'selected' : '' }} value="0">В архиве
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Категория</label>
                                <select id="category" name="category_id" class="form-control" style="width: 100%;">
                                    <option selected="selected" disabled>Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option
                                            {{ $category->id == $product->category_id ? 'selected' : '' }} value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tags">Тэги</label>
                                <select id="tags" name="tags[]" class="tags" multiple="multiple"
                                        data-placeholder="Выберите тэги" style="width: 100%;" tabindex="-1"
                                        aria-hidden="true">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input name="preview_img" type="file" class="custom-file-input"
                                           id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02"
                                           aria-describedby="inputGroupFileAddon02">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="inputGroupFileAddon02">Загрузить</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </form>
                        @if ($errors->any())
                            <ul class="list-group mt-3">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
