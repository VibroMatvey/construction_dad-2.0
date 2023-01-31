@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('category.create') }}" class="float-right">
                        <button class="btn btn-success">
                            <span class="mr-2">Добавить</span>
                            <i class="fas fa-plus"></i>
                        </button>
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
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td><a href="{{route('category.show', $category->id)}}">{{ $category->title }}</a></td>
                                            <td class="d-flex">
                                                <a href="{{route('category.edit', $category->id)}}">
                                                    <button class="btn btn-primary">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                </a>
                                                <form action="{{route('category.delete', $category->id)}}" method="POST" class="ml-2">
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
