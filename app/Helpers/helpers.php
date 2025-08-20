<?php
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\ImageManagerStatic as Image;

    function priceicon(): string
    {
        return '₹';
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

?>