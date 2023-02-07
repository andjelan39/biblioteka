<?php

namespace App\Http\Controllers;

use App\Http\Resources\IzdavanjeCollection;
use App\Http\Resources\IzdavanjeResource;
use App\Models\Izdavanje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IzdavanjeController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $izdavanja = Izdavanje::all();
        return new IzdavanjeCollection($izdavanja);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naziv_knjige' => 'required',
            'autor_knjige' => 'required',
            'napomena'=>'required',
            'datum_izdavanja' => 'required|date_format:Y-m-d',
            'datum_vracanja'=>'required|date_format:Y-m-d',
            'knjiga_id'=>'required',
            'student_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $izdavanje = Izdavanje::create([
            'naziv_knjige' => $request->naziv_knjige,
            'autor_knjige' => $request->autor_knjige,
            'napomena' => $request->napomena,
            'datum_izdavanja' => $request->datum_izdavanja,
            'datum_vracanja' => $request->datum_vracanja,
            'knjiga_id' => $request->knjiga_id,
            'student_id' => $request->student_id,
            'user_id' => Auth::user()->id
        ]);

        return response()->json(['Izdavanje je uspesno sacuvano.', new IzdavanjeResource($izdavanje)]);

    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function show($izdavanje_id)
    {
        $izdavanje = Izdavanje::find($izdavanje_id);
        if(is_null($izdavanje)){
            return response()->json('Data not found', 404);
        }
        return new IzdavanjeResource($izdavanje);

    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function edit(Izdavanje $izdavanje)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $izdavanje_id)
    {
        $validator = Validator::make($request->all(), [
            'datum_izdavanja' => 'required|date_format:Y-m-d',
            'datum_vracanja'=>'required|date_format:Y-m-d',
            'napomena'=>'required',
            'knjiga_id'=>'required',
            'student_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $izdavanje = Izdavanje::find($izdavanje_id);
        $izdavanje->datum_izdavanja = $request->datum_izdavanja;
        $izdavanje->datum_vracanja = $request->datum_vracanja;
        $izdavanje->napomena = $request->napomena;
        $izdavanje->knjiga_id = $request->knjiga_id;
        $izdavanje->student_id = $request->student_id;

        $izdavanje->save();

        return response()->json(['Izdavanje je azurirano.', new IzdavanjeResource($izdavanje)]);

    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $izdavanje_id)
    {
        $izdavanje = Izdavanje::findOrFail($izdavanje_id);
        if(is_null($izdavanje)){
            return response()->json('Trazeno izdavanje ne postoji', 404);
        }
        $izdavanje->delete();

        return response()->json(['Uspesno ste obrisali izdavanje.']);
    }
}
