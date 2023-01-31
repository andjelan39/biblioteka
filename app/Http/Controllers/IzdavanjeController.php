<?php

namespace App\Http\Controllers;

use App\Http\Resources\IzdavanjeCollection;
use App\Http\Resources\IzdavanjeResource;
use App\Models\Izdavanje;
use Illuminate\Http\Request;

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
        //
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
        return response()->json(new IzdavanjeResource($izdavanje));

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
    public function update(Request $request, Izdavanje $izdavanje)
    {
        //
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Izdavanje  $izdavanje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Izdavanje $izdavanje)
    {
        //
    }
}
