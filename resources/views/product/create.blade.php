@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить товар</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-lg-6 mx-auto mt-2">
                    <div class="card-body">
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between" for="title">Наименование
                                    @error('title')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <input value="{{ old('title') }}" name="title" type="text"
                                       class="form-control @error('title') is-invalid @enderror"
                                       id="title">
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between" for="description">Описание
                                    @error('description')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <input value="{{ old('description') }}" name="description" type="text"
                                       class="form-control @error('description') is-invalid @enderror" id="description">
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between" for="content">Характеристики
                                    @error('content')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <textarea value="{{ old('content') }}" name="content" type="text"
                                          class="form-control @error('content') is-invalid @enderror"
                                          id="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between" for="price">Цена
                                    @error('price')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <input value="{{ old('price') }}" name="price" type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       id="price">
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between" for="count">Кол-во
                                    @error('count')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <input value="{{ old('count') }}" min="1" step="1" name="count" type="number"
                                       class="form-control @error('count') is-invalid @enderror"
                                       id="count">
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between" for="category">Категория
                                    @error('category_id')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <select id="category" name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror"
                                        style="width: 100%;">
                                    <option selected="selected" disabled>Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
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
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between" for="exampleInputFile">Выберите
                                    изображение
                                    @error('preview_img')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="preview_img" type="file"
                                               class="custom-file-input @error('preview_img') is-invalid @enderror"
                                               id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
