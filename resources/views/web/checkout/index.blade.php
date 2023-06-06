@extends('web/layouts/app')
@section('slider')
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 410px;">
                <img class="img-fluid" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height: 410px;">
                <img class="img-fluid" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
@endsection
@section('content')
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>

    {{-- Checkout --}}
    <div class="container-fluid pt-5">
        <form action="{{route('order')}}" method="POST">
            @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" value="{{ auth()->user()->email }}" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" name="phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="address" placeholder="123 Street">
                        </div>
                        {{-- <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="newaccount">
                            <label class="custom-control-label" for="newaccount">Create an account</label>
                        </div>
                    </div> --}}
                        {{-- <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse"
                                    data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4" style="color:green">Khách hàng nên thanh toán bằng VN_PAY thời gian xử lý đơn hàng sẽ nhanh hơn</h4>
                    <div class="row">
                        {{-- <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="collapse mb-4" id="show-bill">
                    <h4 class="font-weight-semi-bold mb-4">Thanh toán khi nhận hàng</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Note</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <?php
                    $sum = 0; ?>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Products</h5>
                            @foreach ($cartItems as $key => $cartItem)
                            <div class="d-flex justify-content-between">
                                <p>{{$cartItems[$key]['name']}}</p>
                                <p>{{number_format($cartItems[$key]['price'], 0, ".", ",")." VND"}}</p>
                            </div>
                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium"><?php 
                                    $cartItemTotalPrice = $cartItems[$key]['price'] * $cartItems[$key]['quantity']; 
                                    $sum += $cartItemTotalPrice;
                                    
                            ?>
           {{ number_format($cartItemTotalPrice, 0, ".", ",")}}</h6>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">{{number_format($sum, 0, ".", ",")}} VND</h5>
                            </div>
                        </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="1">
                                {{-- <label class="custom-control-label" for="paypal">VN-QR Pay</label> --}}
                                <label class="custom-control-label" for="paypal" data-toggle="collapse"
                                data-target="#shipping-address">VN Pay</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="0">
                                <label class="custom-control-label" for="directcheck" data-toggle="collapse"
                                data-target="#show-bill">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type= "submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
