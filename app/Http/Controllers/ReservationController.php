<?php

namespace App\Http\Controllers;

use App\Prise;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.reservation');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reservation::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function confirm($id){
        $reservation=Reservation::find($id);
        $reservation->statu = 'confirmed';
        $reservation->save();
        return redirect()->back();
    }

    public function reject($id){
        $reservation=Reservation::find($id);
        $reservation->statu = 'rejected';
        $reservation->save();
        return redirect()->back();
    }

    public function allouer($id){
        $reservation=Reservation::find($id);
        $prise = Prise::create([
            'first_name' => $reservation->first_name,
            'last_name' => $reservation->last_name,
            'card_student' => $reservation->card_student,
            'book_id' => $reservation->book_id,
            'statu' => 'confirmed',
        ]);

        $reservation->book->nb_exemplaire--;
        $reservation->book->save();
        $reservation->statu = 'fait';
        $reservation->save();
        return redirect()->back();
    }
}
