@extends('layots.app')
@section('title')
    Группы, количетсов студентов
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Группы</h1>
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
                            <form action="{{route('groups.index')}}" method="get">
                                <div class="form-group">
                                    <label>Выбириет количество студентов</label>
                                    <select name="amountStudents" class="form-control select2" style="width: 25%;"
                                            data-select2-id="1"
                                            tabindex="-1"
                                            aria-hidden="true">
                                        @foreach($studentInGroup as $amount)
                                            <option value="{{$amount}}" {{
                                $amount == $amountStudent ?
                                'selected' : ''
                                }} >{{$amount}}</option>
                                        @endforeach
                                    </select>
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
                                    <th>Наименование</th>
                                    <th>Количество Студентов в группе</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{$group->group_id}}</td>
                                        <td>{{$group->group_name}}</td>
                                        <td>{{$group->amount_students_in_group}}</td>
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
