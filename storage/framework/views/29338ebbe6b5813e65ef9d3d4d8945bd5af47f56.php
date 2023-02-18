<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Surfside Media</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/imgs/theme/favicon.ico')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

    </head>

<body>
<header class="header-area header-style-1 header-height-2">
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="<?php echo e(route('home.index')); ?>"><img src="<?php echo e(asset('assets/imgs/logo/logo.png')); ?>" alt="logo"></a>
                </div>
                <div class="header-right">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('header-search-component')->html();
} elseif ($_instance->childHasBeenRendered('OOJRDYE')) {
    $componentId = $_instance->getRenderedChildComponentId('OOJRDYE');
    $componentTag = $_instance->getRenderedChildComponentTagName('OOJRDYE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OOJRDYE');
} else {
    $response = \Livewire\Livewire::mount('header-search-component');
    $html = $response->html();
    $_instance->logRenderedChild('OOJRDYE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="<?php echo e(route('shop.cart')); ?>">
                                    <img alt="Surfside Media" src="<?php echo e(asset('assets/imgs/theme/icons/icon-cart.svg')); ?>">
                                    <span class="pro-count blue"><?php echo e(Cart::count()); ?></span>
                                </a>
                                <?php if(Cart::count()>0): ?>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="<?php echo e(asset('assets/imgs/products')); ?>/<?php echo e($item->model->image); ?>"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="<?php echo e(route('product.details',['slug'=>$item->model->slug])); ?>"><?php echo e($item->model->name); ?></a></h4>
                                                <h4><span><?php echo e($item->qty); ?> × </span>$<?php echo e($item->model->price); ?></h4>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>

                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$<?php echo e(Cart::total()); ?></span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="<?php echo e(route('shop.cart')); ?>" class="outline">View cart</a>
                                            <a href="<?php echo e(route('checkout')); ?>">Checkout</a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="<?php echo e(route('home.index')); ?>"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active" href="<?php echo e(route('categories')); ?>">
                            <a href="<?php echo e(route('categories')); ?>"><span class="fi-rs-apps"></span>All Categories</a>
                        </a>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="active" href="<?php echo e(route('home.index')); ?>">Home </a></li>

                                <li><a href="<?php echo e(route('shop')); ?>">Shop</a></li>
                                <li><a href="<?php echo e(route('manufactors')); ?>">Find your device</a></li>
                                <li><a href="blog.html">Blog </a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <?php if(auth()->guard()->check()): ?>
                                <li class="fi-rs-user"><a href="#"><?php echo e(Auth::user()->name); ?><i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <?php if(Auth::user()->utype==="ADM"): ?>
                                            <li><a href="<?php echo e(route('admin.dashboard')); ?>">Admin dashboard</a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a></li>
                                        <li>
                                            <form method="POST" action="<?php echo e(route("logout")); ?>">
                                                <?php echo csrf_field(); ?>
                                                <a href="<?php echo e(route("logout")); ?>" onclick="event.preventDefault(); this.closest('form').submit()">Log Out</a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <?php else: ?>
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="<?php echo e(route('login')); ?>">Log In</a></li>
                                            <li><a href="<?php echo e(route('register')); ?>">Sign Up</a></li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php echo e($slot); ?>


<footer class="main newsletter">
    <div class="container pb-20 wow fadeIn animated mob-center newsletter">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">
                    <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a>
                </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    &copy; <strong class="text-brand">PartsForAll</strong> All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Vendor JS-->
<script src="<?php echo e(asset('assets/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendor/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendor/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/slick.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/jquery.syotimer.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/wow.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/waypoints.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/counterup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/images-loaded.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/isotope.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/scrollup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/jquery.vticker-min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/jquery.theia.sticky.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/jquery.elevatezoom.js')); ?>"></script>
<!-- Template  JS -->
<script src="<?php echo e(asset('assets/js/main.js?v=3.3')); ?>"></script>
<script src="<?php echo e(asset('assets/js/shop.js?v=3.3')); ?>"></script>
<?php echo \Livewire\Livewire::scripts(); ?>

</body>


</html>
<?php /**PATH /home/buildbot/Desktop/kursova/resources/views/layouts/app.blade.php ENDPATH**/ ?>