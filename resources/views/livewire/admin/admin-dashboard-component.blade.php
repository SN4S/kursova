<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span> Admin dashboard
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 m-lg-1">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" >
                                        <li class="nav-item">
                                            <a class="nav-link" id="address-tab"  href="{{ route('admin.categories') }}" target="_blank"><i class="fi-rs-settings-sliders mr-10"></i>Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" href="{{ route('admin.products') }}" target="_blank"><i class="fi-rs-settings-sliders mr-10"></i>Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="change-password-tab" href="{{ route('admin.devices') }}" target="_blank"><i class="fi-rs-settings-sliders mr-10"></i>Devices</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="delete-tab" href="{{ route('admin.device-type') }}" target="_blank"><i class="fi-rs-settings-sliders mr-10"></i>Device type</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="deleted-tab" href="{{ route('admin.manufacturer') }}" target="_blank"><i class="fi-rs-settings-sliders mr-10"></i>Device manufacturer</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello {{Auth::user()->first_name}} </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Welcome to your admin panel</p>
                                                <p>Here you can add new products and categories. Also you can change orders status and see all users information.</p>
                                            </div>
                                        </div>
                                    <br>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Orders</h5>
                                            </div>
                                            <div class="card-body">
                                                @if(\Illuminate\Support\Facades\Session::has('message'))
                                                    <div class="alert alert-success" role="alert">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
                                                @endif
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Items</th>
                                                        <th>Address</th>
                                                        <th>Name</th>
                                                        <th>Number</th>
                                                        <th>Payment</th>
                                                        <th>Status</th>
                                                        <th>Price</th>
                                                        <th>Date</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$order->id}}</td>
                                                            <td><a onclick="showProducts({{$order->id}})">Items</a></td>
                                                            <td>{{$order->address}}</td>
                                                            <td>{{$order->first_name}} {{$order->second_name}} {{$order->fathership}}</td>
                                                            <td>{{$order->number}}</td>
                                                            <td>{{$order->payment == 1 ? 'Card Payment' : 'After receiving'}}</td>
                                                            <td>
                                                                @if($order->status == 1)
                                                                    Ordered
                                                                @elseif($order->status == 2)
                                                                    In progress
                                                                @elseif($order->status == 3)
                                                                    Shipped
                                                                @elseif($order->status== 4)
                                                                    Finished
                                                                @else
                                                                    Canceled
                                                                @endif
                                                            </td>
                                                            <td>
                                                                ${{$order->order_price}}
                                                            </td>
                                                            <td>
                                                                {{$order->created_at}}
                                                            </td>
                                                            <td>
                                                                @if($order->status==1)
                                                                    <a href="#" class="text-danger" data-toggle="modal" data-target="#exampleModal" onclick="cancelConfirmation({{$order->id}})">Cancel</a>
                                                                @endif
                                                                <a href="{{ route('admin.order.edit',['order_id'=>$order->id]) }}" class="text-danger">Edit</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    {{$orders->links()}}
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
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
                    Ви точно хочете змінити статус цьому замовленню?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hidemod()" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal">Скасувати</button>
                    <button type="button" class="btn btn-danger" onclick="cancelOrder()">Скасувати замовлення</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="orderproducts" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Товари в замовленні</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_products as $oproduct)
                            <tr>
                                <td><img width="50px" src="{{asset('assets/imgs/products')}}/{{$oproduct->image}}"></td>
                                <td>{{$oproduct->name}}</td>
                                <td>${{$oproduct->price}}</td>
                                <td>x {{$oproduct->count}}</td>
                                <td>${{$oproduct->price * $oproduct->count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cancelConfirmation(id)
        {
            console.log(id)
            @this.set('order_id',id)
            $('#exampleModal').modal('show')
        }
        function showProducts(id){
            @this.set('order_id',id)
            $('#productsModal').modal('show')
        }
        function cancelOrder(){
            @this.call('cancelOrder')
            $('#exampleModal').modal('hide')
        }
        function hidemod(){
            $('#exampleModal').modal('hide')
        }
    </script>













    <table>
        <tr>
            <td><a href="{{route('admin.categories')}}">CATEGORIES</a></td>
        </tr>
        <tr>
            <td><a href="{{route('admin.products')}}">Products</a></td>
        </tr>
    </table>
</div>
