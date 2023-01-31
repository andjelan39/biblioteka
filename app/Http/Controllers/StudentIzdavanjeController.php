<?php

namespace App\Http\Controllers;

use App\Models\Izdavanje;
use Illuminate\Http\Request;

class StudentIzdavanjeController extends Controller
{
    public function index($student_id)
    {
        $izdavanja = Izdavanje::get()->where('student_id', $student_id);
        if(is_null($izdavanja)){
            return response()->json('Data not found', 404);
        }
        return response()->json($izdavanja);

    }
}
