<?php

namespace App\Services;
use Illuminate\Encryption\Encrypter;

class CryptoService
{
    protected function systemKey(){
        return config('app.CIPHER_KEY');
    }

    public function encrypt($text){
        $key = $this->systemKey();
        $crypto = new Encrypter($key, 'aes-256-cbc');
        return $crypto->encrypt($text);
    }

    public function decrypt($text){
        $key = $this->systemKey();
        $crypto = new Encrypter($key, 'aes-256-cbc');
        return $crypto->decrypt($text);
    }

    public function testThis(){
        //dd($this->encrypt('Hello'));
        //dd($this->decrypt('eyJpdiI6IjJGeTRGUUdLcFdwekl0Q042aGlYaUE9PSIsInZhbHVlIjoiNEtsUmVzMlNJcmZ3YWgxRjBqOWNnUT09IiwibWFjIjoiZmI1ZDllNGNlNjQyY2IzNzliZWI5N2RlNWRkMzI1ZTA3ZTgzMGExODBjMTRhYWMzOWRkMTliNmUyNjhiY2M3MyIsInRhZyI6IiJ9'));
    }

    
}