<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo e(route('home.index')); ?>" rel="nofollow">Home</a>
                    <span></span> Update order
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Update orders
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-succes float-end">All order</a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <?php if(\Illuminate\Support\Facades\Session::has('message')): ?>
                                    <div class="alert alert-success" role="alert"><?php echo e(\Illuminate\Support\Facades\Session::get('message')); ?></div>
                                <?php endif; ?>
                                <form wire:submit.prevent="updateCategory">
                                    <div class="mb-3 mt-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" name="status" wire:model="status">
                                            <option value="">Select Status</option>

                                            <option value="1">Ordered</option>
                                            <option value="2">In progress</option>
                                            <option value="3">Shipping</option>
                                            <option value="4">Finished</option>
                                                <option value="5">Canceled</option>

                                        </select>
                                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Update order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>
<?php /**PATH /home/buildbot/Desktop/kursova/resources/views/livewire/admin/admin-edit-order-component.blade.php ENDPATH**/ ?>