
<?php $__env->startSection('title'); ?>
BKSFCS-Thanh Toán
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Thanh toán</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="http://localhost/CNPM_LARAVEL/public/index">Home</a> / <span>Thanh toán</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="<?php echo e(route('dathang')); ?>" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<?php if(Session::has('thongbao')): ?> 
				<div class="alert alert-success"><?php echo e(Session::get('thongbao')); ?></div> 
				<?php endif; ?>
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin thanh toán</h4>
						<div class="space20">&nbsp;</div>
							<div class="form-block">
								<label for="your_first_name">Họ tên*</label>
								<input type="text" id="name" name="name" required>
							</div>

							<div class="form-block">
								<label for="your_first_name">Giới tính*</label>
								<input type="text" id="gender" name="gender" placeholder="Nam (Nữ)" required>
							</div>

							<div class="form-block">
								<label for="email">Địa chỉ email*</label>
								<input type="email" id="email" name="email" required>
							</div>
						

							<div class="form-block">
								<label for="adress">Địa chỉ*</label>
								<input type="text" id="adsress" name="address" placeholder="Số nhà, tên đường, quận (huyện), thành phố" required>
							</div>

							<div class="form-block">
								<label for="phone">SĐT*</label>
								<input type="text" id="phone" name="SDT" required>
							</div>
						
							<div class="form-block">
								<label for="notes">Ghi chú</label>
								<textarea id="notes" name="notes"></textarea>
							</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
									<?php if(Session::has('cart')): ?>
									<?php $__currentLoopData = $product_cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<!--  one item	 -->
										<div class="media">
											<img width="35%" src="<?php echo e($sp['item']['image']); ?>" alt="" class="pull-left" style="width: 80px;height: 80px">
											<div class="media-body">
												<p class="font-large"><?php echo e($sp['item']['name']); ?></p>
												<span class="color-gray your-order-info">Đơn giá:
												<?php if($sp['item']['promotion_price'] != 0): ?>
													<?php echo e(number_format($sp['item']['promotion_price'])); ?> VNĐ
												<?php else: ?>
													<?php echo e(number_format($sp['item']['unit_price'])); ?> VNĐ
												<?php endif; ?>
												</span>
												<span class="color-gray your-order-info">Số lượng: <?php echo e($sp['qty']); ?></span>
											</div>
										</div>
									<!-- end one item -->
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng:</p></div>
									<div class="pull-right"><h5 class="color-black"><?php if(Session::has('cart')): ?><?php echo e(number_format($totalPrice)); ?><?php else: ?> 0 <?php endif; ?> đồng</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Phương thức thanh toán</h5></div>
							
							<div class="your-order-body">
							<ul class="payment_methods methods">
								
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="Cash" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán bằng tiền mặt </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Thanh toán bằng tiền mặt trực tiếp tại cửa hàng.
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: SFCS, Đại học Bách Khoa TpHCM
										<br>- Ngân hàng OCB, Chi nhánh TPHCM
									</div>						
								</li>
								
							</ul>
						</div>
							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
            }
        });
    });   


</script>
<script>
	 jQuery(document).ready(function($) {
                'use strict';
				
// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
				});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CNPM_LARAVEL\resources\views/page/checkout.blade.php ENDPATH**/ ?>