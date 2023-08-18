<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $data = [
            'status' => 200,
            'key1' => 'value1',
            'key2' => 'value2',
            'key3' => 'value3'
        ];

        return response()->json($data);
    }
}
