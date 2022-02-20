{{--@dd($carts)--}}
@extends('customer.layout.app')
@section('title', 'cart')
@section('content')
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="{{ route('customer.product.index') }}"
                                                        class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Shopping cart</p>
                                            <p class="mb-0">You have <strong>{{ $data['carts_count'] }}</strong> items in your cart</p>
                                        </div>
                                        <div>
                                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                                                                        class="text-body">price
                                                    <i class="fas fa-angle-down mt-1"></i></a></p>
                                        </div>
                                    </div>

                                    @if($data['carts'] !== 0)
                                        @foreach($data['carts'] as $cart)
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img
                                                                    src="{{ asset('images/'.$cart->image) }}"
                                                                    class="img-fluid rounded-3" alt="Shopping item"
                                                                    style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5>{{ $cart->product_title }}</h5>
                                                                <p class="small mb-0">256GB, Navy Blue</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0">{{ $cart->quantity }}</h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0">$900</h5>
                                                            </div>

                                                            <form class="d-inline"
                                                                  action="{{ route('customer.cart.delete', $cart->id) }}"
                                                                  method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="{{ route('customer.cart.delete', $cart->id) }}"
                                                                   onclick="event.preventDefault();
                                                                    this.closest('form').submit();" style="color: #cecece;"><i
                                                                        class="fas fa-trash-alt text-danger"></i></a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <p>the cart is empty</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <form class="d-inline" action="{{ route('customer.cart.empty') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-danger"  href="{{ route('customer.cart.empty') }}"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">Empty Cart</a>
                                    </form>
                                </div>
                                <div class="col-lg-5">

                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Card details</h5>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                     class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                            </div>

                                            <p class="small mb-2">Card type</p>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-visa fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-amex fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-paypal fa-2x"></i></a>

                                            <form class="mt-4">
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeName"
                                                           class="form-control form-control-lg" siez="17"
                                                           placeholder="Cardholder's Name"/>
                                                    <label class="form-label" for="typeName">Cardholder's Name</label>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeText"
                                                           class="form-control form-control-lg" siez="17"
                                                           placeholder="1234 5678 9012 3457" minlength="19"
                                                           maxlength="19"/>
                                                    <label class="form-label" for="typeText">Card Number</label>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input type="text" id="typeExp"
                                                                   class="form-control form-control-lg"
                                                                   placeholder="MM/YYYY" size="7" id="exp" minlength="7"
                                                                   maxlength="7"/>
                                                            <label class="form-label" for="typeExp">Expiration</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input type="password" id="typeText"
                                                                   class="form-control form-control-lg"
                                                                   placeholder="&#9679;&#9679;&#9679;" size="1"
                                                                   minlength="3" maxlength="3"/>
                                                            <label class="form-label" for="typeText">Cvv</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Subtotal</p>
                                                <p class="mb-2">$4798.00</p>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Shipping</p>
                                                <p class="mb-2">$20.00</p>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total(Incl. taxes)</p>
                                                <p class="mb-2">$4818.00</p>
                                            </div>

                                            <button type="button" class="btn btn-info btn-block btn-lg">
                                                <div class="d-flex justify-content-between">
                                                    <span>$4818.00</span>
                                                    <span>Checkout <i
                                                            class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                </div>
                                            </button>

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
@endsection
