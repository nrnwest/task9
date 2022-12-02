@extends('layots.app')
@section('title')
    Редактировать студента
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать студента</h1>
                </div><!-- /.col -->
                <!-- /.col -->
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
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- start content body -->
                    <form action="{{route('students.update', $student->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Имя"
                                   value="{{$student->first_name}}">
                        </div>
                        <div class="form-group">
                            <label>Фамилия</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Фамилия"
                                   value="{{$student->last_name}}">
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
                                        {{(isset($student->group['id']) and  $student->group['id'] == $group->id) ? 'selected' : ''}}
                                        value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Курсы</label>
                            <select name="courses[]" class="courses" multiple="multiple"
                                    data-placeholder="Выбирите курсы"
                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                @foreach($courses as $course)
                                    @foreach($student->courses as $courseSelect)
                                        <option
                                            value="{{$course->id}}"
                                            {{$courseSelect->id === $course->id ? 'selected' : ''}}
                                            title="{{$course->descrtiption}}">{{$course->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Редактировать">
                        </div>
                    </form>

                    <!-- end content body -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
@endsection
