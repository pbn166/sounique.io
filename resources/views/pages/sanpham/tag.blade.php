@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->

                        <h2 class="title text-center">Tag tìm kiếm : {{$product_tag}}</h2>


                        <div class="row">
                        @foreach($pro_tag as $key => $product)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-product">
                                        <form>
                                            @csrf
                                                     <!-- <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                                    <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{ number_format($product->product_price, 0, ',', '.') }}VNĐ">
                                                    <a id="wishlist_producturl{{$product->product_id}}" href="{{ url('chi-tiet/'.$product->product_slug) }}"></a> -->


                                                <input type="hidden" value="{{ $product->product_id }}" class="cart_product_id_{{ $product->product_id }}">
                                                <input type="hidden" id="wishlist_productname{{ $product->product_id }}" value="{{ $product->product_name }}" class="cart_product_name_{{ $product->product_id }}">
                                                <input type="hidden" value="{{ $product->product_quantity }}" class="cart_product_quantity_{{ $product->product_id }}">
                                                <input type="hidden" value="{{ $product->product_image }}" class="cart_product_image_{{ $product->product_id }}">
                                                <input type="hidden" id="wishlist_productprice{{ $product->product_id }}" value="{{ number_format($product->product_price, 0, ',', '.') }}VNĐ">
                                                <input type="hidden" value="{{ $product->product_price }}" class="cart_product_price_{{ $product->product_id }}">
                                                <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">
                                                <a id="wishlist_producturl{{ $product->product_id }}" href="{{ url('chi-tiet/'.$product->product_slug) }}"></a>


                                            <div class="product-img">
                                                <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                    <img class="default-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}">
                                                    <img class="hover-img" ssrc="{{URL::to('public/uploads/product/'.$product->product_image)}}" >
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                        <a title="Wishlist" onclick="add_wistlist('{{$product->product_id}}')"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                                <a title="Compare" onclick="add_compare('{{$product->product_id}}')" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                    </div>
                                                    <div class="product-action-2">
                                                        <a  value="Thêm giỏ hàng" class="add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            <div class="product-content">
                                                <h3><a href="product-details.html">{{$product->product_name}}</a></h3>
                                                <div class="product-price">
                                                    <span>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    @endforeach



                    </div><!--features_items-->
                    {{--   <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$all_product->links()!!}
                      </ul> --}}
        <!--/recommended_items-->
@endsection
