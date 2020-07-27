<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i>268 Lý Thường Kiệt,Phường 14,Quận 10, TP.HCM</a></li>
						<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-phone"></i>(84-8) 38647256 - 5200</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<?php if(Auth::check()): ?>
						<li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-user"></i>Xin chào, <?php echo e(Auth::user()->full_name); ?></a></li>
						<?php else: ?>
						<li><a href="<?php echo e(route('signup')); ?>">Đăng kí</a></li>
						<li><a href="<?php echo e(route('login')); ?>">Đăng nhập</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="<?php echo e(route('home')); ?>" id="logo"><h1>BKSFCS</h1></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="<?php echo e(route('timkiem')); ?>">
					        <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<?php if(Session::has('cart')): ?>
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<?php if(Session::has('cart')): ?> <?php echo e($totalQty); ?> <?php else: ?> Trống <?php endif; ?>) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								<?php $__currentLoopData = $product_cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="cart-item">
									<a class="cart-item-delete" href="<?php echo e(route('deletecart',$product['item']['id'])); ?>"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="<?php echo e(route('sanpham',$product['item']['id'])); ?>"><img src="<?php echo e($product['item']['image']); ?>" alt="" style="height: 50px;width: 50px"></a>
										<div class="media-body">
											<span class="cart-item-title"><?php echo e($product['item']['name']); ?></span>
											<?php if($product['item']['promotion_price']==0): ?>
											<span class="cart-item-amount"><?php echo e($product['qty']); ?>*<span><?php echo e(number_format($product['item']['unit_price']).' VNĐ'); ?></span></span>
											<?php else: ?>
											<span class="cart-item-amount"><?php echo e($product['qty']); ?>*<span><?php echo e(number_format($product['item']['promotion_price']).' VNĐ'); ?></span></span>
											<?php endif; ?>
											
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"><?php echo e(number_format($totalPrice).' VNĐ'); ?></span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="<?php echo e(route('checkout')); ?>" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						<?php endif; ?>
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
						<li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
						<li><a href="<?php echo e(route('loaisanpham',1)); ?>">Các món chính</a>
							<ul class="sub-menu">
								<?php $__currentLoopData = $type_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><a href="<?php echo e(route('loaisanpham',$type->id)); ?>"><?php echo e($type->name); ?></a></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>
						<li><a href="#">Giới thiệu</a></li>
						<li><a href="#">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header --><?php /**PATH C:\wamp64\www\CNPM_LARAVEL\resources\views/header.blade.php ENDPATH**/ ?>