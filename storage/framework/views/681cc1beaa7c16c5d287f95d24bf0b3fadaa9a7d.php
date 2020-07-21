
<?php $__env->startSection('title'); ?>
BKSFCS-Danh Mục Sản Phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="<?php echo e(route('home')); ?>">Home</a> / <span>Sản phẩm</span>
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
							<?php $__currentLoopData = $loai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="<?php echo e(route('loaisanpham',$l->id)); ?>"><?php echo e($l->name); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4><?php echo e($loai_theo_id->name); ?></h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy <?php echo e(count($sp_theo_loai)); ?> sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								<?php $__currentLoopData = $sp_theo_loai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-sm-4 w3-margin-bottom">
									<div class="single-item">
										<?php if($sp->promotion_price==0): ?>
										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$sp->id)); ?>"><img src="<?php echo e($sp->image); ?>" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($sp->name); ?></p>
											<p class="single-item-price">
												<span class="flash-sale"><?php echo e(number_format($sp->unit_price).' VNĐ'); ?></span>
											</p>
										</div>
										<?php else: ?>
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$sp->id)); ?>"><img src="<?php echo e($sp->image); ?>" alt="" style="width: 270px;height: 320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($sp->name); ?></p>
											<p class="single-item-price">
												<span class="flash-del"><?php echo e(number_format($sp->unit_price).' VNĐ'); ?></span>
												<span class="flash-sale"><?php echo e(number_format($sp->promotion_price).' VNĐ'); ?></span>
											</p>
										</div>
										<?php endif; ?>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="<?php echo e(route('addcart',$sp->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="<?php echo e(route('sanpham',$sp->id)); ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
								<div class="row"><?php echo e($sp_theo_loai->links()); ?></div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy <?php echo e(count($sp_khac)); ?> sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<?php $__currentLoopData = $sp_khac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $khac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-sm-4 w3-margin-bottom">
									<div class="single-item">
										<?php if($khac->promotion_price==0): ?>
										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$khac->id)); ?>"><img src="<?php echo e($khac->image); ?>" alt="" style="width: 370px;height: 325px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($khac->name); ?></p>
											<p class="single-item-price">
												<span class="flash-sale"><?php echo e(number_format($khac->unit_price).' VNĐ'); ?></span>
											</p>
										</div>
										<?php else: ?>
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="<?php echo e(route('sanpham',$khac->id)); ?>"><img src="<?php echo e($khac->image); ?>" alt="" style="width: 370px;height: 325px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($khac->name); ?></p>
											<p class="single-item-price">
												<span class="flash-del"><?php echo e(number_format($khac->unit_price).' VNĐ'); ?></span>
												<span class="flash-sale"><?php echo e(number_format($khac->promotion_price).' VNĐ'); ?></span>
											</p>
										</div>
										<?php endif; ?>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="<?php echo e(route('addcart',$khac->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="<?php echo e(route('sanpham',$khac->id)); ?>">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<div class="row"><?php echo e($sp_khac->links()); ?></div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CNPM_LARAVEL\resources\views/page/danh_muc_san_pham.blade.php ENDPATH**/ ?>