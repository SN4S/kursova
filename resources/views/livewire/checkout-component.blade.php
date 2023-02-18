<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                @auth()
                    @else
                <div class="row">
                    <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an account?</span> <a href="{{route('login')}}" >Click here to login</a></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                        <form wire:submit.prevent="checkout">
                            <div class="form-group">
                                <input type="text" required="" name="first_name" placeholder="First name *"  wire:model="first_name">
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="second_name" placeholder="Last name *" wire:model="second_name" >
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="fathership" placeholder="Father name *" wire:model="fathership">
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" required="" placeholder="Address *" wire:model="address">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="number" placeholder="Phone *" wire:model="number">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="email" placeholder="Email address *" wire:model="email">
                            </div>
                            <div class="form-group">
                                <select class="form-control" required="" type="text" name="payment" wire:model="payment" placeholder="Select payment method *">
                                    <option value="">Select payment method</option>
                                    <option value="1">Card</option>
                                    <option value="2">After shipping</option>
                                </select>
                            </div>

                            <button type="submit" class="btn-primary btn float-end">Order</button>

                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{asset('assets/imgs/products')}}/{{$item->model->image}}" alt="#"></td>
                                        <td>
                                            <h5><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></h5> <span class="product-qty">x {{$item->qty}}</span>
                                        </td>
                                        <td>${{$item->model->price}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="2">${{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="2"><em>Free</em></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">${{Cart::total()}}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main></div>
