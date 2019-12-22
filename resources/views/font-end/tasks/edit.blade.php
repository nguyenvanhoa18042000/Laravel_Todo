
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
    #view-edit{
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
    <div class="col-sm-offset-2 col-sm-8" id="view-edit">
        <a href="{{ route('task.index') }}" class="btn btn-success add-mb">
            <i class="fa fa-arrow-left"> </i> Danh sách công việc
        </a>
        <div class="panel panel-default">
            <div class="panel-heading">
                Cập nhật công việc
            </div>
            <div class="panel-body">
                <!-- New Task Form -->
                <form
                        action="{{ route('task.update', $task->id)  }}"
                        method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Tên công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Mô tả</label>

                        <div class="col-sm-6">
                            <textarea name="content" class="form-control">{{ $task->content }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Thời hạn hoàn thành</label>

                        <div class="col-sm-6">
                            <input type="text" name="deadline" id="task-deadline" class="form-control" value="{{ $task->deadline }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task-status" class="col-sm-3 control-label">Trạng thái </label>

                        <div class="col-sm-6">
                            <select name="status" class="form-control">
                                <option value="-1" @if($task->status == -1) selected  @endif>Không làm</option>
                                <option value="0" @if($task->status == 0) selected  @endif>Chưa làm</option>
                                <option value="1" @if($task->status == 1) selected  @endif>Đang làm</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task-priority" class="col-sm-3 control-label">Mức độ ưu tiên</label>

                        <div class="col-sm-6">
                            <select name="priority" class="form-control">
                                <option value="0" @if($task->priority == 0) selected  @endif>Bình thường</option>
                                <option value="1" @if($task->priority == 1) selected  @endif>Quan trọng</option>
                                <option value="2" @if($task->priority == 2) selected  @endif>Khẩn cấp</option>
                            </select>
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Cập nhật công việc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection