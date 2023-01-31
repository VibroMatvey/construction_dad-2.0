@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить опцию</h1>
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
                        <form action="{{route('options.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input name="title" type="text" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="value">Значение</label>
                                <input name="value" type="text" class="form-control" id="value">
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input name="price" type="text" class="form-control" id="price">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @if ($errors->any())
                            <ul class="list-group mt-3">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
