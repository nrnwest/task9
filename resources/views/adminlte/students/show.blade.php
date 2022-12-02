@extends('layots.app')
@section('title')
    Студент
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Студент</h1>
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
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{route('students.edit', $student->id)}}" class="btn
                            btn-primary">Редактировать</a>
                            </div>
                            <form action="{{route('students.destroy', $student->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$student->id}}</td>
                                </tr>
                                <tr>
                                    <td>Имя</td>
                                    <td>{{$student->first_name}}</td>
                                </tr>
                                <tr>
                                    <td>Фамилия</td>
                                    <td>{{$student->last_name}}</td>
                                </tr>
                                <tr>
                                    <td>Имя</td>
                                    <td>{{$student->first_name}}</td>
                                </tr>
                                <tr>
                                    <td>Курсы</td>
                                    <td>
                                        @foreach($student->courses as $course )
                                            {{$course->name}}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Група</td>
                                    <td>{{ $student->group === null ? 'Не Включен в группу' : $student->group['name']}}</td>
                                </tr>
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
