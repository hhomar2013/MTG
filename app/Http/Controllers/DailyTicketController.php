<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\college;
use App\Models\customers;
use App\Models\daily_ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $daily = daily_ticket::where('customer_id',$id)->orderBy('id','desc')->get();
        $customer = customers::where('id',$id)->get();
        return view('ticket.daily_tickets',compact(['daily','customer']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets_main()
    {
        $college = college::all();
        $area  =area::all();
        $customer = customers::all()->sortByDesc('id');
        return view('ticket.ticket_main',compact('college','area'));
    }

    public function ticket_report(Request $request)
    {
            $daily_ticket ='';
            $output ='';
            $to = Carbon::parse($request->to)->format('Y/m/d');
            $from = Carbon::parse($request->from)->format('Y/m/d');
             $daily_ticket = DB::table('colleges')
            ->select('daily_tickets.*','customers.c_name as cust_name','areas.c_name AS area_name','colleges.c_name AS college_name')
            ->join('customers','colleges.id','=','customers.c_id')
            ->join('daily_tickets','daily_tickets.customer_id','=','customers.id')
            ->join('areas','areas.id','=','customers.id_e')
            ->Where('statue','1')
            ->whereBetween('date_add',[$to,$from])
            ->where('colleges.id','like',"$request->college%")
            ->Where('areas.id','like',"$request->area%")->get();
//             $output .='<hr>';
//             $output.='<h3> العدد : '.$daily_ticket->count().'</h3>';
//    $output.='<div class="table-responsive">';
//    $output.='<table class="table text-md-nowrap" id="example1">';
//    $output.='<thead>';
//    $output.='<tr>';
//    $output.='<th class="wd-15p border-bottom-0">الأسم</th>';
//    $output.='<th class="wd-10p border-bottom-0">الجامعة</th>';
//    $output.='<th class="wd-25p border-bottom-0">المنطقة</th>';
//    $output.='<th class="wd-25p border-bottom-0">اليوم - التاريخ - الوقت</th>';
//    $output.='</tr>';
//    $output.='</thead>';
//    $output.='<tbody>';


            foreach ($daily_ticket as $row){
                $output.='<tr class="wd-15p border-bottom-0">';
                $output.='<td class="wd-15p border-bottom-0">'.$row->cust_name.'</td>';
                $output.='<td class="wd-15p border-bottom-0">'.$row->college_name.'</td>';
                $output.='<td class="wd-15p border-bottom-0">'.$row->area_name.'</td>';
                $output.='<td class="wd-15p border-bottom-0">'.Carbon::parse($row->date_add)->dayName.' - '. $row->date_add. ' - '. $row->time .'</td>';
                $output.='</tr>';
            }
//			$output.='</tbody>';
//			$output.='</table>';
//            $output .='</div>';
           return response()->json($output);
//        $customer = customers::all()->sortByDesc('id');
//        return view('ticket.cust_list',compact(['customer']));
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
     * @param  \App\Models\daily_ticket  $daily_ticket
     * @return \Illuminate\Http\Response
     */
    public function show(daily_ticket $daily_ticket)
    {
        $college = college::all();
        $area  =area::all();
        $customer = customers::all()->sortByDesc('id');
        return view('ticket.cust_list',compact(['customer','college','area']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\daily_ticket  $daily_ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(daily_ticket $daily_ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\daily_ticket  $daily_ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, daily_ticket $daily_ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\daily_ticket  $daily_ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(daily_ticket $daily_ticket)
    {
        //
    }
}
