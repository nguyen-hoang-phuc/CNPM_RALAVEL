
<?php $__env->startSection('content'); ?>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy <?php echo e(count($product)); ?> sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
								
							</div>
						</div> <!-- .beta-products-list -->

			
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CNPM_LARAVEL\resources\views/page/search.blade.php ENDPATH**/ ?>