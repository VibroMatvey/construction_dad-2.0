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
                <div class="card col-6 mx-auto mt-2">
                    <div class="card-body">
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="surname">Фамилия</label>
                                <input  value="{{ old('surname') }}" name="surname" type="text" class="form-control"
                                        id="surname">
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between" for="name">Имя
                                    @error('name')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
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
                                <label class="d-flex align-items-center justify-content-between" for="email">Электронная почта
                                    @error('email')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <input value="{{ old('email') }}" autocomplete="off" name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email">
                            </div>
                            <div class="form-group" >
                                <label class="d-flex align-items-center justify-content-between" for="password">Пароль
                                    @error('password')
                                    <span class="badge badge-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <input name="password" autocomplete="off" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Повторите пароль</label>
                                <input name="password_confirmation" autocomplete="off" type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation">
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
