
<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo e(route('home.index')); ?>" rel="nofollow">Home</a>
                    <span></span> <?php echo e($man->name); ?>

                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand"><?php echo e($devices->count()); ?></strong> devices!</p>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="<?php echo e(route('manufactors.devices.parts',['slug'=>$man->slug,'id'=>$device->id])); ?>">
                                                    <img class="default-img" src="<?php echo e(asset('assets/imgs/devices')); ?>/<?php echo e($device->image); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="<?php echo e(route('manufactors.devices.parts',['slug'=>$man->slug,'id'=>$device->id])); ?>"><?php echo e($device->name); ?></a>
                                            </div>
                                            <h2><a href="<?php echo e(route('manufactors.devices.parts',['slug'=>$man->slug,'id'=>$device->id])); ?>"><?php echo e($device->name); ?></a></h2>

                                            <div class="product-price">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <?php echo e($devices->links()); ?>

                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('product.category',['slug'=>$category->slug])); ?>"><?php echo e($category->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">New products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <?php $__currentLoopData = $new_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $np): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="product-details.html">Chen Cardigan</a></h5>
                                        <p class="price mb-0 mt-5">$99.50</p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php /**PATH /home/buildbot/Desktop/kursova/resources/views/livewire/devices-component.blade.php ENDPATH**/ ?>