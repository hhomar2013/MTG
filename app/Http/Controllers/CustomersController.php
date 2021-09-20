<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\college;
use App\Models\customers;
use App\Models\daily_ticket;
use App\Models\price_list;
use App\Models\reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $college = college::all();
        $area  =area::all();
        $customer = customers::all()->sortByDesc('id');
        return view('customers.customer',compact(['customer','college','area']));
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

        $file_ex = $request->file('image')->getClientOriginalExtension();
        $filename= $request->c_name .'-'. $request->phone.'.'. $file_ex;
        $path = 'avatar';
        $request->file('image')->move($path,$filename);
        customers::create([
            'Qr'=>$request->Qr,
            'c_name'=>$request->c_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'national_id'=>$request->national_id,
            'c_id'=>$request->collage_id,
            'id_e'=>$request->id_e,
            'ticket_count'=>'0',
            'ticket_type'=>'0',
            'image'=>$filename,
            'user'=>Auth::user()->name
        ]);
        session()->flash('Add');
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if($request->file('image_new') == null){
            $customer = customers::findOrFail($request->id);
            $customer->update([
                'c_name'=>$request->c_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'national_id'=>$request->national_id,
                'c_id'=>$request->collage_id,
                'id_e'=>$request->id_e,
                'ticket_count'=>'0',
                'user'=>Auth::user()->name
            ]);
            session()->flash('Edit');
            return redirect()->route('customer.index');
        }else{
            $file_ex = $request->file('image_new')->getClientOriginalExtension();
            $filename= $request->c_name .'-'. $request->phone.'.'. $file_ex;
            $path = 'avatar';
            $request->file('image_new')->move($path,$filename);
            $customer = customers::findOrFail($request->id);
            $customer->update([
                'c_name'=>$request->c_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'national_id'=>$request->national_id,
                'c_id'=>$request->collage_id,
                'id_e'=>$request->id_e,
                'ticket_count'=>'0',
                'image'=>$filename,
                'user'=>Auth::user()->name
            ]);
            session()->flash('Edit');
            return redirect()->route('customer.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customers = customers::findOrFail($request->id);
        $customers->delete();
        session()->flash('Delete_message');
        return redirect()->route('customer.index');
    }

    public function print($id)
    {
        $customer = customers::where('id',$id)->get();
        $reservation = reservation::where('qr',$customer[0]->Qr)->get();
        if($reservation->count() == 1){
            return view('customers.print',compact('customer'));
        }else{
            session()->flash('Error','برجاء الحجز اولا لطباعة الكارنية !!!!');
            return redirect()->route('customer.index');
        }

    }

    public function reservation($id)
    {
        $pricelist = price_list::all();
        $customer = customers::where('id',$id)->get();
        $reservation = reservation::where('c_id',$id)->orderBy('id','desc')->limit(1)->get();
        return view('customers.reservation',compact(['customer','pricelist','reservation']));
    }

    public function store_reservation(Request $request)
    {
        $customer = customers::findOrFail($request->id);
        $price_list = price_list::where('id',$request->p_id)->get();
        if($price_list[0]->statue == 1){
            $customer->update([
                'ticket_count'=>$request->count,
                'ticket_type'=>$price_list[0]->statue
            ]);
        }else{
            $customer->update([
                'ticket_count'=>360,
                'ticket_type'=>$price_list[0]->statue
            ]);
        }

        reservation::create([
            'c_id' => $request->id,
            'qr' => $request->qr,
            'p_id'=> $request->p_id,
            'count' =>$request->count,
            'price'=>$request->price,
            'total'=>$request->total,
            'statue'=>2,
            'user'=>Auth::user()->name,
        ]);
        session()->flash('Add');
        return redirect()->route('customer.index');
    }


//    Start SearchTicket
    public function SearchTicket(Request $request)
    {


        $output ='';
        $qr = $request->id;
        $go_back = $request->search_statue;
            $date_add = Carbon::now()->format('Y/m/d');
            $customer = customers::where('qr',$qr)->orWhere('phone',$qr)->orWhere('c_name',$qr)->get();
            $daily_ticket = daily_ticket::where([['customer_id','=',$customer[0]->id],['date_add','=',$date_add],['statue','=',$go_back]])->get();
            $daily_ticket_last = daily_ticket::where([['customer_id','=',$customer[0]->id],['date_add','=',$date_add]])->get();
            foreach ( $customer as $r_row)
                if($daily_ticket->count() == 1)
                {

                    $output .= '<div id="message" ></div>';
                    if($go_back == 1){
                        $output .='<h3 class="text-black-50">بطاقة ذهاب</h3>';
                    }else{
                        $output .='<h3 class="text-black-50">بطاقة عودة</h3>';
                    }
                    $output .= '<div class="row bg-warning text-white" style="padding: 50px;width: auto;height: auto">';
                    $output .= '<div class="col-lg-6">';
                    $output .= '<img src="../avatar/'.$r_row->image.'" class="rounded-50" alt="User Avatar" style="width: 100%;height: 100%;"/>';
                    $output .= '</div>';
                    $output .= '<div class="col-lg-6" style="border-right:1px solid black;padding: 40px;">';
                    $output .='<h3 class="widget-user-username">الأسم : '.$r_row->c_name.'</h3><hr>';
                    $output .='<h3 class="widget-user-username">الجامعة : '.$r_row->get_college->c_name.'</h3><hr>';
                    $output .='<h3 class="widget-user-username">المنطقة : '.$r_row->get_area->c_name.'</h3>';
//                    $output .='<h3 class="widget-user-username">باقى التذاكر : '.$r_row->ticket_count.'</h3>';
                    $output .= '<hr><div id="search_result_msg"><h3 class="bg-danger  text-white" style="padding: 10px;">تم التسجيل بالفعل اليوم :'.Carbon::parse($daily_ticket[0]->date_add)->dayName.' - '.$daily_ticket[0]->date_add.'</h3></div>';
                    $output .= '</div>';
                    $output .= ' </div>';

                }elseif($daily_ticket->count() == 0 && $daily_ticket_last->count() == 1){

                    $output .= '<div id="message" ></div>';
                    $output .='<h3 class="text-black-50">بطاقة العودة</h3>';
                    $output .= '<div class="row bg-info text-white" style="padding: 50px;width: auto;height: auto">';
                    $output .= '<div class="col-lg-6">';
                    $output .= '<img src="../avatar/'.$r_row->image.'" class="rounded-10" alt="User Avatar" style="width: 100%;height: 100%;"/>';
                    $output .= '</div>';
                    $output .= '<div class="col-lg-6" style="border-right:1px solid black;padding: 40px;">';
                    $output .='<input type="hidden" id="cust_id" value="'.$r_row->id.'"/>';
                    $output .='<input type="hidden" id="date_now" value="'.Carbon::now()->format('Y/m/d').'"/>';
                    $output .='<input type="hidden" id="time_now" value="'.Carbon::now()->format('h:i:s A').'"/>';
                    $output .='<h3 class="widget-user-username">الأسم : '.$r_row->c_name.'</h3><hr>';
                    $output .='<h3 class="widget-user-username">الجامعة : '.$r_row->get_college->c_name.'</h3><hr>';
                    $output .='<h3 class="widget-user-username">المنطقة : '.$r_row->get_area->c_name.'</h3><hr>';
                    $output .='<h3 class="widget-user-username">باقى التذاكر : '.$r_row->ticket_count.'</h3><hr>';
                    if($daily_ticket_last[0]->count > 1){
                    $i = $daily_ticket_last[0]->count;
                    $count_go = $i - 1;
                    $output .='<h3 class="widget-user-username"> أصطحاب : '. $count_go .'</h3><hr>';
                    }
                    $output .='<input type="number" value="0" class="form-control" id="count_ticket" onkeyup="check_ticket_count()"/>';
                    $output .= '<hr><div id="search_result_msg"></div>';
                    $output .= '<a class="btn btn-primary btn-block text-white" data-effect="effect-scale" data-toggle="modal"
                    href="#modaldemo3"><i class="fa fa-save"></i></a>';
                    $output .= '</div>';
                    $output .= ' </div>';
                }else{
                    //Star
                    if ($r_row->ticket_count == 0)
                    {
                        $output .= '<div id="message" ></div>';
                        $output .= '<div class="row bg-secondary text-white" style="padding: 50px;width: auto;height: auto">';
                        $output .= '<div class="col-lg-6">';
                        $output .= '<img src="../avatar/'.$r_row->image.'" class="rounded-50" alt="User Avatar" style="width: 100%;height: 100%;"/>';
                        $output .= '</div>';
                        $output .= '<div class="col-lg-6" style="border-right:1px solid black;padding: 40px;">';
                        $output .='<h3 class="widget-user-username">الأسم : '.$r_row->c_name.'</h3><hr>';
//                        $output .='<h3 class="widget-user-username">الجامعة : '.$r_row->get_college->c_name.'</h3><hr>';
//                        $output .='<h3 class="widget-user-username">المنطقة : '.$r_row->get_area->c_name.'</h3><hr>';
//                        $output .='<h3 class="widget-user-username">باقى التذاكر : '.$r_row->ticket_count.'</h3>';
                        $output .= '<hr><div id="search_result_msg"><h3 class="bg-danger  text-white" style="padding: 10px;">منتهي</h3></div>';
                        $output .= '</div>';
                        $output .= ' </div>';
                    }elseif($r_row->ticket_count !== 0 && $daily_ticket->count() == 0){
                        $output .= '<div id="message" ></div>';
                        $output .='<h3 class="text-black-50">بطاقة الذهاب</h3>';
                        $output .= '<div class="row bg-secondary text-white" style="padding: 50px;width: auto;height: auto">';
                        $output .= '<div class="col-lg-6">';
                        $output .= '<img src="../avatar/'.$r_row->image.'" class="rounded-10" alt="User Avatar" style="width: 100%;height: 100%;"/>';
                        $output .= '</div>';
                        $output .= '<div class="col-lg-6" style="border-right:1px solid black;padding: 40px;">';
                        $output .='<input type="hidden" id="cust_id" value="'.$r_row->id.'"/>';
                        $output .='<input type="hidden" id="date_now" value="'.Carbon::now()->format('Y/m/d').'"/>';
                        $output .='<input type="hidden" id="time_now" value="'.Carbon::now()->format('h:i:s A').'"/>';
                        $output .='<h3 class="widget-user-username">الأسم : '.$r_row->c_name.'</h3><hr>';
                        $output .='<h3 class="widget-user-username">الجامعة : '.$r_row->get_college->c_name.'</h3><hr>';
                        $output .='<h3 class="widget-user-username">المنطقة : '.$r_row->get_area->c_name.'</h3><hr>';
                        $output .='<h3 class="widget-user-username">باقى التذاكر : '.$r_row->ticket_count.'</h3><hr>';
                        $output .='<input type="number" value="1" class="form-control" id="count_ticket" onkeyup="check_ticket_count()"/>';
                        $output .= '<hr><div id="search_result_msg"></div>';
                        $output .= '<a class="btn btn-primary btn-block text-white" data-effect="effect-scale" data-toggle="modal"
            href="#modaldemo3"><i class="fa fa-save"></i></a>';
                        $output .= '</div>';
                        $output .= ' </div>';


                    }
                    if($customer->count() === 0){
                        $output .= '<div class="row bg-secondary text-white" style="padding: 50px;width: auto;height: auto">';
                        $output .= '<div class="col-lg-12">';
                        $output .='<h3 class="widget-user-username">لا يوجد بيانات لعرضها !!</h3><hr>';
                        $output .= '</div>';
                        $output .= ' </div>';
                    }
//  End


                }





        return response()->json($output);

    }
//    End SearchTicket
    public function check_ticket(Request $request)
    {
        $qr = $request->id;
        $customer = customers::where('qr',$qr)->get();
        foreach ($customer as $row)
        if($row->ticket_count <  $request->count_ticket){
            return response()->json('<h3>لا يوجد عدد كافى من التذاكر</h3>');
        }
        if ($request->count_ticket > 1){
                return response()->json('<label>ملاحظة</label><input type="text" class="form-control" maxlength="100" value="أصطحاب" name="note" id="note"/><br>');
        }elseif ($request->search_statue == 2 && $request->count_ticket > 0){
            return response()->json('<label>ملاحظة</label><input type="text" class="form-control" maxlength="100" value="أصطحاب" name="note" id="note"/><br>');
        }
    }

    public function store_daily_ticket(Request $request)
    {
        $customer = customers::findOrFail($request->id);
        $type = $customer->ticket_type;
        $last_count = $customer->ticket_count;
        $end_count = $last_count - $request->count_ticket;
        if($type == 1){
            $customer->update([
                'ticket_count'=>$end_count
            ]);
        }
        if ($request->note == null){
            daily_ticket::create([
                'customer_id'=>$request->id,
                'count'=>$request->count_ticket,
                'note'=>'لا يوجد',
                'date_add'=>$request->date_now,
                'time'=>$request->time_now,
                'statue'=>$request->search_statue,
                'user'=>Auth::user()->id,
            ]);
        }else{
            daily_ticket::create([
                'customer_id'=>$request->id,
                'count'=>$request->count_ticket,
                'note'=>$request->note,
                'date_add'=>$request->date_now,
                'time'=>$request->time_now,
                'statue'=>$request->search_statue,
                'user'=>Auth::user()->id,
            ]);
        }

        return response()->json('<div class="card bd-0 mg-b-20 alert">
        <div class="card-body text-success">
            <div class="main-error-wrapper">
                <i class="si si-check mg-b-20 tx-50"></i>
                <h4 class="mg-b-20"><strong>تم الحفظ بنجاح</strong></h4>
            </div>
        </div>
    </div>');

//        return redirect()->route('customer.index');

    }

}
