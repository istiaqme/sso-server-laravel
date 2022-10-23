<?php

namespace App\Services;

use App\Models\App;
use Illuminate\Support\Str;

class AppService
{
    public function registerApp($request){
        $utilsService = new UtilsService();
        $apiKey = $utilsService->randomNumString(7).'-'.$utilsService->randomNumString(7).'-'.$utilsService->randomNumString(7).'-'.$utilsService->randomNumString(7);
        $newRow = new App();
        $newRow->token = $utilsService->makeToken();
        $newRow->title = $request->title;
        $newRow->base_url = $request->base_url;
        $newRow->sdk = $request->sdk;
        $newRow->api_key = (new CryptoService())->encrypt($apiKey);
        $newRow->private_key = (new CryptoService())->encrypt($request->private_key);
        $newRow->status = 0;
        $newRow->save();

        return $newRow;

    }

    public function appByBaseURLAndSDK($baseURL, $sdk){
        return App::where('base_url', $baseURL)->where('sdk', $sdk)->first();
    }

    public function appByToken($token){
        return App::where('token', $token)->first();
    }

    
}


