<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="fi-rs-key mr-10"></i>Change password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="delete-tab" data-bs-toggle="tab" href="#delete" role="tab" aria-controls="delete" aria-selected="true"><i class="fi-rs-sign-out mr-10"></i>Delete account</a>
                                        </li>
                                        <li class="nav-item">
                                            <form method="POST" action="{{route("logout")}}">
                                                @csrf
                                            <a class="nav-link" href="{{route("logout")}}" onclick="event.preventDefault(); this.closest('form').submit()"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello {{Auth::user()->first_name}} </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#orders">recent orders</a>, manage your <a href="#address">addresses</a> and <a href="#change-password">edit your password</a> and <a href="#account-detail">account details.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Your Orders</h5>
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
                                                                <td><a onclick="showProducts({{$order->id}})">Items</a></td>
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

                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('profile.update') }}" name="enq">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Display Name <span class="required">*</span></label>
                                                            <x-text-input required="" class="form-control square" name="name" type="text" :value="old('name', Auth::user()->name)"/>
                                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>First Name <span class="required">*</span></label>
                                                            <x-text-input required="" class="form-control square" name="first_name" type="text" :value="old('first_name', Auth::user()->first_name)"/>
                                                            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Last Name <span class="required">*</span></label>
                                                            <x-text-input required="" class="form-control square" name="second_name" type="text" :value="old('second_name', Auth::user()->second_name)"/>
                                                            <x-input-error class="mt-2" :messages="$errors->get('second_name')" />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Father Name <span class="required">*</span></label>
                                                            <x-text-input required="" class="form-control square" name="fathership" type="text" :value="old('fathership', Auth::user()->fathership)"/>
                                                            <x-input-error class="mt-2" :messages="$errors->get('fathership')" />
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span class="required">*</span></label>
                                                            <x-text-input required="" class="form-control square" name="email" type="email" :value="old('email', Auth::user()->email)"/>
                                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Phone number <span class="required">*</span></label>
                                                            <x-text-input required="" class="form-control square" name="phone" :value="old('phone', Auth::user()->phone)"/>
                                                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label>Shipping address<span class="required">*</span></label>
                                                                <x-text-input required="" class="form-control square" name="address" type="text" :value="old('address', Auth::user()->address)"/>
                                                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <x-primary-button>Save</x-primary-button>
                                                            @if (session('status') === 'profile-updated')
                                                                <p
                                                                    x-data="{ show: true }"
                                                                    x-show="show"
                                                                    x-transition
                                                                    x-init="setTimeout(() => show = false, 2000)"
                                                                    class="text-sm text-gray-600"
                                                                >{{ __('Saved.') }}</p>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Change password</h5>
                                            </div>
                                            <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('put')

                                                    <div>
                                                        <x-input-label for="current_password" :value="__('Current Password')" />
                                                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                    </div>

                                                    <div>
                                                        <x-input-label for="password" :value="__('New Password')" />
                                                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                    </div>

                                                    <div>
                                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                                    </div>

                                                    <div class="flex items-center gap-4">
                                                        <x-primary-button class="col-md-12">{{ __('Save') }}</x-primary-button>

                                                        @if (session('status') === 'password-updated')
                                                            <p
                                                                x-data="{ show: true }"
                                                                x-show="show"
                                                                x-transition
                                                                x-init="setTimeout(() => show = false, 2000)"
                                                                class="text-sm text-gray-600"
                                                            >{{ __('Saved.') }}</p>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Are you sure you want to delete your account?') }}
                                                    </h2>

                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                                    </p>

                                                    <div class="mt-6">
                                                        <x-input-label for="password" value="Password" class="sr-only" />

                                                        <x-text-input
                                                            id="password"
                                                            name="password"
                                                            type="password"
                                                            class="mt-1 block w-3/4"
                                                            placeholder="Password"
                                                        />

                                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                                    </div>

                                                        <x-danger-button class="col-md-6">
                                                            {{ __('Delete Account') }}
                                                        </x-danger-button>

                                                </form>
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
                Ви точно хочете скасувати це замовлення?
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
</div>
