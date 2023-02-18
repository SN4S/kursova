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
                    <span></span> My orders
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
                                        My Orders
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
                                        <th>Items</th>
                                        <th>Address</th>
                                        <th>Number</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td><a>Items</a></td>
                                            <td>{{$order->address}}</td>
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
                                                @if($order->status==1)
                                                    <a href="#" class="text-danger" data-toggle="modal" data-target="#exampleModal" onclick="cancelConfirmation({{$order->id}})">Cancel</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                    Ви точно хочете скасувати це замовлення?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hidemod()" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal">Скасувати</button>
                    <button type="button" class="btn btn-danger" onclick="cancelOrder()">Скасувати замовлення</button>
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
        function cancelOrder(){
            @this.call('cancelOrder')
            $('#exampleModal').modal('hide')
        }
        function hidemod(){
            $('#exampleModal').modal('hide')
        }
    </script>
</div>
