@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 d-flex justify-content-between">
                <div class="">
                    <h1 class="m-0">Тэг</h1>
                </div><!-- /.col -->
                <div class="d-flex">
                    <a href="{{route('tag.edit', $tag->id)}}">
                        <button class="btn btn-primary">
                            <span class="mr-2">Редактировать</span>
                            <i class="fas fa-pen"></i>
                        </button>
                    </a>
                    <form action="{{route('tag.delete', $tag->id)}}" method="POST" class="ml-2">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <span class="mr-2">Удалить</span>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-3 mx-auto mt-2">
                    <div class="card-body">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                </tr>
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->title }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
