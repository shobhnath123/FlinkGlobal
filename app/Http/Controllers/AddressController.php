<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function suggest(Request $request)
    {
        $query = strtolower($request->q);
        // Guard: prevent bad requests
        if (strlen($query) < 3) {
            return response()->json([
                'success' => false,
                'addresses' => []
            ]);
        }
        // Get OAuth token (cached)
        $token = cache()->remember('nzpost_token', 3500, function () {
            $res = Http::asForm()->post(
                'https://oauth.nzpost.co.nz/as/token.oauth2',
                [
                    'grant_type' => 'client_credentials',
                    'client_id' => config('services.nzpost.client_id'),
                    'client_secret' => config('services.nzpost.client_secret'),
                ]
            );

            if (!$res->successful()) {
                throw new \Exception('NZ Post OAuth failed');
            }

            return $res->json()['access_token'];
        });

        // Call NZ Post AddressChecker
        $response = Http::withToken($token)
            ->acceptJson()
            ->get(
                'https://api.nzpost.co.nz/addresschecker/1.0/find',
                [
                    'address_line_1' => $query, // REQUIRED
                    'max' => 5,
                ]
            );

        // Handle NZ Post error response
        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'message' => 'NZ Post API error',
                'raw' => $response->body()
            ], 400);
        }

       return response()->json($response->json());
    }
}
