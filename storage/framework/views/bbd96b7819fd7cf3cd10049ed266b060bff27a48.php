<div>
<style>
    nav svg{
        height: 20px;
    }
    nav .hidden{
        display: block;
    }
</style>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo e(route('home.index')); ?>" rel="nofollow">Home</a>
                <span></span> All Categories
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
                                    All Categories
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo e(route('admin.category.add')); ?>" class="btn btn-success float-end">Add New Category</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if(\Illuminate\Support\Facades\Session::has('message')): ?>
                                <div class="alert alert-success" role="alert"><?php echo e(\Illuminate\Support\Facades\Session::get('message')); ?></div>
                            <?php endif; ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>NAME</th>
                                        <th>SLUG</th>
                                        <th>DESCRIPTION</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($category->id); ?></td>
                                        <td><img width="150" src="<?php echo e(asset('assets/imgs/categories')); ?>/<?php echo e($category->image); ?>"></td>
                                        <td><?php echo e($category->name); ?></td>
                                        <td><?php echo e($category->slug); ?></td>
                                        <td><?php echo e($category->short_description); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.category.edit',['category_id'=>$category->id])); ?>">Edit</a>
                                            <a href="#" class="text-danger" style="margin-left: 20px" data-toggle="modal" data-target="#exampleModal" onclick="deleteConfirmation(<?php echo e($category->id); ?>)">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($categories->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ви впевнені?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Х</span>
                </button>
            </div>
            <div class="modal-body">
                Ви точно хочете видалити цю категорію?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal">Скасувати</button>
                <button type="button" class="btn btn-danger" onclick="deleteCategory()">Видалити</button>
            </div>
        </div>
    </div>
</div>

    <script>
        function deleteConfirmation(id)
        {
            console.log(id)
            window.livewire.find('<?php echo e($_instance->id); ?>').set('category_id',id)
            $('#exampleModal').modal('show')
        }
        function deleteCategory(){
            window.livewire.find('<?php echo e($_instance->id); ?>').call('deleteCategory')
            $('#exampleModal').modal('hide')
        }
    </script>
</div>
<?php /**PATH /home/buildbot/Desktop/kursova/resources/views/livewire/admin/admin-categories-component.blade.php ENDPATH**/ ?>