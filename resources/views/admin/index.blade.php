<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý dữ liệu dưới dạng Bảng</title>
  <!-- Link đến Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style type="text/css">
		body{
			margin: 0px;padding: 0px;
			background: #000;
		}
		.container{ background: #fff;height: auto;min-height: 800px; }
		.table td, .table th{ padding: 0.35rem; }
	</style>
</head>
<body>
  <div class="container">
	<h2 style="text-align: center;" class="mb-4">Danh sách Dữ liệu</h2>
	<table class="table table-bordered">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col">Orders</th>
		  <th scope="col">Fullname</th>
		  <th scope="col">Email</th>
		  <th scope="col">Mobile Number</th>
		  <th scope="col">Ministry / Organisation</th>
		  <th scope="col">Hành động</th>
		</tr>
	  </thead>
	  <tbody>
		  <?php $i=0; ?>
		  @foreach($data as $k=>$v)
		  <?php $i++; ?>
		  <tr>
			<td style="text-align: center;vertical-align: middle;" scope="row"><?php echo $i; ?></td>
			<td>{!! $v->title !!} {!! $v->full_name !!}</td>
			<td>{!! $v->email !!}</td>
			<td>{!! $v->mobile_number !!}</td>
			<td>{!! $v->ministry_organisation !!}</td>
			<td style="text-align: center;vertical-align: middle;">
			  <a class="btn btn-success btn-sm">Chi tiết</a>
			  <!--<button class="btn btn-primary btn-sm">Sửa</button>
					<button class="btn btn-danger btn-sm">Xóa</button>-->
			</td>
		  </tr>
		  @endforeach
		<!-- Thêm các hàng dữ liệu khác tương tự -->
	  </tbody>
	</table>
  </div>

  <!-- Link đến Bootstrap JS và Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

