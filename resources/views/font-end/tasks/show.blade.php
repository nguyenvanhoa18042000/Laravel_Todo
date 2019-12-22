
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
    #view-show{
        margin-top:5%; 
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
@section('content')
    <div class="col-sm-offset-2 col-sm-8" id="view-show">
        <a href="{{ route('task.index') }}" class="btn btn-success add-mb">
            <i class="fa fa-arrow-left"> </i> Danh sách công việc
        </a>
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết công việc
            </div>
            <div class="panel-body">
                <h4>Tên công việc: {{ $task->name }}</h4>

                <h4>Nội dung</h4>{{ $task->content }}
                <h4>Thời hạn</h4>{{ $task->deadline }}
            </div>
        </div>
    </div>
@endsection