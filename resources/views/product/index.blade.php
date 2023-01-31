@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Товары</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('product.create') }}" class="float-right">
                        <button class="btn btn-success"><i class="fas fa-plus"></i></button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Характеристики</th>
                                    <th>Кол-во</th>
                                    <th>Опубликовано</th>
                                    <th>Категория</th>
                                    <th>Изображение</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td><a href="{{route('user.show', $product->id)}}">{{ $product->title }}</a></td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->content }}</td>
                                            <td>{{ $product->count }}</td>
                                            <td>{{ $product->PublishedTitle }}</td>
                                            <td>{{ $product->category_id }}</td>
                                            <td>
                                                <img style="width: 100px" src="{{ asset('storage/' . $product->preview_img) }}" alt="">
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{route('product.edit', $product->id)}}">
                                                    <button class="btn btn-primary">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                </a>
                                                <form action="{{route('product.delete', $product->id)}}" method="POST" class="ml-2">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
