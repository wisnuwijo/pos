<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;

class ContractController extends Controller
{
    public function index() {
        return view("contract.index");
    }

    public function store(Request $request) {
        // handle file
        $fieldFile = $request->file('tfevidence');
        $mime= $fieldFile->getClientOriginalExtension();
        $imageName = time().".".$mime;
        $moveFile = \Storage::disk('public')->put("contract/renew",  $fieldFile);
        $baseUrl = URL::to('/');
        $imgUrl = $baseUrl.'/storage/'. $moveFile;

        // handle date
        $currentDate = date('Y-m-d');
        $contractEndDate = date('Y-m-d', strtotime('+'. $request->duration .' month', strtotime($currentDate)));

        // insert to DB
        $insertDB = DB::table('contract')->insert([
            "from" => date('Y-m-d'),
            "to" => $contractEndDate,
            "transfer_evidence" => $imgUrl,
            "is_verified" => 0,
            "created_at" => now()
        ]);

        // send WA notification
        $waToken = env('WA_TOKEN');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v20.0/114180767965566/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "messaging_product": "whatsapp",
            "to": "6289689055106",
            "type": "template",
            "template": {
                "name": "hello_world",
                "language": {
                    "code": "en_US"
                }
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '. $waToken,
            'Cookie: ps_l=1; ps_n=1'
        ),
        ));

        $response = curl_exec($curl);
        $responseJson = json_decode($response);
        curl_close($curl);

        try {
            // success send WA notif
            if ($responseJson->messages[0]->id != "") return view("contract.thanks");
        } catch (\Throwable $th) {
            // error send WA notif, redirect back to entry the form
            return redirect()->back();
        }
    }
}
