
<?php $__env->startSection('title'); ?>
BKSFCS-Trang Chủ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="rev-slider">
	<div class="w3-section" style="width: 100%">
		<?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<img class="mySlides" src="<?php echo e($sl->image); ?>" style="width: 100%;height: 530px"/>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
								<p class="pull-left">Tìm thấy <?php echo e(count($new_product)); ?> sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								<?php $__currentLoopData = $new_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-sm-3 w3-margin-bottom">
									<div class="single-item">
										<?php if($new->promotion_price==0): ?>
										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$new->id)); ?>"><img src="<?php echo e($new->image); ?>" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($new->name); ?></p>
											<p class="single-item-price">
												<span class="flash-sale"><?php echo e(number_format($new->unit_price).' VNĐ'); ?></span>
											</p>
										</div>
										<?php else: ?>
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$new->id)); ?>"><img src="<?php echo e($new->image); ?>" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($new->name); ?></p>
											<p class="single-item-price">
												<span class="flash-del"><?php echo e(number_format($new->unit_price).' VNĐ'); ?></span>
												<span class="flash-sale"><?php echo e(number_format($new->promotion_price).' VNĐ'); ?></span>
											</p>
										</div>
										<?php endif; ?>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="<?php echo e(route('addcart',$new->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="<?php echo e(route('sanpham',$new->id)); ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div class="row"><?php echo e($new_product->links()); ?></div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy <?php echo e(count($promotion_product)); ?> sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<?php $__currentLoopData = $promotion_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $km): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-sm-3 w3-margin-bottom">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$km->id)); ?>"><img src="<?php echo e($km->image); ?>" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($km->name); ?></p>
											<p class="single-item-price">
												<span class="flash-del"><?php echo e(number_format($km->unit_price).' VNĐ'); ?></span>
												<span class="flash-sale"><?php echo e(number_format($km->promotion_price).' VNĐ'); ?></span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="<?php echo e(route('addcart',$km->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="<?php echo e(route('sanpham',$km->id)); ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div> <!-- .beta-products-list -->
					</div>
					<div class="row"><?php echo e($promotion_product->links()); ?></div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CNPM_LARAVEL\resources\views/page/home.blade.php ENDPATH**/ ?>