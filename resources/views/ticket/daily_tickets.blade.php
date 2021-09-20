@extends('layouts.master')
@section('title')
    MTG - {{trans('translate.customer')}}
@endsection
@section('css')

    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Interenal Accordion Css -->
    <link href="{{URL::asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />


    <style>

    </style>


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('translate.customer')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('translate.Ticket')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row "  id="print">
        <div class="col-lg-12 col-md-12">
            <div class="card " id="basic-alert">
                <div class="card-body ">
                    <div class="main-content-label mg-b-5">

                    </div>
                    <p class="mg-b-20"></p>
                    <div class="col-xl-12">
                        @can('لوحة التحكم')
                            <a class="btn btn-primary btn-sm" href="../customer">رجوع لقائمة العملاء</a>
                            <hr>
                        @endcan

                        <div class="card border-dark">
                            <div class="card-header pb-0 ">
                            </div>


                            {{--                        start--}}
                            <div class="card-body">
                                <h3>التذاكر المسحوبة</h3>
                                <hr>
                                @foreach($customer as $c_row)
                                    <h4>الأسم : {{$c_row->c_name}}</h4> - <h4>باقي التذاكر : {{$c_row->ticket_count}}</h4>
                                @endforeach
                                <hr>

                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap hover table-bordered" id="example1">
                                            <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">العدد</th>
                                                <th class="wd-15p border-bottom-0">الحالة</th>
                                                <th class="wd-15p border-bottom-0">اصطحاب</th>
                                                <th class="wd-15p border-bottom-0">اليوم / التاريخ / الوقت</th>
                                         </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=0?>
                                            @foreach($daily as $r_row)
                                                <?php $i++?>
                                                <tr>
                                                    <td class="wd-15p border-bottom-0">{{$r_row->count}}</td>
                                                    @if($r_row->statue == 1)
                                                        <td class="wd-15p border-bottom-0">
                                                            <h3 class="badge badge-success-transparent" title="">ذهاب </h3>
                                                        </td>
                                                    @elseif($r_row->statue == 2)
                                                        <td class="wd-15p border-bottom-0">
                                                        <h3 class="badge badge-danger-transparent " title="">عودة</h3>
                                                        </td>
                                                    @endif

                                                    <td class="wd-15p border-bottom-0">
                                                        @if($r_row->count > 1)
                                                            <span class="badge badge-success-transparent" title="">أصطحاب : {{$r_row->count}}</span>
                                                        @else
                                                            <span class="badge badge-danger-transparen  t" title="">لا يوجد</span>
                                                        @endif
                                                    </td>
                                                    <td class="wd-15p border-bottom-0">{{\Carbon\Carbon::parse($r_row->date_add)->dayName .' / ' . $r_row->date_add .' / '. $r_row->time }}</td>

                                                </tr>

                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>



                            </div>

                            {{--                        end--}}

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->




    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

@section('js')

    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--- Internal Accordion Js -->
    <script src="{{URL::asset('assets/plugins/accordion/accordion.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/accordion.js')}}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>




@endsection
