<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DropshipperProductController;
use App\Http\Controllers\API\PublicProductController;
use App\Http\Controllers\API\DropshipperOrderController;
use Carbon\Carbon;

// GET /api/dropshipper/products?api_key=SELLER_API_KEY&limit=20
Route::get('/single/seller/products', [DropshipperProductController::class, 'index']);
// {
//   "status": true,
//   "seller": {
//     "id": 2,
//     "name": "Tech Store",
//     "email": "tech@example.com"
//   },
//   "products": [
//     {
//       "id": 1,
//       "seller_id": 2,
//       "category_id": 5,
//       "name": "Bluetooth Speaker",
//       "description": "High-quality sound",
//       "base_price": "1500.00",
//       "thumbnail": "products/speaker.webp",
//       "status": 1,
//       "brand": "Boat",
//       "product_specail": "true",
//       "stock": 25,
//       "variants": [
//         {
//           "id": 1,
//           "product_id": 1,
//           "sku": "SPK-BLK",
//           "price": "1499.00",
//           "stock": 10,
//           "options": "Black",
//           "image": "variants/black.jpg",
//           "webp": "variants/black.webp"
//         }
//       ],
//       "category": {
//         "id": 5,
//         "name": "Audio"
//       }
//     }
//   ]
// }

// GET /api/single/product/bluetooth-speaker
Route::get('/single/product/{slug}', [DropshipperProductController::class, 'showSingleProduct']);
// {
//   "status": true,
//   "product": {
//     "id": 1,
//     "seller_id": 2,
//     "category_id": 5,
//     "name": "Bluetooth Speaker",
//     "slug": "bluetooth-speaker",
//     "description": "High-quality sound",
//     "base_price": "1500.00",
//     "thumbnail": "products/speaker.webp",
//     "status": 1,
//     "brand": "Boat",
//     "product_specail": "true",
//     "stock": 25,
//     "variants": [
//       {
//         "id": 1,
//         "product_id": 1,
//         "sku": "SPK-BLK",
//         "price": "1499.00",
//         "stock": 10,
//         "options": "Black",
//         "image": "variants/black.jpg",
//         "webp": "variants/black.webp"
//       }
//     ],
//     "category": {
//       "id": 5,
//       "name": "Audio"
//     },
//     "seller": {
//       "id": 2,
//       "name": "Tech Store"
//     }
//   }
// }

// GET /api/products/new?limit=12
Route::get('/products/latest', [PublicProductController::class, 'newProducts']);
// {
//   "status": true,
//   "products": [
//     {
//       "id": 5,
//       "name": "Wireless Mouse",
//       "base_price": "450.00",
//       "created_at": "2025-07-04",
//       "category": { "id": 3, "name": "Accessories" },
//       "seller": { "id": 1, "name": "Tech Guru" },
//       "variants": [
//         {
//           "id": 7,
//           "sku": "MOU-BLK",
//           "price": "499.00",
//           "stock": 50,
//           "options": "Black",
//           "image": "mouse_black.jpg"
//         }
//       ]
//     }
//   ]
// }

// /api/dropshipper/order
// Content-Type: application/json
// {
//   "dropshiper_id": 1,
//   "product_id": 12,
//   "variant_id": 20,
//   "quantity": 2,
//   "price": 599.00,
//   "mobile": "9876543210",
//   "address": "Sector 18, Noida",
//   "payment_method": "cod", //cod,paid
//   "delivery_type": "normal" // normal,VIP
//   "name": "Pawan"  // user name
// 'dropshiper_invoice_no' ,
//  'dropshiper_sale_price' ,
// 'dropshiper_other'   ,

// }
Route::post('/dropshipper/order', [DropshipperOrderController::class, 'store']);
// {
//   "status": true,
//   "message": "Order placed successfully.",
//   "order_number": "ORD-3A8JSD93",
//   "order_id": 102
// }