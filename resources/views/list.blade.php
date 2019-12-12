<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<body>
<table class="table table-bordered" id="my-table">
  <tbody>
    @foreach ($list as $row)
   <tr>
      <th scope="row">{{ $row['name'] }}</th>
      <td>@if ($row['status'] == 1)
              Đã hoàn thành
          @elseif ($row['status'] == -1)
             Không thực hiện
          @else
              Chưa làm
          @endif
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>