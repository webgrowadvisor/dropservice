<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    
    public function index()
    {
        $media = Media::latest()->paginate('10');
        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        foreach ($request->file('images') as $image) {
            $paths = uploadWebp($image, 'media_uploads');

            Media::create([
                'original_path' => $paths['original'],
                'webp_path'     => $paths['webp'],
                'alt_text'      => $image->getClientOriginalName(),
            ]);
        }

        return redirect()->route('media.index')->with('success_msg', 'Images uploaded successfully!');
    }

    public function destroy($id)
    {

        $media = Media::find($id);

        try {
            if ($media->original_path) {
                if (Storage::disk('public')->exists($media->original_path)) {
                    Storage::disk('public')->delete($media->original_path);
                }
            }

            if ($media->webp_path) {
                if (Storage::disk('public')->exists($media->webp_path)) {
                    Storage::disk('public')->delete($media->webp_path);
                }
            }

            $media->delete();

            return redirect()->back()->with('success_msg', 'Image deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error_msg', 'Error: ' . $e->getMessage());
        }

    }

}
