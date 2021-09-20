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



       input.form-control{
            border: none;
        }
       input.form-control-lg{
            border: none;
        }


        </style>


@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('translate.customer')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('translate.c_list')}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@foreach($customer as $row)
@section('content')
				<!-- row -->
				<div class="row " style="font-size: 25px;" id="print">
                    <div class="col-lg-12 col-md-12">
                        <div class="card " id="basic-alert">
                            <div class="card-body ">
                                <div class="main-content-label mg-b-5">

                                </div>
                                <p class="mg-b-20"></p>
                                <div class="col-xl-12">
                                    <div class="card border-dark">
                                        <div class="card-header pb-0 ">
                                            <div class="">
                                                <button type="button" onclick="printDiv()"  class=" btn btn-dark waves-effect waves-light"  id="print_btn"
                                                   ><i class="fa fa-print"></i> طباعة </button>

                                            </div>
                                        </div>
                                        <div class="card-body " >
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-2" >
                                                        <div class="row">
                                                            <div class="col-md-12" >
                                                  <img src="data:image/png;base64,{{DNS2D::getBarcodePNG("$row->Qr", 'QRCODE')}}" alt="barcode" style="width: 200px;" />
                                                            </div>
                                                            <br>
                                                            <div class="col-md-12">
                                                                <hr>
                                                            <img src="{{asset('avatar/'.$row->image)}}" style="width: 100%;height: 100%"/>
                                                            </div>
                                                        </div>

                                                        <br>
                                                    </div>

                                                    <div class="col-md-10" style="border: 1px solid black">
                                                        <br><br>
                                                        <br>

                                                        {{trans('translate.name')}} : <input type="text" class="form-control-lg"  name="c_name" id="c_name" value="{{$row->c_name}}" placeholder="{{trans('translate.name')}}" required readonly><br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>{{trans('translate.college')}}</p>
                                                                <input type="email" class="form-control-lg" name="collage_id" id="collage_id" value="{{$row->get_college->c_name}}" placeholder="{{trans('translate.college')}}" required readonly>
                                                                <br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{trans('translate.aria')}}</p>
                                                                <input type="email" class="form-control-lg" name="id_e" id="id_e" value="{{$row->get_area->c_name}}" placeholder="{{trans('translate.aria')}}" required readonly>

                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <hr>
                                                            <p></p>
{{--                                                            <input type="email" class="form-control-lg" name="collage_id" id="collage_id" value="{{$row->ticket_count}}" placeholder="" required readonly>--}}
                                                            @if($row->ticket_count == 0)
                                                                <span class="bg-danger text-white" style="padding: 10px;"> منتهي </span>
                                                                <br><hr>
                                                                <a href="../../reservation/{{$row->id}}" class="">حجز جديد </a>
                                                            @else
                                                               <span class="bg-success text-white" style="padding: 10px;"> مفعل</span>
                                                            @endif
                                                            <br>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <img src="{{asset('33.jpeg')}}" style="width: 100% ;height: 100%">
                                        </div>
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
@endforeach
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

    <script type="text/javascript">

    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        $('#print_btn').css('display','none');
        window.print();
        $('#print_btn').css('display','block');
       window.location.href= '../../customer';
    }

        // function print(){
        //     var printcontents = document.getElementById('print').innerHTML;
        //     document.body.innerHTML = printcontents;
        //     $('#print_btn').css('display','none');
        //     location.reload();
        //     $('#print_btn').css('display','block');
        // }
    </script>


@endsection
