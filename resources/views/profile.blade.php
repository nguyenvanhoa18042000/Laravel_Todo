@extends('layouts.master')

@section('title')
Profile
@endsection
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style type="text/css">
    #my-table{
      width: 60%;
      position: absolute;
      top:50%;
      left: 50%;
      transform: translate(-50%,-50%);
    }
  </style>
@endsection

<!-- <div>
                <a href="{{ route('task.index') }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>index
                </a>
                <a href="{{ route('task.create') }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>create
                </a>
                <a href="{{ route('task.store') }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>store
                </a>
                <a href="{{ route('task.show' , 1) }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>show
                </a>
                <a href="{{ route('task.edit' , 1) }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>edit
                </a>
                <a href="{{ route('task.update' , 1) }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>update
                </a>
                <a href="{{ route('task.delete' , 1) }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>delete
                </a>
            
            </div> -->



@section('content')
<table class="table table-bordered" id="my-table">
  <tbody>
    <tr>
      <th scope="row">Họ tên</th>
      <td>{{ $name }}</td>
    </tr>
    <tr>
      <th scope="row">Năm sinh</th>
      <td>{{ $birthday }}</td>
    </tr>
    <tr>
      <th scope="row">Trường học</th>
      <td>{{ $school }}</td>
    </tr>
    <tr>
      <th scope="row">Quê quán</th>
      <td>{{ $address }}</td>
    </tr>
    <tr>
      <th scope="row">giới thiệu</th>
      <td colspan="2">{!! $introduce !!}</td>
    </tr>
    <tr>
      <th scope="row">Mục tiêu</th>
      <td>{{ $goal }}</td>
    </tr>
  </tbody>
</table>
@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection
