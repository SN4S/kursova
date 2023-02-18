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
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span> All Manufactors
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
                                        All Manufactors
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.manufacturer.add')}}" class="btn btn-success float-end">Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(\Illuminate\Support\Facades\Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td><img width="150" src="{{asset('assets/imgs/manufactor')}}/{{$category->logo}}"></td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <a href="{{route('admin.manufacturer.edit',['manufacturer_id'=>$category->id])}}">Edit</a>
                                                <a href="#" class="text-danger" style="margin-left: 20px" data-toggle="modal" data-target="#exampleModal" onclick="deleteConfirmation({{$category->id}})">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$categories->links()}}
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
                    Ви точно хочете видалити цього виробника?
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
            @this.set('category_id',id)
            $('#exampleModal').modal('show')
        }
        function deleteCategory(){
            @this.call('deleteCategory')
            $('#exampleModal').modal('hide')
        }
    </script>
</div>
