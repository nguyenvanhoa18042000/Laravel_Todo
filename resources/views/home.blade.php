
@extends('layouts.master')

@section('title')
Laravel Todo - Basic
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: 'Lato';
    }
    .fa-btn {
        margin-right: 1px;
    }
    .task-table tbody tr td:nth-child(2){
        width: 120px;
    }
    .task-table tbody tr td:nth-child(3){
        width: 100px;
    }
</style>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('header')
@include('layouts.header')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div>
            <a href="{{ route('task.index') }}" type="submit" class="btn btn-success">
                <i class="fa fa-btn fa-check"></i>index
            </a>
            <a href="{{ route('task.create') }}" type="submit" class="btn btn-success">
                <i class="fa fa-btn fa-check"></i>create
            </a>
            <a href="{{ route('task.edit' ,1) }}" type="submit" class="btn btn-success">
                <i class="fa fa-btn fa-check"></i>edit
            </a>

            <form action="{{ route('task.store') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>store
                </button>
            </form>
            <form action="{{ route('task.update' ,1) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>update
                </button>
            </form>
            <form action="{{ route('task.update' ,1) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>destroy
                </button>
            </form>
        </div>
        <div class="panel panel-default">

            <div class="panel-heading">
                Thêm công việc mới
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->

            <!-- New Task Form -->
                <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Tên công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Ngày hoàn thành</label>

                        <div class="col-sm-6">
                            <input type="text" name="deadline" id="task-deadline" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>



                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Thêm công việc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công việc hiện tại
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Tên công việc</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="table-text"><div>Làm bài tập Laravel </div></td>
                        <!-- Task Complete Button -->
                        <td>
                            <a href="{{ route('task.complete' , 1) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Hoàn thành
                            </a>
                        </td>
                        <!-- Task Delete Button -->
                        <td>
                            <form action="{{ route('task.destroy' , 1) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-text"><div>Làm bài tập PHP  </div></td>
                        <!-- Task Complete Button -->
                        <td>
                            <a href="{{ route('task.complete' , 2) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Hoàn thành
                            </a>
                        </td>
                        <!-- Task Delete Button -->
                        <td>
                            <form action="{{ route('task.destroy' , 2) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-text"><div><strike>Làm project Laravel </strike></div></td>
                        <!-- Task Complete Button -->
                        <td>
                            <a href="{{ route('task.recomplete' , 3) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-refresh"></i>Làm lại
                            </a>
                        </td>
                        <!-- Task Delete Button -->
                        <td>
                            <form action="{{ route('task.destroy' , 3) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection



