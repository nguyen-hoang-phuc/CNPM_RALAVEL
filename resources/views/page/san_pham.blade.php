@extends('master')
@section('title')
BKSFCS-Sản Phẩm
@endsection
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$products->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('home')}}">Home</a> / <span>Chi tiết món ăn</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="{{$products->image}}" alt="" style="width: 270px;height: 320px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$products->name}}</h2></p>
								<p class="single-item-price">
									@if($products->promotion_price==0)
									<span class="flash-sale">{{number_format($products->unit_price).' VNĐ'}}</span>
									@else
									<span class="flash-del">{{number_format($products->unit_price).' VNĐ'}}</span>
									<span class="flash-sale">{{number_format($products->promotion_price).' VNĐ'}}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$products->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Lựa chọn:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('addcart',$products->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Đánh giá (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$products->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>Không có bình luận nào!</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>
						<div class="space40">&nbsp;</div>
						<div class="row">
							@foreach($related_products as $lq)
							<div class="col-sm-4 w3-margin-bottom">
								<div class="single-item">
									@if($lq->promotion_price==0)
										<div class="single-item-header">
											<a href="{{route('sanpham',$lq->id)}}"><img src="{{$lq->image}}" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$lq->name}}</p>
											<p class="single-item-price">
												<span class="flash-sale">{{number_format($lq->unit_price).' VNĐ'}}</span>
											</p>
										</div>
										@else
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="{{route('sanpham',$lq->id)}}"><img src="{{$lq->image}}" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$lq->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($lq->unit_price).' VNĐ'}}</span>
												<span class="flash-sale">{{number_format($lq->promotion_price).' VNĐ'}}</span>
											</p>
										</div>
										@endif
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$lq->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$lq->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$related_products->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Top bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($best_sale as $best)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('sanpham',$best->id_product)}}"><img src="{{$best->image}}" alt="" style="width: 56px;height: 72px"></a>
									<div class="media-body">
										{{$best->name}}
										<span class="beta-sales-price">{{number_format($best->unit_price).' VNĐ'}}</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm khuyến mãi</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($promotion_product as $km)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('sanpham',$km->id)}}"><img src="{{$km->image}}" alt="" style="width: 56px;height: 72px"></a>
									<div class="media-body">
										{{$km->name}}
										<p class="single-item-price">
											<span class="flash-del">{{number_format($km->unit_price).' VNĐ'}}</span>
											<span class="flash-sale">{{number_format($km->promotion_price).' VNĐ'}}</span>
										</p>
									</div>
								</div>
								@endforeach
							</div>	
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection