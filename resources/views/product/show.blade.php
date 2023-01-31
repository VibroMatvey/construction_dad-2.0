@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 d-flex justify-content-between">
                <div class="">
                    <h1 class="m-0">Товар</h1>
                </div><!-- /.col -->
                <div class="d-flex">
                    <a href="{{route('product.edit', $user->id)}}">
                        <button class="btn btn-primary">
                            <i class="fas fa-pen"></i>
                        </button>
                    </a>
                    <form action="{{route('product.delete', $user->id)}}" method="POST" class="ml-2">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
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
                <div class="card mx-auto mt-2">
                    <div class="card-body">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Фамилия</th>
                                    <td>{{ $user->surname }}</td>
                                </tr>
                                <tr>
                                    <th>Имя</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Отчество</th>
                                    <td>{{ $user->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>Возраст</th>
                                    <td>{{ $user->age }}</td>
                                </tr>
                                <tr>
                                    <th>Пол</th>
                                    <td>{{ $user->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Эл. почта</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Адрес</th>
                                    <td>{{ $user->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
