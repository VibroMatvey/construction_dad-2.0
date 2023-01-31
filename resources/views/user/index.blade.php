@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('user.create') }}" class="float-right">
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
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Отчество</th>
                                    <th>Возраст</th>
                                    <th>Пол</th>
                                    <th>Эл. почта</th>
                                    <th>Адрес</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->surname }}</td>
                                            <td><a href="{{route('user.show', $user->id)}}">{{ $user->name }}</a></td>
                                            <td>{{ $user->lastname }}</td>
                                            <td>{{ $user->age }}</td>
                                            <td>{{ $user->genderTitle }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td class="d-flex">
                                                <a href="{{route('user.edit', $user->id)}}">
                                                    <button class="btn btn-primary">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                </a>
                                                <form action="{{route('user.delete', $user->id)}}" method="POST" class="ml-2">
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
