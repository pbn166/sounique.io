@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
			<style type="text/css">
				p.title_thongke {
				    text-align: center;
				    font-size: 20px;
				    font-weight: bold;
				}
			</style>
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$app_order}}</h3>

                <p>Đơn hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"> </i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$app_post}}<sup style="font-size: 20px"></sup></h3>

                <p>Bài viết</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$customer}}</h3>

                <p>Thành viên</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$product}}</h3>

                <p>Sản phầm</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

<div class="row">
		<p class="title_thongke" style=" font-size: 24px;  padding: 10px;">Thống kê đơn hàng doanh số</p>
        <row>
		<form autocomplete="off">
			@csrf

			<div class="col-md-3">
				<p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>

				<!-- <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p> -->

			</div>

			<div class="col-md-3">
				<p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>

			</div>
            <div class="col-md-2">
                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
            </div>

			<div class="col-md-3">
                <!-- <div class="col-md-4"> -->
				<p>
					Lọc theo:
					<select class="dashboard-filter form-control" >
						<option>--Chọn--</option>

						<option value="7ngay">7 ngày qua</option>
						<option value="thangtruoc">tháng trước</option>
						<option value="thangnay">tháng này</option>
						<option value="365ngayqua">365 ngày qua</option>
					</select>

                </p>
            <!-- </div> -->

			</div>

		</form>
            <row>
		<div class="col-md-12">
			<div id="chart" style="height: 250px;"></div>
		</div>

</div>

<div class="row">
	<style type="text/css">
		table.table.table-bordered.table-dark {
		    background: #32383e;
		}
		table.table.table-bordered.table-dark tr th {
		    color: #fff;
		}
	</style>

<p class="title_thongke" style=" font-size: 24px;  padding: 10px;">Thống kê truy cập</p>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Đang online</th>
      <th scope="col">Tổng tháng trước</th>
      <th scope="col">Tổng tháng này</th>
      <th scope="col">Tổng một năm</th>
      <th scope="col">Tổng truy cập</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$visitor_count}}</td>
      <td>{{$visitor_last_month_count}}</td>
      <td>{{$visitor_this_month_count}}</td>
      <td>{{$visitor_year_count}}</td>
      <td>{{$visitors_total}}</td>
    </tr>

  </tbody>
</table>

</div>

<div class="row">

	<div class="col-md-4 col-xs-12">
		<p class="title_thongke" style=" font-size: 24px;  padding: 10px; text-align:center;">Thống kê tổng quát</p>
		<div id="donut"></div>
	</div>

	<!--------------------------->
    <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <p class="title_thongke" style=" font-size: 24px;  padding: 10px;text-align:center;">Sản phẩm được xem nhiều</p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!-- <th style="width: 10px">#</th> -->
                      <th>Tên sản phẩm</th>

                      <th style="width: 40px">Số lượng</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($product_views as $key => $pro)
                    <tr>
                      <!-- <td>1.</td> -->
                      <td><a href="{{url('/chi-tiet/'.$pro->product_slug)}}">{{$pro->product_name}}</td>

                      <td><span class="badge bg-success">{{$pro->product_views}}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->





	<div class="col-md-4 col-xs-12">
		<style type="text/css">
			ol.list_views {
			    margin: 10px 0;
			    color: #fff;
			}
			ol.list_views a {
			    color: orange;
			    font-weight: 400;
			}
		</style>


	</div>
</div>


</div>

@endsection
