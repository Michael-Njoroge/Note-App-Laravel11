<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

}
