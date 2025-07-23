<?php

namespace App\Http\Controllers\api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Encryption\EncryptionHelper;
use App\Http\Controllers\Controller;

class apiDataProjectController extends Controller
{
    public function index(Request $request){
        // $data = Project::all();

        // return response()->json($data, 200);

        $client = $request->get('authenticated_client');  // Assuming ClientAuth middleware is working
        $data = $client->project()->get();  // Fetch the products for the authenticated client

        // Prepare the response data
        $responseData = [
            'message' => 'Success',
            'data' => $client,
        ];

        // Encrypt the response data
        $encryptedResponse = EncryptionHelper::encrypt(json_encode($responseData));

        // Return the encrypted response
        return response()->json(['data' => $encryptedResponse]);

    }
}
