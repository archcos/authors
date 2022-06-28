<?php

namespace App\Traits;

use Illuminate\Http\Response;


trait ApiResponser{


    public function successResponse($data, $code = Response::HTTP_OK){
        return response()->json(['data'=>$data,'site' => "author" ], $code);
    }

    public function errorResponse($message, $code){
        return response()->json(['error'=>$message, 'code'=>$code,'site' => "author" ], $code);
    }
}