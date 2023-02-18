
<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo e(route('home.index')); ?>" rel="nofollow">Home</a>
                    <span></span> Manufactors
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand"><?php echo e($manufactors->count()); ?></strong> manufactors</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> <?php echo e($pageSize); ?> <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row product-grid-3">
                            <?php $__currentLoopData = $manufactors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="<?php echo e(route('manufactors.devices',['slug'=>$maker->slug])); ?>">
                                                    <img class="default-img" src="<?php echo e(asset('assets/imgs/manufactor')); ?>/<?php echo e($maker->logo); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="<?php echo e(route('manufactors.devices',['slug'=>$maker->slug])); ?>"><?php echo e($maker->name); ?></a>
                                            </div>
                                            <h2><a href="<?php echo e(route('manufactors.devices',['slug'=>$maker->slug])); ?>"><?php echo e($maker->name); ?></a></h2>

                                            <div class="product-price">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <?php echo e($manufactors->links()); ?>

                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
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
                                        <img src="<?php echo e(asset('assets/imgs/products')); ?>/<?php echo e($np->image); ?>" alt="#">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="<?php echo e(route('product.details',['slug'=>$np->slug])); ?>"><?php echo e($np->name); ?></a></h5>
                                        <p class="price mb-0 mt-5">$<?php echo e($np->price); ?></p>
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
<?php /**PATH /home/buildbot/Desktop/kursova/resources/views/livewire/manufactor-component.blade.php ENDPATH**/ ?>