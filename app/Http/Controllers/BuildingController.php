<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Auth;
use Log;
class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user()->role == '1') {
            $buildings = Building::all();
            return view('building.index', compact('buildings'));
        }else{
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'street_address'     => ['required', 'string', 'max:50'],
            'street_number'      => ['required', 'string', 'max:8'],
            'postal_code'        => ['required', 'numeric', 'max:5'],
            'city'               => ['required', 'string', 'max:30'],
        ], [
            'street_address.required'   => 'Inserimento obbligatorio',
            'street_address.string'     => 'Inserimento obbligatorio',
            'street_address.max'        => 'L\'indirizzo può essere lungo massimo 50 caratteri',
            'street_number.required'    => 'Inserimento obbligatorio',
            'street_number.string'      => 'Il numero civico deve una stringa',
            'street_number.max'         => 'Il numero civico è lungo massimo 8 caratteri',
            'postal_code.required'      => 'Inserimento obbligatorio',
            'postal_code.numeric'       => 'Il codice postale deve essere composto da soli numeri',
            'postal_code.max'           => 'Il codice postale è lungo massimo 5 caratteri',
            'city.required'             => 'Inserimento obbligatorio',
            'city.string'               => 'La città deve esssere composta da lettere',
            'city.max'                  => 'Impossibile inserire più di 30 caratteri',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $building = new Building();
        $building->street_address = $input['street_address'];
        $building->street_number = $input['street_number'];
        $building->postal_code = $input['postal_code'];
        $building->city = $input['city'];
        $building->save();
        return json_encode(['status' => 'ok', 'building' => $building]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        
        $building->delete();
       
        Log::info($building);
        return json_encode(['status' => 'ok']);
    }
}
