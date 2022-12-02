@extends('layots.app')
@section('title')
    Курсы, студенты на курсе
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Курсы</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{route('courses.index')}}" method="get">
                                <div class="form-group">
                                    <label>Выбирите курс:</label>
                                    <select name="coursId" class="form-control select2" style="width: 25%;"
                                            data-select2-id="1"
                                            tabindex="-1"
                                            aria-hidden="true">
                                        @foreach($courses as $cours)
                                            <option value="{{$cours->id}}" {{
                                $cours->id == $coursId ?
                                'selected' : ''
                                }} title="{{$cours->description}}">{{$cours->name}}</option>
                                        @endforeach
                                    </select>
                                    <div>Студентов: {{$students->count()}}</div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Показать">
                                </div>
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>
                                            <a href="{{route('students.show', $student->id)}}">
                                                {{$student->id}}</a>
                                        </td>
                                        <td>{{$student->first_name}}</td>
                                        <td>{{$student->last_name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
