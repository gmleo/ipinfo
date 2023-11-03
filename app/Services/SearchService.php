<?php

namespace App\Services;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchService
{
    public static function call_endpoint(Request $request)
    {
        /* API URL */
        $baseUrl = env('API_ENDPOINT');

        // Set IP address and API access key
        // $ip = '67.250.186.196';
        $ip = $request->ip;
        $access_key = env('API_KEY');

        // Initialize CURL
        $ch = curl_init($baseUrl . '?ip=' . $ip . '&accessKey=' . $access_key . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data
        $json_res = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response
        $api_result = json_decode($json_res, true);

        $history = new History();
        if (array_key_exists('success', $api_result) == false) {
            $history->ip = $api_result['ip'];
            $history->continentName = $api_result['continentName'];
            $history->city = isset($api_result['regionName']) ? $api_result['regionName'] : "";
            $history->postalCode = isset($api_result['postalCode']) ? $api_result['postalCode'] : "";
            $history->latitude = $api_result['latitude'];
            $history->longitude = $api_result['longitude'];
            $history->capital = $api_result['capital'];
            $history->countryFlagEmoj = $api_result['countryFlagEmoj'];
            $history->countryFlagEmojUnicode = $api_result['countryFlagEmojUnicode'];
            $history->status = 'Success';
            $history->user_id = Auth::user()->id;
            $history->save();
            return $history;
        } else {
            $history->ip = $request->ip;
            $history->status = 'Fail';
            $history->user_id = Auth::user()->id;
            $history->save();
            return false;
        }
    }
}
