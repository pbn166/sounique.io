@extends('layout')
@section('content_cart')

<section id="cart_items">
	<div class="container">

    <!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a  href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Thanh toán giỏ hàng</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

    <div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
                    <form action="{{url('/update-cart')}}" method="POST">
					@csrf
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>Hình ảnh</th>
								<th>Tên sản phẩm</th>
								<th class="text-center">Giá</th>
								<th class="text-center">Số lượng</th>
								<th class="text-center">Thành tiền</th>
								<th class="text-center"><a href="{{url('/del-all-product')}}"><i class="ti-trash remove-icon"></i> </a></th>
							</tr>
						</thead>
						<tbody>
                        @if(Session::get('cart')==true)
						@php
								$total = 0;
						@endphp
						@foreach(Session::get('cart') as $key => $cart)
							@php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
							@endphp
							<tr>
								<td class="image" data-title="No"><img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#">{{$cart['product_name']}}</a></p>
									<p class="product-des">{{$cart['product_quantity']}}</p>
								</td>
								<td class="price" data-title="Price"><span>{{number_format($cart['product_price'],0,',','.')}}đ </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<!-- <div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div> -->
                                    <div class="cart_quantity_button">

                                        <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >

                                    </div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>{{number_format($subtotal,0,',','.')}}đ</span></td>
								<td class="action" data-title="Remove"><a href="{{url('/del-product/'.$cart['session_id'])}}"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
                            @endforeach
                            <tr>
                                <td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class=" btn"></td>
                                <!-- <td><a class="btn" href="{{url('/del-all-product')}}">Xóa tất cả</a> -->

                            </tr>
@endif
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>

    <section class="shop checkout section">
			<div class="container">
				<div class="row">

    <div class="col-lg-8 col-12 clearfix">
		<div class="checkout-form">
					<h2>Điền thông tin gửi hàng</h2>
                    <p>Làm ơn điền đầy đủ thông tin để đơn hàng vận chuyển nhanh hơn.</p>
					 @if(\Session::has('error'))
				        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
				        {{ \Session::forget('error') }}
				    @endif
				    @if(\Session::has('success'))
				        <div class="alert alert-success">{{ \Session::get('success') }}</div>
				        {{ \Session::forget('success') }}
				    @endif

						<form class="form" method="POST">
							@csrf
                            <div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
							<input type="text"  name="shipping_email" class="shipping_email form-control" placeholder="Điền email"  value="{{$customer->customer_name}}">
                            </div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
							<input type="text" name="shipping_name" class="shipping_name form-control" placeholder="Họ và tên người gửi" value ="{{$customer->customer_name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
							<input type="text" name="shipping_address" class="shipping_address form-control" placeholder="Địa chỉ gửi hàng">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
							<input type="text" name="shipping_phone" class="shipping_phone form-control" placeholder="Số điện thoại" value="{{$customer->customer_phone}}">
                                        </div>
                                    </div>
                                        <div class="col-lg-12 col-md-12 col-12">
										<div class="form-group">
							<textarea name="shipping_notes" class="shipping_notes form-control" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
                                        </div>
                                        </div>
                            <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn thành phố</label>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">

                                        <option value="">--Chọn tỉnh thành phố--</option>
                                        @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                        <option value="">--Chọn quận huyện--</option>

                                    </select>
                                </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn xã phường</label>
                                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                        <option value="">--Chọn xã phường--</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">

                                <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
                                </div>

							@if(Session::get('fee'))
							<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
							@else
							<input type="hidden" name="order_fee" class="order_fee" value="">
							@endif

							@if(Session::get('coupon'))
							@foreach(Session::get('coupon') as $key => $cou)
							<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
							@endforeach
							@else
							<input type="hidden" name="order_coupon" class="order_coupon" value="no">
							@endif
                            <div class="">
								<!-- <div class="form-group">
									<label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
									<select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
										@if(!Session::get('success_paypal'))
										<option value="0">Qua chuyển khoản</option>
										<option value="1">Tiền mặt</option>
										@else
										<option value="2">Đã thanh toán paypal,vui lòng cập nhật giao hàng</option>

										@endif
									</select>
								</div> -->
							</div>

                        </div>


							<!-- <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order"> -->
						</form>
					</div>
                    @if(Session::get('cart')==true)
						@php
								$total = 0;
						@endphp
						@foreach(Session::get('cart') as $key => $cart)
							@php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
							@endphp

                            @endforeach
                            @endif


				</div>
                <div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>

                                    <li>Tổng tiền :<span>{{number_format($total,0,',','.')}}đ</span></li>
										@if(Session::get('coupon'))
										<li>

											@foreach(Session::get('coupon') as $key => $cou)
											@if($cou['coupon_condition']==1)
											Mã giảm : <span>{{$cou['coupon_number']}} %</span>
                                            <p>
												@php
												$total_coupon = ($total*$cou['coupon_number'])/100;
                                                echo '<li>Tiết kiệm<span>'.number_format($total_coupon,0,',','.').'đ</span></li>';
												@endphp
											</p>
											<!-- <p>
												@php
												$total_coupon = ($total*$cou['coupon_number'])/100;

												@endphp
											</p> -->
											<p>
												@php
												$total_after_coupon = $total-$total_coupon;
												@endphp
											</p>
											@elseif($cou['coupon_condition']==2)
											Mã giảm : <span>{{number_format($cou['coupon_number'],0,',','.')}} VND </span>

											<p>
												@php
												$total_coupon = $total - $cou['coupon_number'];

												@endphp
											</p>
											@php
											$total_after_coupon = $total_coupon;
											@endphp
											@endif
											@endforeach



										</li>

										@endif





										@if(Session::get('fee'))
										<li>
											<!-- <a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a> -->

											Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span></li>
											<?php $total_after_fee = $total + Session::get('fee'); ?>
											@endif
											<li class="last" id="last">Tổng thanh toán:
                                                <span>
												@php
												if(Session::get('fee') && !Session::get('coupon')){
													$total_after = $total_after_fee;
													echo number_format($total_after,0,',','.').'đ';

												}elseif(!Session::get('fee') && Session::get('coupon')){
													$total_after = $total_after_coupon;
													echo number_format($total_after,0,',','.').'đ';
												}elseif(Session::get('fee') && Session::get('coupon')){
													$total_after = $total_after_coupon;
													$total_after = $total_after + Session::get('fee');
													echo number_format($total_after,0,',','.').'đ';
												}elseif(!Session::get('fee') && !Session::get('coupon')){
													$total_after = $total;
													echo number_format($total_after,0,',','.').'đ';
												}

												@endphp
                                            </span>
											</li>


										<!-- <li class="last">Total<span>$340.00</span></li> -->
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Hình thức thanh toán</h2>
                                @if(Session::get('cart'))
                                <div class="form-group">
                                <div class="">
								<div class="form-group">
									<label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
									<select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
										@if(!Session::get('success_paypal'))
										<option value="0">Qua chuyển khoản</option>
										<option value="1">Tiền mặt</option>
										@else
										<option value="2">Đã thanh toán paypal,vui lòng cập nhật giao hàng</option>

										@endif
									</select>
								</div>
							</div>
</div>

					<tr>

							@if(Session::get('cart'))



                                <style>
                                .pay-button {
                                    border: none;
                                    padding: 0;
                                    background: none;
                                    cursor: pointer;
                                    outline: none;
                                }

                                .pay-logo {
                                    /* Thêm các thuộc tính của hình ảnh tại đây */
                                    /* Ví dụ: */
                                    width: 100px;
                                    height: auto;
                                }
                                .row{
                                    margin-left: 10px;
                                    }
                                </style>
                            <div class="row">
                                <form action="{{ url('/vnpay_payment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="total_vnpay" value="{{ $total_after }}">
                                    <button type="submit" class="pay-button" name="redirect">
                                        <img src="https://vnpay.vn/s1/statics.vnpay.vn/2023/9/06ncktiwd6dc1694418196384.png" alt="VNPAY Logo" class="pay-logo">
                                    </button>
                                </form>
                                <form action="{{url('/momo_payment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="total_vnpay" value="{{ $total_after }}">
                                    <button type="submit" class="pay-button" name="redirect">
                                        <img src="https://developers.momo.vn/v3/assets/images/icon-52bd5808cecdb1970e1aeec3c31a3ee1.png" alt="VNPAY Logo" class="pay-logo">
                                    </button>
                                </form>

												@if(!Session::get('success_paypal'))
												@php

													$vnd_to_usd = $total_after/23083;
													$total_paypal = round($vnd_to_usd,2);
													\Session::put('total_payment',$total_paypal);
												@endphp
												{{--

                                             <div id="paypal-button"></div> --}}
												<a class="pay-button" href="{{ route('processTransaction') }}">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png" alt="VNPAY Logo" class="pay-logo"></a>
												@endif
												{{-- <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}"> --}}


                            </div>



							</td>
						</tr>

						</tr>
						@endif

					</tr>
					@endif
                            </div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->

							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<!-- <a type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">proceed to checkout</a> -->
                                        <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
			</div>

			<div class="col-sm-12 clearfix">
				@if(session()->has('message'))
				<div class="alert alert-success">
					{!! session()->get('message') !!}
				</div>
				@elseif(session()->has('error'))
				<div class="alert alert-danger">
					{!! session()->get('error') !!}
				</div>
				@endif

            </div>
                </div>
</section>



		<!-- Start Shop Services Area  -->
		<section class="shop-services section home">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-rocket"></i>
							<h4>Free shiping</h4>
							<p>Orders over $100</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-reload"></i>
							<h4>Free Return</h4>
							<p>Within 30 days returns</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-lock"></i>
							<h4>Sucure Payment</h4>
							<p>100% secure payment</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-tag"></i>
							<h4>Best Peice</h4>
							<p>Guaranteed price</p>
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Services -->

		<!-- Start Shop Newsletter  -->
		<section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<!-- Start Newsletter Inner -->
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->

@endsection
