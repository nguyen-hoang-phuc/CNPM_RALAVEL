<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="{{route('home')}}"><i class="fa fa-home"></i>268 Lý Thường Kiệt,Phường 14,Quận 10, TP.HCM</a></li>
						<li><a href="{{route('home')}}"><i class="fa fa-phone"></i>(84-8) 38647256 - 5200</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
						<li><a href="{{route('logout')}}"><i class="fa fa-user"></i>Xin chào, {{Auth::user()->full_name}}</a></li>
						@else
						<li><a href="{{route('signup')}}">Đăng kí</a></li>
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('home')}}" id="logo"><h1>BKSFCS</h1></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
					        <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')) {{$totalQty}} @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@foreach($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('deletecart',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="{{route('sanpham',$product['item']['id'])}}"><img src="{{$product['item']['image']}}" alt="" style="height: 50px;width: 50px"></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											@if($product['item']['promotion_price']==0)
											<span class="cart-item-amount">{{$product['qty']}}*<span>{{number_format($product['item']['unit_price']).' VNĐ'}}</span></span>
											@else
											<span class="cart-item-amount">{{$product['qty']}}*<span>{{number_format($product['item']['promotion_price']).' VNĐ'}}</span></span>
											@endif
											
										</div>
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format($totalPrice).' VNĐ'}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('checkout')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('home')}}">Trang chủ</a></li>
						<li><a href="{{route('loaisanpham',1)}}">Các món chính</a>
							<ul class="sub-menu">
								@foreach($type_products as $type)
								<li><a href="{{route('loaisanpham',$type->id)}}">{{$type->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="#">Giới thiệu</a></li>
						<li><a href="#">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->