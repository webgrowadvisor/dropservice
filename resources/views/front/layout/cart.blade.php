

    {{-- <div class="bs-canvas bs-canvas-left position-fixed bg-cart h-100">
        <div class="bs-canvas-header side-cart-header p-3 ">
            <div class="d-inline-block  main-cart-title">My Cart <span>({{ count(session('cart', [])) }} Items)</span></div>
            <button type="button" class="bs-canvas-close close" aria-label="Close"><i
                    class="uil uil-multiply"></i></button>
        </div>
        <div class="bs-canvas-body">
            <div class="cart-top-total">
                @php
                    $cart = session('cart', []);
                    $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
                    $delivery = 10;
                    $total = $subtotal + $delivery;
                @endphp
                <div class="cart-total-dil">
                    <h4>Gambo Super Market</h4>
                    <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $subtotal }}</span>
                </div>
                <div class="cart-total-dil pt-2">
                    <h4>Delivery Charges</h4>
                    <span><i class="fa-solid fa-indian-rupee-sign"></i>{{ $delivery }}</span>
                </div>
            </div>
            <div class="side-cart-items">

                @forelse(session('cart', []) as $id => $item)
                    <div class="cart-item" data-id="{{ $id }}">
                        <div class="cart-product-img">
                            {!! categoryImage($item['image'], 60, 60) !!}
                        </div>
                        <div class="cart-text">
                            <h4>{{ $item['name'] }}</h4>
                            <div class="qty-group">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus minus-btn">
                                    <input type="number" step="1" name="quantity" value="{{ $item['quantity'] }}" class="input-text qty text">
                                    <input type="button" value="+" class="plus plus-btn">
                                </div>
                                <div class="cart-item-price">
                                    ₹{{ $item['price'] * $item['quantity'] }}
                                </div>
                            </div>
                            <button type="button" class="cart-close-btn"><i class="uil uil-multiply"></i></button>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Your cart is empty</p>
                @endforelse

            </div>
        </div>
        <div class="bs-canvas-footer">
            <div class="cart-total-dil saving-total ">
                <h4>Total Saving</h4>
                <span><i class="fa-solid fa-indian-rupee-sign"></i>{{ collect($cart)->sum(fn($item) => ($item['mrp'] - $item['price']) * $item['quantity']) }}</span>
            </div>
            <div class="main-total-cart">
                <h2>Total</h2>
                <span><i class="fa-solid fa-indian-rupee-sign"></i>{{ $total }}</span>
            </div>
            <div class="checkout-cart">
                <a href="#" class="promo-code">Have a promocode?</a>
                <a href="{{route('checkout')}}" class="cart-checkout-btn hover-btn">Proceed to Checkout</a>
            </div>
        </div>
    </div> --}}
<div id="cart-sidebar-container">

</div>

