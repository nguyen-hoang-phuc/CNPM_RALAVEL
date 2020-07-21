@extends('master')
@section('title')
BKSFCS-Danh Mục Sản Phẩm
@endsection
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('home')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $l)
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$loai_theo_id->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theo_loai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theo_loai as $sp)
								<div class="col-sm-4 w3-margin-bottom">
									<div class="single-item">
										@if($sp->promotion_price==0)
										<div class="single-item-header">
											<a href="{{route('sanpham',$sp->id)}}"><img src="{{$sp->image}}" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												<span class="flash-sale">{{number_format($sp->unit_price).' VNĐ'}}</span>
											</p>
										</div>
										@else
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="{{route('sanpham',$sp->id)}}"><img src="{{$sp->image}}" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($sp->unit_price).' VNĐ'}}</span>
												<span class="flash-sale">{{number_format($sp->promotion_price).' VNĐ'}}</span>
											</p>
										</div>
										@endif
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								</div>
								<div class="row">{{$sp_theo_loai->links()}}</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $khac)
								<div class="col-sm-4 w3-margin-bottom">
									<div class="single-item">
										@if($khac->promotion_price==0)
										<div class="single-item-header">
											<a href="{{route('sanpham',$khac->id)}}"><img src="{{$khac->image}}" alt="" style="width: 370px;height: 325px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$khac->name}}</p>
											<p class="single-item-price">
												<span class="flash-sale">{{number_format($khac->unit_price).' VNĐ'}}</span>
											</p>
										</div>
										@else
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="{{route('sanpham',$khac->id)}}"><img src="{{$khac->image}}" alt="" style="width: 370px;height: 325px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$khac->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($khac->unit_price).' VNĐ'}}</span>
												<span class="flash-sale">{{number_format($khac->promotion_price).' VNĐ'}}</span>
											</p>
										</div>
										@endif
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$khac->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$khac->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$sp_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
