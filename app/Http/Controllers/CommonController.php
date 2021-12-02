<?php

namespace App\Http\Controllers;

use App\Models\WHSubName;

class CommonController extends Controller
{
    public function lot_numbers($id)
    {
        $lot_numbers = WHSubName::where('w_h_id', $id)->get();
        return json_encode($lot_numbers);
    }
}
