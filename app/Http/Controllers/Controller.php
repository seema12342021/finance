<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use App\Models\{Transaction};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $crypto_price;

    public  function encrypt($plainText,$key){
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }

        /*
        * @param1 : Encrypted String
        * @param2 : Working key provided by CCAvenue
        * @return : Plain String
        */
        public  function decrypt($encryptedText,$key){
            $key = $this->hextobin(md5($key));
            $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
            $encryptedText = $this->hextobin($encryptedText);
            $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
            return $decryptedText;
        }

        public  function hextobin($hexString) { 
            $length = strlen($hexString); 
            $binString="";   
            $count=0; 
            while($count<$length) 
            {       
                $subString =substr($hexString,$count,2);           
                $packedString = pack("H*",$subString); 
                if ($count==0)
                {
                    $binString=$packedString;
                } 
                
                else 
                {
                    $binString.=$packedString;
                } 
                
                $count+=2; 
            } 
            return $binString; 
        }//end of method


        public function getCryptoValue(){
            $client = new Client();
            $res = $client->request('GET', 'https://api.bofin.tech/exchange/currencies/ticker?key=c25737715c4ee510ae12ecc965a275fc98e2d169&ids=USDT&convert=INR');
             if($res->getStatusCode() == 200){
                $data = $res->getBody();
                $data = json_decode($data,true);
                $res = Transaction::orderBy("id","DESC")->first();
                if($data){
                    if(count($data)>0){
                        $this->crypto_price = number_format($data[0]['price'] , 2);
                    }else{
                        $this->crypto_price = $res?$res->actual_crypto_price:env('CRYPTO_PRICE');
                    }
                }else{
                    $this->crypto_price = $res?$res->actual_crypto_price:env('CRYPTO_PRICE');
                }
            }
        }//end of method


}//end of class
