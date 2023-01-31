@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя</h1>
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
                        <form action="{{route('user.update', $user->id)}}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input name="name" type="text" value="{{$user->name ?? old('name')}}" class="form-control"
                                       id="name">
                            </div>
                            <div class="form-group">
                                <label for="surname">Фамилия</label>
                                <input name="surname" type="text" value="{{$user->surname ?? old('surname')}}" class="form-control"
                                       id="surname">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Отчество</label>
                                <input name="lastname" type="text" value="{{$user->lastname ?? old('lastname')}}" class="form-control"
                                       id="lastname">
                            </div>
                            <div class="form-group">
                                <label for="age">Возраст</label>
                                <input name="age" type="number" min="16" max="100" step="1" value="{{$user->age ?? old('age')}}" class="form-control"
                                       id="age">
                            </div>
                            <div class="form-group">
                                <label for="gender">Пол</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option {{ $user->age || old('age') == 1 ? 'selected' : '' }} value="1">Мужской</option>
                                    <option {{ $user->age || old('age') == 2 ? 'selected' : '' }} value="2">Женский</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input name="address" type="text" value="{{$user->address ?? old('address')}}" class="form-control"
                                       id="address">
                            </div>
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
