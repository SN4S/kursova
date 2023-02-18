<div>
    <main class="main">
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Trade-in offer</h4>
                                    <h2 class="animated fw-900">Best deals</h2>
                                    <h1 class="animated fw-900 text-brand">On all products</h1>
                                    <a class="animated btn btn-brush btn-brush-3" href="<?php echo e(route('shop')); ?>"> Shop Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="assets/imgs/slider/slider-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Hot promotions</h4>
                                    <h2 class="animated fw-900">All parts what you need</h2>
                                    <h1 class="animated fw-900 text-7">Great Collection</h1>
                                    <a class="animated btn btn-brush btn-brush-2" href="<?php echo e(route('shop')); ?>"> Discover Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-2" src="assets/imgs/slider/slider-2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>
        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        <?php $__currentLoopData = $newp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="<?php echo e(route('product.details',['slug'=>$new->slug])); ?>">
                                        <img class="default-img" src="<?php echo e(asset('assets/imgs/products')); ?>/<?php echo e($new->image); ?>" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="<?php echo e(route('product.details',['slug'=>$new->slug])); ?>"><?php echo e($new->name); ?></a></h2>

                                <div class="product-price">
                                    <span>$<?php echo e($new->price); ?> </span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding">
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                        <?php $__currentLoopData = $manuf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $man): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="brand-logo"><a href="<?php echo e(route('manufactors.devices',['slug'=>$man->slug])); ?>">
                            <img class="img-grey-hover" height="160" href="<?php echo e(route('manufactors.devices',['slug'=>$man->slug])); ?>" src="<?php echo e(asset('assets/imgs/manufactor')); ?>/<?php echo e($man->logo); ?>" alt="">
                            </a></div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>

    </main>

</div>
<?php /**PATH /home/buildbot/Desktop/kursova/resources/views/livewire/home-component.blade.php ENDPATH**/ ?>