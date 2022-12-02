@extends('layots.app')
@section('title')
    Создать студента
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить Студента</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Errors Form -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- end Errors Form -->
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Имя</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Имя"
                               value="{{old('first_name')}}">
                    </div>
                    <div class="form-group">
                        <label>Фамилия</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Фамилия"
                               value="{{old
                        ('last_name')}}">
                    </div>
                    <div class="form-group">
                        <label>Група</label>
                        <select name="group_id" class="form-control select2" style="width: 100%;"
                                data-select2-id="1"
                                tabindex="-1"
                                aria-hidden="true">
                            <option selected="selected" disabled>Выбирите группу</option>
                            @foreach($groups as $group)
                                <option
                                    {{old('group_id') == $group->id ? 'selected' : ''}}
                                    value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Курсы</label>
                        <select name="courses[]" class="courses" multiple="multiple" data-placeholder="Выбирите курсы"
                                style="width: 100%;" tabindex="-1" aria-hidden="true">
                            @foreach($courses as $course)
                                @foreach(old('courses') ?? [0] as  $courseSelect)
                                    <option
                                        value="{{$course->id}}" {{$courseSelect == $course->id ? 'selected' : ''}}
                                    title="{{$course->descrtiption}}">{{$course->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
