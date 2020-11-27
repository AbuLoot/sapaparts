<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\App;
use App\Project;
use App\Product;
use App\Category;

class InputController extends Controller
{
    public function bot(Request $request)
    {
        $data = json_decode(file_get_contents('php://input', TRUE));
        file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);

        // https://api.telegram.org/1489249296:AAEuvFsUnm62sCCJSoZVLcPHqQOCAbOoURo/setwebhook?url=https://sapaparts.com/bot

        $data = $data['callback_query'] ? $data['callback_query'] : $data['message'];

        define(TOKEN, '1489249296:AAEuvFsUnm62sCCJSoZVLcPHqQOCAbOoURo');

        $message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']), 'utf-8');

        switch ($message) {
        	case 'value':
        		# code...
        		break;
        	
        	default:
        		# code...
        		break;
        }

        $send_data['chat_id'] = $data['chat']['id'];

        $res = sendTelegram($method, $send_data);
    }

    public function sendTelegram($method, $send_datam $header = '')
    {
    	$curl = curl_init();
    	curl_setopt_array($curl, [
    		CURLOPT_POST => 1,
    		CURLOPT_HEADER => 0,
    		CURLOPT_RETURNTRANSFER => 1,
    		CURLOPT_URL => 'https://api.telegram.org/bot'.TOKEN.'/'.$method,
    		CURLOPT_POSTFIELDS => json_encode($data),
    		CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $header),
    	]);

    	$result = curl_exec($curl);
    	curl_close($curl);
    	return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }
}