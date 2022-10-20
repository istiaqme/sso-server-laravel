<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\App;
use App\Services\CryptoService;

class APIAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // get http referer
        $requestFromApp = $request->headers->get('referer');
        if(config('app.env') == 'local'){
            $requestFromApp = 'Localhost'; // This is pre seeded data
        }
        $apiKey = $request->headers->get('auth-key');
        if(!$requestFromApp){
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Invalid App.'
                ], 
            400);
        }

        
        // check database has app information
        $app = App::where('base_url', $requestFromApp)->first();
        if($apiKey !== (new CryptoService())->decrypt($app->api_key)){
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Login Failed.'
                ], 
            401);
        }

        if(!$app->binded_ips){
            // ip bind needs not to be checked, add app info to request for future use and return next
            define('APP_ID', $app->id);
            return $next($request);
        }

        // check for binded ips
        if(count($app->binded_ips) == 0){
            // ip bind needs not to be checked, add app info to request for future use and return next
            define('APP_TOKEN', $app->token);
            return $next($request);
        }
        
        // as binded ips are in array, check the current ip is in the list or not
        if(in_array($request->ip(), $app->binded_ips)){
            define('APP_TOKEN', $app->token);
            return $next($request);
        }
        else{
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Login Failed.'
                ], 
            422);
        }
        
    }
}
