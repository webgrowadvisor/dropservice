<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartComponent extends Component
{

    public $cart = [];
    public $total = 0;

    protected $listeners = ['cartUpdated' => 'refreshCart'];

    public function mount()
    {
        $this->refreshCart();
    }

    public function refreshCart()
    {
        $this->cart = session()->get('cart', []);
        $this->total = collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public function addToCart($productId, $qty = 1)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $qty;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $qty
            ];
        }

        session()->put('cart', $cart);
        // $this->emit('cartUpdated');
        $this->dispatch('cartUpdated');
        $this->dispatchBrowserEvent('cartAdded', ['message' => 'Item added to cart!']);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        // $this->emit('cartUpdated');
        $this->dispatch('cartUpdated');
    }
    
    public function render()
    {
        return view('livewire.cart-component');
    }
}
