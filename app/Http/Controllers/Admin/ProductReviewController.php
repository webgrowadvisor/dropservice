<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\Product;
use Auth;

class ProductReviewController extends Controller
{

    public function index()
    {
        $reviews = ProductReview::with(['product'])->latest()->paginate(10);
        return view('admin.review.index', compact('reviews'));
    }

    public function create(Product $product)
    {
        return view('admin.review.create', compact('product'));
    }
    
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        ProductReview::create([
            'product_id' => $product->id,
            'admin_id' => auth()->guard('admin')->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success_msg', 'Review added by admin.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success_msg', 'Review deleted successfully.');
    }

}

// <form action="{{ auth('admin')->check() ? route('admin.reviews.store', $product) : route('reviews.store', $product) }}" method="POST">
//     @csrf
//     <div>
//         <label for="rating">Rating</label>
//         <select name="rating" id="rating" required>
//             <option value="5">⭐⭐⭐⭐⭐</option>
//             <option value="4">⭐⭐⭐⭐</option>
//             <option value="3">⭐⭐⭐</option>
//             <option value="2">⭐⭐</option>
//             <option value="1">⭐</option>
//         </select>
//     </div>

//     <div>
//         <label for="comment">Comment</label>
//         <textarea name="comment" id="comment" rows="3"></textarea>
//     </div>

//     <button type="submit">Submit Review</button>
// </form>

// @foreach($product->reviews as $review)
//     <div>
//         <strong>{{ $review->user->name ?? $review->admin->name }}</strong>
//         <span>Rating: {{ $review->rating }}⭐</span>
//         <p>{{ $review->comment }}</p>
//     </div>
// @endforeach