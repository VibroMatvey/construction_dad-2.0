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
                <div class="card col-3 mx-auto mt-2">
                    <div class="card-body">
                        <form action="{{route('product.update', $product->id)}}" method="POST">
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
                                <input name="description" type="text" value="{{$product->description ?? old('description')}}"
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
                                <input name="price" type="number" min="16" max="100" step="1"
                                       value="{{$product->price ?? old('price')}}" class="form-control"
                                       id="price">
                            </div>
                            <div class="form-group">
                                <label for="count">Кол-во</label>
                                <input name="count" type="text" value="{{$product->count ?? old('count')}}"
                                       class="form-control"
                                       id="count">
                            </div>
                            <div class="form-group d-flex">
                                <label for="is_published">Опубликовано</label>
                                <input name="is_published" type="checkbox" value="{{$product->is_published ?? old('is_published')}}"
                                       class="form-control"
                                       id="is_published">
                            </div>
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
