<?php

namespace App\Http\Controllers;

use App\Services\UtilsService;
use App\Services\AppService;
use App\Services\CryptoService;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function ssoHomePage(){
        try{
            return view('pages/IndexPage', [
                'pageData' => [
                    'title' => 'Admin Home | Official',
                    'pageTitle' => 'Admin Home'
                ]
            ]);
        }
        catch(\Exception $e){
            dd($e);
        }
    }

    
    public function appRegistrationProcess(Request $request){
        try{
            if( !$request->filled('title') ||
                !$request->filled('base_url') ||
                !$request->filled('private_key') ||
                strlen($request->private_key) != 32 ||
                $request->sdk == 'Select SDK' 
            ){
                return redirect()->back()
                ->with('AppMessage','Required Fields are Mandatory')
                ->withInput();
            }

            if (!filter_var($request->base_url, FILTER_VALIDATE_URL)) {
                return redirect()->back()
                ->with('AppMessage','Base URL is not valid.')
                ->withInput();
            }

            if((new AppService())->appByBaseURLAndSDK($request->base_url, $request->sdk)){
                return redirect()->back()
                ->with('AppMessage','App already exists with same SDK.')
                ->withInput();
            }

            $newApp = (new AppService())->registerApp($request);
            return redirect()->to('/app/details/'.$newApp->token);

        }
        catch(\Exception $e){
            dd($e);
        }
    }

    public function appDetailsPage(Request $request){
        try{
            $app = (new AppService())->appByToken($request->appToken);
            if(!$app){
                abort(404);
            }

            $plainAPIKey = (new CryptoService())->decrypt($app->api_key);
            $plainPrivateKey = (new CryptoService())->decrypt($app->private_key);

            return view('pages/AppDetailsPage', [
                'plainAPIKey' => $plainAPIKey,
                'plainPrivateKey' => $plainPrivateKey,
                'app' => $app
            ]);
        }
        catch(\Exception $e){
            dd($e);
        }
    }



}
