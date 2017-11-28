<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JsonStatus;
use App\Http\Requests;

class PageController extends Controller
{

    public $client;

    public function __construct()
    {
        $this->client = new  \GuzzleHttp\Client(['base_uri' => 'http://ahmad.idelogi.com/mobile/']);
    }

    public function transaction(){
      try{
        $getResponse = $this->client->request('GET','sejarah.php');
        $getResponse = json_decode($getResponse->getBody());
        return $getResponse;
      }catch (\Exception $e){
        return JsonStatus::messageException($e);
      }
    }
}
