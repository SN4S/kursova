<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo e(route('home.index')); ?>" rel="nofollow">Home</a>
                    <span></span> Add New Device Type
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
                                        Add New Device Type
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?php echo e(route('admin.device-type')); ?>" class="btn btn-succes float-end">All Device Types</a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <?php if(\Illuminate\Support\Facades\Session::has('message')): ?>
                                    <div class="alert alert-success" role="alert"><?php echo e(\Illuminate\Support\Facades\Session::get('message')); ?></div>
                                <?php endif; ?>
                                <form wire:submit.prevent="storeDevtype">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter category name" wire:model="name"/>
                                        <?php $__errorArgs = ['name'];
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
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" placeholder="Enter description" wire:model="description"></textarea>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" wire:model="image"/>
                                        <?php if($image): ?>
                                            <img src="<?php echo e($image->temporaryUrl()); ?>" width="120">
                                        <?php endif; ?>
                                        <?php $__errorArgs = ['image'];
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
                                    <button type="submit" class="btn btn-primary float-end">Add new device type</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php /**PATH /home/buildbot/Desktop/kursova/resources/views/livewire/admin/admin-add-device-type-component.blade.php ENDPATH**/ ?>