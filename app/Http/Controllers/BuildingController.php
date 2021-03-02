<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Auth;
use Log;
use DB;
use Illuminate\Support\Facades\Validator;
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'street_address'     => ['required', 'string', 'max:50'],
            'street_number'      => ['required', 'string', 'max:8'],
            'postal_code'        => ['required', 'numeric'],
            'city'               => ['required', 'string', 'max:30'],
        ], [
            'street_address.required'   => 'Inserimento obbligatorio',
            'street_address.string'     => 'Inserimento obbligatorio',
            'street_address.max'        => 'Impossibile inserire più di 50 caratteri',
            'street_number.required'    => 'Inserimento obbligatorio',
            'street_number.string'      => 'Deve essere composto da caratteri',
            'street_number.max'         => 'Impossibile inserire più di 8 caratteri',
            'postal_code.required'      => 'Inserimento obbligatorio',
            'postal_code.numeric'       => 'Deve essere composto da soli numeri',
            'city.required'             => 'Inserimento obbligatorio',
            'city.string'               => 'Deve essere composto da caratteri',
            'city.max'                  => 'Impossibile inserire più di 30 caratteri',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // create ajax
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        return view('building.edit', compact('building'));
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
        $this->validator($request->all(), $building)->validate();

        $input = $request->all();

        $building->street_address = $input['street_address'];
        $building->street_number = $input['street_number'];
        $building->postal_code = $input['postal_code'];
        $building->city = $input['city'];
        $building->save();

        return redirect('/building');
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
