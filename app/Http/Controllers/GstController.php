<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GstController extends Controller
{
    
    public function getGstDetails(Request $request)
    {
        $request->validate([
            'gstin' => 'required|string',
        ]);

        $response = Http::post('https://services.gst.gov.in/services/api/search/taxpayerDetails', [
            'GSTIN' => $request->gstin,
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json([
                'error' => 'GST API failed',
                'details' => $response->body()
            ], $response->status());
        }
    }

}
