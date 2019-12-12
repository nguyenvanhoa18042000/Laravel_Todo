<!-- resources/views/layouts/detail.blade.php-->

{{-- Kế thừa file master.blade.php--}}
@extends('layouts.master') 

{{-- Truyền dữ liệu vào đúng vị trí của @yield('title') trong file master.blade.php --}}
@section('title')
    Trang chi tiết
@endsection

{{-- Truyền dữ liệu vào đúng vị trí của @yield('content') trong file master.blade.php --}}
@section('content')
    Nội dung trang chi tiết
@endsection