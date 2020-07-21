@extends('master')
@section('title')
BKSFCS-Trang Chủ
@endsection
@section('content')
<div class="rev-slider">
	<div class="w3-section" style="width: 100%">
		@foreach($slide as $sl)
			<img class="mySlides" src="{{$sl->image}}" style="width: 100%;height: 530px"/>
		@endforeach
	</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								@foreach($new_product as $new)
								<div class="col-sm-3 w3-margin-bottom">
									<div class="single-item">
										@if($new->promotion_price==0)
										<div class="single-item-header">
											<a href="{{route('sanpham',$new->id)}}"><img src="{{$new->image}}" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
												<span class="flash-sale">{{number_format($new->unit_price).' VNĐ'}}</span>
											</p>
										</div>
										@else
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="{{route('sanpham',$new->id)}}"><img src="{{$new->image}}" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($new->unit_price).' VNĐ'}}</span>
												<span class="flash-sale">{{number_format($new->promotion_price).' VNĐ'}}</span>
											</p>
										</div>
										@endif
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								<div class="row">{{$new_product->links()}}</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($promotion_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($promotion_product as $km)
								<div class="col-sm-3 w3-margin-bottom">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{{route('sanpham',$new->id)}}"><img src="{{
												$km->image}}" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$km->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($km->unit_price).' VNĐ'}}</span>
												<span class="flash-sale">{{number_format($km->promotion_price).' VNĐ'}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$km->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
					</div>
					<div class="row">{{$promotion_product->links()}}</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection