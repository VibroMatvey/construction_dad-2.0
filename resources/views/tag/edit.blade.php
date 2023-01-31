@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать тэг</h1>
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
                        <form action="{{route('tag.update', $tag->id)}}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input name="title" type="text" value="{{$tag->title}}" class="form-control"
                                       id="title">
                            </div>
                            <button type="submit" class="btn btn-primary">Редактировать</button>
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
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
