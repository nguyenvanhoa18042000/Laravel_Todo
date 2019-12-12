<!-- resources/views/hello2.blade.php-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hello cac ban</title>
    <link rel="stylesheet" href="">
</head>
<body>
@if (count($records) === 1)
    Có 1 
@elseif (count($records) > 1)
   Có nhiều
@else
    Không có
@endif
<br>
@foreach ($records as $record)
    {{ $record }} </br>
@endforeach
<p>Tên tôi là: {{ $username }} </p>
<p>Tên tôi là: {{ $name }} </p>
<p>Tên tôi là: {!! $name !!} </p>
<p>Tôi sinh năm {{ $year }}</p>
<p>Tôi sinh năm {{ $school[0] }}</p>
</body>
</html>