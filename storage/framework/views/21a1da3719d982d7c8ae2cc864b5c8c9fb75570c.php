<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo e(route('home.index')); ?>" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(Session::has('success_message')): ?>
                                    <div class="alert alert-success">
                                        <strong>Success | <?php echo e(Session::get('success_message')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <?php if(Cart::count() > 0): ?>
                                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="image product-thumbnail"><img src="<?php echo e(asset('assets/imgs/products')); ?>/<?php echo e($item->model->image); ?>" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="<?php echo e(route('product.details',['slug'=>$item->model->slug])); ?>"><?php echo e($item->model->name); ?></a></h5>
                                    </td>
                                    <td class="price" data-title="Price"><span>$<?php echo e($item->model->price); ?></span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('<?php echo e($item->rowId); ?>')"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val"><?php echo e($item->qty); ?></span>
                                            <a href="#" class="qty-up"  wire:click.prevent="increaseQuantity('<?php echo e($item->rowId); ?>')"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>$<?php echo e($item->subtotal); ?> </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="#" class="text-muted" wire:click.prevent="destroy('<?php echo e($item->rowId); ?>')"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted" wire:click.prevent="clearAll()"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <p>Cart is Empty</p>
                            <?php endif; ?>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12"></div>


                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td class="cart_total_label">Cart Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">$<?php echo e(Cart::subtotal()); ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">$<?php echo e(Cart::total()); ?></span></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if(Cart::count()>0): ?>
                                    <a href="<?php echo e(route('checkout')); ?>" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main></div>
<?php /**PATH /home/buildbot/Desktop/kursova/resources/views/livewire/cart-component.blade.php ENDPATH**/ ?>