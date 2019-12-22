
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
    .add-mb{
        margin-bottom: 2%;
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


@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!-- Current Tasks -->
        <a href="{{ route('task.create') }}" class="btn btn-success add-mb">
                <i class="fa fa-plus"> </i> Thêm mới công việc
        </a>
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công việc hiện tại
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Tên công việc</th>
                    <th>Trạng thái</th>
                    <th>Độ ưu tiên</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                        <td class="table-text">
                            <div><a href="{{ route('task.show',$task->id) }}">
                                @if ($task->status != 2)
                                    {{$task->name}}
                                @else
                                    <strike>{{$task->name}}</strike>
                                @endif
                            </a></div></td>
                        <td class="table-text"><div>
                            @switch($task->status)
                                @case(-1)
                                    Không làm
                                    @break
                                @case(0)
                                    Chưa làm
                                    @break
                                @case(1)
                                    Đang làm
                                    @break
                                @default
                                    Đã làm
                            @endswitch
                        </div></td>

                        <td class="table-text"><div>
                            @switch($task->priority)
                                @case(0)
                                    Bình thường
                                    @break
                                @case(1)
                                    Quan trọng
                                    @break
                                @default
                                    Khẩn cấp
                            @endswitch
                        </div></td>
                        <!-- Task Complete Button -->
                        @if($task->status == 2)
                            <td>
                                <a href="{{ route('task.recomplete' , $task->id) }}" type="submit" class="btn btn-success">
                                    <i class="fa fa-repeat"></i> Làm lại
                                </a>
                            </td>
                        @else
                            <td>
                                <a href="{{ route('task.complete' , $task->id) }}" type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-check"></i> Hoàn thành
                                </a>
                            </td>
                        @endif

                        @if($task->status != 2)
                            <td>
                                <a href="{{ route('task.edit' , $task->id) }}" type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> Chỉnh sửa
                                </a>
                            </td>
                        @endif
                        <!-- Task Delete Button -->
                        <td>
                            <form action="{{ route('task.destroy' , $task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i> Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection



