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
                    <span></span> All Products
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
                                        All Products
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.products.add')}}" class="btn btn-success float-end">Add New Product</a>
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
                                        <th>IMAGE</th>
                                        <th>NAME</th>
                                        <th>SLUG</th>
                                        <th>PRICE</th>
                                        <th>STOCK</th>
                                        <th>SMALL DESCRIPTION</th>
                                        <th>CATEGORY</th>
                                        <th>DEVICE</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td><img src="{{asset('assets/imgs/products')}}/{{$product->image}}" width="60px"></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->slug}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->stock_status}}</td>
                                            <td>{{$product->short_description}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->device->manufactor->name}} {{$product->device->name}}</td>
                                            <td>
                                                <a href="{{route('admin.products.edit',['product_id'=>$product->id])}}">Edit</a>
                                                <a href="#" class="text-danger" data-toggle="modal" data-target="#exampleModal" onclick="deleteConfirmation({{$product->id}})">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$products->links()}}
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
                    Ви точно хочете видалити цей товар?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hidemod()" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal">Скасувати</button>
                    <button type="button" class="btn btn-danger" onclick="deleteProduct()">Видалити</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteConfirmation(id)
        {
            console.log(id)
            @this.set('product_id',id)
            $('#exampleModal').modal('show')
        }
        function deleteProduct(){
            @this.call('deleteProduct')
            $('#exampleModal').modal('hide')
        }
        function hidemod(){
            $('#exampleModal').modal('hide')
        }
    </script>
</div>
