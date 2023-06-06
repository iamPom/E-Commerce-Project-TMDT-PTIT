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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    {{-- Cart --}}
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Add / Des</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php $sum = 0; ?>
                        @foreach ($cartItems as $key => $cartItem)
                            <tr data-product-id="{{ $key }}">
                                <td class="align-middle"><img src="{{ asset("storage/{$cartItems[$key]['image']}") }}"
                                        alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                                <td class="align-middle">{{ $cartItems[$key]['name'] }}</td>
                                <td class="align-middle product-price">{{ $cartItems[$key]['price'] }}</td>
                                <td class="align-middle" data-key="{{ $key }}"
                                    data-price="{{ $cartItems[$key]['price'] }}">
                                    <form action="{{ route('cart.update', ['id' => $key]) }}" method="GET">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text"
                                                class="form-control form-control-sm bg-secondary text-center product-quantity"
                                                name="quantity" value="{{ $cartItems[$key]['quantity'] }}"
                                                onchange="document.getElementById(<?php echo $key; ?>).submit()"
                                                autocomplete="off">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td class="align-middle product-total">

                                    @php $price = $cartItems[$key]['quantity'] * $cartItems[$key]['price'];
                                                                                $sum += $price;
                                                                        @endphp 
                                    {{ number_format($cartItems[$key]['quantity'] * $cartItems[$key]['price'], 0, '.', ',') . ' VND' }}

                                </td>
                                <td class="align-middle"><button class="btn btn-sm btn-primary"
                                        onclick="window.location.href='{{ route('cart.delete', ['id' => $key]) }}'"><i
                                            class="fa fa-times"></i></button></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium cart-subtotal">{{ number_format($sum, 0, '.', ',') }}VND</h6>
                        </div>
                        {{-- <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div> --}}
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold cart-total">{{ number_format($sum, 0, '.', ',') }} VND</h5>
                        </div>
                        <a href="{{route('checkout')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endsection
