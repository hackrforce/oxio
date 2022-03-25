<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Imei;

class ToolsController extends Controller
{
    /**
     *  IMEI Validation Endpoint
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function imei_validator(Request $request)
    {
        // Default response
        $result =  [
            'success' => false,
            'error' => ['Missing input'],
        ];

        // Check if request contains required input(s)
        if($request->get('imei')){
            $result = Imei::validate($request->get('imei'));
        }

        return view('tools.imei_result', $result);
    }
}
