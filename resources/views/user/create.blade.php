@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
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
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="surname">Фамилия</label>
                                <input  value="{{ old('surname') }}" name="surname" type="text" class="form-control"
                                        id="surname">
                            </div>
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Отчество</label>
                                <input value="{{ old('lastname') }}" name="lastname" type="text" class="form-control"
                                       id="lastname">
                            </div>
                            <div class="form-group">
                                <label for="age">Возраст</label>
                                <input value="{{ old('age') }}" name="age" type="number" class="form-control"
                                       id="age">
                            </div>
                            <div class="form-group">
                                <label for="gender">Пол</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option {{ old('gender') == 1 ? 'selected' : ''  }} value="1">Мужской</option>
                                    <option {{ old('gender') == 2 ? 'selected' : ''  }} value="2">Женский</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Электронная почта</label>
                                <input value="{{ old('email') }}" name="email" type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input value="{{ old('password') }}" name="password" type="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Повторите пароль</label>
                                <input value="{{ old('password') }}" name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input value="{{ old('address') }}" name="address" type="text" class="form-control"
                                       id="address">
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
