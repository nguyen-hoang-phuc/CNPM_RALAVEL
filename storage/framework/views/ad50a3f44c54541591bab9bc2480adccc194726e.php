
<?php $__env->startSection('title'); ?>
BKSFCS-Sản Phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title"><?php echo e($products->name); ?></h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="<?php echo e(route('home')); ?>">Home</a> / <span>Chi tiết món ăn</span>
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
							<img src="<?php echo e($products->image); ?>" alt="" style="width: 270px;height: 320px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2><?php echo e($products->name); ?></h2></p>
								<p class="single-item-price">
									<?php if($products->promotion_price==0): ?>
									<span class="flash-sale"><?php echo e(number_format($products->unit_price).' VNĐ'); ?></span>
									<?php else: ?>
									<span class="flash-del"><?php echo e(number_format($products->unit_price).' VNĐ'); ?></span>
									<span class="flash-sale"><?php echo e(number_format($products->promotion_price).' VNĐ'); ?></span>
									<?php endif; ?>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p><?php echo e($products->description); ?></p>
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
								<a class="add-to-cart" href="<?php echo e(route('addcart',$products->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
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
							<p><?php echo e($products->description); ?></p>
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
							<?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-sm-4 w3-margin-bottom">
								<div class="single-item">
									<?php if($lq->promotion_price==0): ?>
										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$lq->id)); ?>"><img src="<?php echo e($lq->image); ?>" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($lq->name); ?></p>
											<p class="single-item-price">
												<span class="flash-sale"><?php echo e(number_format($lq->unit_price).' VNĐ'); ?></span>
											</p>
										</div>
										<?php else: ?>
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$lq->id)); ?>"><img src="<?php echo e($lq->image); ?>" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($lq->name); ?></p>
											<p class="single-item-price">
												<span class="flash-del"><?php echo e(number_format($lq->unit_price).' VNĐ'); ?></span>
												<span class="flash-sale"><?php echo e(number_format($lq->promotion_price).' VNĐ'); ?></span>
											</p>
										</div>
										<?php endif; ?>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="<?php echo e(route('addcart',$lq->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="<?php echo e(route('sanpham',$lq->id)); ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="row"><?php echo e($related_products->links()); ?></div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Top bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<?php $__currentLoopData = $best_sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $best): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="<?php echo e($best->image); ?>" alt="" style="width: 56px;height: 72px"></a>
									<div class="media-body">
										<?php echo e($best->name); ?>

										<span class="beta-sales-price"><?php echo e(number_format($best->unit_price).' VNĐ'); ?></span>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm khuyến mãi</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<?php $__currentLoopData = $promotion_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $km): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="<?php echo e($km->image); ?>" alt="" style="width: 56px;height: 72px"></a>
									<div class="media-body">
										<?php echo e($km->name); ?>

										<p class="single-item-price">
											<span class="flash-del"><?php echo e(number_format($km->unit_price).' VNĐ'); ?></span>
											<span class="flash-sale"><?php echo e(number_format($km->promotion_price).' VNĐ'); ?></span>
										</p>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>	
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CNPM_LARAVEL\resources\views/page/san_pham.blade.php ENDPATH**/ ?>