<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\daily_ticket;
use App\Models\reservation;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ticket.ticket');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $user = Auth::user()->id;
        $ticket_go = daily_ticket::where([['user',$user],['date_add',Carbon::now()->format('Y/m/d')],['statue',1]])->get();
        $ticket_back = daily_ticket::where([['user',$user],['date_add',Carbon::now()->format('Y/m/d')],['statue',2]])->get();
        return  view('ticket.ticket_list',compact(['ticket_go','ticket_back']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $reservation = reservation::findOrFail($request->id);
//        $reservation->forceDelete();
            return $reservation;
//        $customer = customers::findOrFail($request->id);


//        session()->flash('Delete');
//        return redirect()->route('customer.index');
    }
}
