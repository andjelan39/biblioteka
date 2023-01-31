<?php

namespace App\Http\Controllers;

use App\Models\Izdavanje;
use Illuminate\Http\Request;

class KnjigaIzdavanjeController extends Controller
{
    public function index($knjiga_id)
    {
        $izdavanja = Izdavanje::get()->where('knjiga_id', $knjiga_id);
        if(is_null($izdavanja)){
            return response()->json('Data not found', 404);
        }
        return response()->json($izdavanja);
    }
}
