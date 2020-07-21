@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								@foreach($product as $new)
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
								
							</div>
						</div> <!-- .beta-products-list -->

			
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection