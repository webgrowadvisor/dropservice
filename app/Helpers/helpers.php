<?php
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\ImageManagerStatic as Image;

    function priceicon(): string
    {
        return '₹';
    }

    function helplinenumber(): string
    {
        return '1800-0101-7890';
    }

    function userinfo()
    {
        return Auth::guard('web')->user();
    }
    function admininfo()
    {
        return Auth::guard('admin')->user();
    }

    function sellerinfo()
    {
        return Auth::guard('seller')->user();
    }

    function dropinfo()
    {
        return Auth::guard('dropservice')->user();
    }

    if (!function_exists('getDiscountPercent')) {
        
        function getDiscountPercent($mrp, $price)
        {
            if ($mrp <= 0 || $price <= 0 || $price >= $mrp) {
                return '0 ' . '% off';
            }

            $discount = (($mrp - $price) / $mrp) * 100;

            // Round off to nearest whole number
            return round($discount) . '% off';
        }
    }


    function uploadWebp($file, $folder)
    {
        if (!$file) return null;

        // Ensure folder exists in the 'public' disk
        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }

        // Generate unique filename (without extension)
        $uniqueName = uniqid($folder . '_');

        // Save original image
        $originalExtension = $file->getClientOriginalExtension();
        $originalFilename = "$uniqueName.$originalExtension";
        Storage::disk('public')->putFileAs($folder, $file, $originalFilename);

        // Save webp version
        $webpFilename = "$uniqueName.webp";
        $manager = new ImageManager();
        $webpImage = $manager->make($file)->encode('webp', 90);

        Storage::disk('public')->put("$folder/$webpFilename", (string) $webpImage);

        // $webpImage = Image::make($file)->encode('webp', 90);
        // Storage::disk('public')->put("$folder/$webpFilename", (string) $webpImage);

        // Return both paths if needed
        return [
            'original' => "$folder/$originalFilename",
            'webp'     => "$folder/$webpFilename",
        ];
    }

    function variantImage($webpPath = null, $originalPath = null, $width = 60, $height = 60, $fallback = 'no-image.png')
    {
        // Determine image URLs from storage
        $webpUrl     = $webpPath && Storage::disk('public')->exists($webpPath) ? asset('storage/' . $webpPath) : null;
        $originalUrl = $originalPath && Storage::disk('public')->exists($originalPath) ? asset('storage/' . $originalPath) : null;

        // Fallback if none exist
        $finalImg = $originalUrl ?? asset('images/' . $fallback);

        // Output HTML <picture> tag
        $html = '<picture>';
        if ($webpUrl) {
            $html .= '<source srcset="' . $webpUrl . '" type="image/webp">';
        }
        $html .= '<img src="' . $finalImg . '" width="' . $width . '" height="' . $height . '" style="object-fit:cover; border-radius:6px;">';
        $html .= '</picture>';

        return $html;
    }

    if (!function_exists('categoryImage')) {
        function categoryImage($path = null, $width = 50, $height = 50, $fallback = 'no-image.png')
        {
            $imageUrl = $path && Storage::disk('public')->exists($path)
                ? asset('storage/' . $path)
                : asset('images/' . $fallback);

            return '<img src="' . $imageUrl . '" width="' . $width . '" height="' . $height . '" style="object-fit:cover; border-radius:8px;">';
        }
    }

    if (!function_exists('productImage')) {
        
        function productImage($webpPath = null, $originalPath = null, $width = 152, $height = 152, $fallback = 'no-image.png')
        {
            $webpUrl = $webpPath && Storage::disk('public')->exists($webpPath)
                ? asset('storage/' . $webpPath)
                : null;

            $originalUrl = $originalPath && Storage::disk('public')->exists($originalPath)
                ? asset('storage/' . $originalPath)
                : asset('images/' . $fallback);

            // Final image URL (if no webp available)
            $finalImg = $webpUrl ?? $originalUrl;

            // HTML structure
            $html = '<div class="product-img-wrap" style="position:relative;">';
            $html .= '<picture>';
            if ($webpUrl) {
                $html .= '<source srcset="' . $webpUrl . '" type="image/webp">';
            }
            $html .= '<img src="' . $finalImg . '" alt="Product Image" width="' . $width . '" height="' . $height . '" style="object-fit:cover; border-radius:10px;">';
            $html .= '</picture>';
            $html .= '</div>';

            return $html;
        }
    }


    if (!function_exists('whshlistImage')) {
        function whshlistImage($path = null, $width = 100, $height = 100, $fallback = 'no-image.png')
        {
            $imageUrl = $path && Storage::disk('public')->exists($path)
                ? asset('storage/' . $path)
                : asset('images/' . $fallback);

            return '<img src="' . $imageUrl . '" width="' . $width . '" height="' . $height . '" style="object-fit:cover; border-radius:8px;">';
        }
    }

?>