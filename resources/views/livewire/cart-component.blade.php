<div class="bs-canvas bs-canvas-left position-fixed bg-cart h-100">
    <div class="bs-canvas-header side-cart-header p-3">
        <div class="d-inline-block main-cart-title">
            My Cart <span>({{ count($cart) }} Items)</span>
        </div>
        <button type="button" class="bs-canvas-close close" aria-label="Close"><i class="uil uil-multiply"></i></button>
    </div>

    <div class="bs-canvas-body">
        @forelse($cart as $id => $item)
            <div class="cart-item">
                <div class="cart-product-img">
                    {!! categoryImage($item['image'] ?? 50, 50) !!}
                </div>
                <div class="cart-text">
                    <h4>{{ $item['name'] }}</h4>
                    <div class="qty-group">
                        <div class="quantity buttons_added">
                            <button wire:click="addToCart({{ $id }}, -1)" class="minus minus-btn">-</button>
                            <input type="text" value="{{ $item['quantity'] }}" readonly class="input-text qty text">
                            <button wire:click="addToCart({{ $id }}, 1)" class="plus plus-btn">+</button>
                        </div>
                        <div class="cart-item-price">
                            ₹{{ $item['price'] * $item['quantity'] }}
                        </div>
                    </div>
                    <button wire:click="removeFromCart({{ $id }})" type="button" class="cart-close-btn">
                        <i class="uil uil-multiply"></i>
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3">Your cart is empty.</p>
        @endforelse
    </div>

    <div class="bs-canvas-footer">
        <div class="main-total-cart">
            <h2>Total</h2>
            <span>₹{{ $total }}</span>
        </div>
        <div class="checkout-cart">
            <a href="{{ route('checkout') }}" class="cart-checkout-btn hover-btn">Proceed to Checkout</a>
        </div>
    </div>
</div>