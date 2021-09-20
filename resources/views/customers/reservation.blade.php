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
                <h4 class="content-title mb-0 my-auto">{{trans('translate.customer')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('translate.Reservation')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@foreach($customer as $row)
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
                        <a class="btn btn-primary btn-sm" href="../customer">رجوع لقائمة العملاء</a>
                        <hr>
                        <div class="card border-dark">
                            <div class="card-header pb-0 ">
                            </div>


                            <div class="card-body " >
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12" style="border: 1px solid black">


                                            {{trans('translate.name')}} : <input type="text" class="form-control"  name="c_name" id="c_name" value="{{$row->c_name}}" placeholder="{{trans('translate.name')}}"  readonly><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>{{trans('translate.college')}}</p>
                                                    <input type="text" class="form-control" name="collage_id" id="collage_id" value="{{$row->get_college->c_name}}" placeholder="{{trans('translate.college')}}"  readonly>

                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{trans('translate.aria')}}</p>
                                                    <input type="text" class="form-control" name="id_e" id="id_e" value="{{$row->get_area->c_name}}" placeholder="{{trans('translate.aria')}}"  readonly><br>

                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <h3>
                                            الحجز
                                        </h3>
                                        <br>
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <label>نوع التيكت</label>
                                                    <input type="text" class="form-control"  name="c_id" id="c_id" value="{{$row->id}}"  hidden><br>
                                                    <input type="text" class="form-control"  name="qr" id="qr" value="{{$row->Qr}}"  hidden><br>
                                                    <select name="p_id" id="pricelist" class="form-control">
                                                        <option value="" disabled selected>{{trans('translate.option')}}</option>
                                                        @foreach($pricelist as $p_row)
                                                            <option value="{{$p_row->id}}" data-count="{{$p_row->count}}" data-price="{{$p_row->price}}" data-statue="{{$p_row->statue}}"> {{$p_row->c_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                    <div class="col-md-6"  id="prieclist_info"></div>
                                                </div>

                                    </div>
                                    </div>
                                </div>

                            </div>

                        </div>


{{--                        start--}}
                        <div class="card-body">
                            <h3>الحجوزات السابقة</h3>
                            <hr>
                            @if($reservation->count() == 0)
                                <span class="bg-danger-transparent">لا يوجد حجوزات</span>
                            @else
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap hover table-bordered" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">النوع</th>
                                            <th class="wd-15p border-bottom-0">السعر</th>
                                            <th class="wd-15p border-bottom-0">العدد</th>
                                            <th class="wd-15p border-bottom-0">الإجمالي</th>
                                            <th class="wd-15p border-bottom-0">الحالة</th>
                                            <th class="wd-15p border-bottom-0">المستخدم</th>
{{--                                            <th class="wd-15p border-bottom-0"><i class="fa fa-cogs"></i></th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0?>
                                        @foreach($reservation as $r_row)
                                            <?php $i++?>
                                            <tr>
                                                <td class="wd-15p border-bottom-0">{{$r_row->get_price_list->c_name}}</td>
                                                <td class="wd-15p border-bottom-0">{{$r_row->get_price_list->price}}</td>
                                                <td class="wd-15p border-bottom-0">{{$r_row->count}}</td>
                                                <td class="wd-15p border-bottom-0">{{$r_row->total}}</td>
                                                <td class="wd-15p border-bottom-0">
                                                @if($r_row->statue == 1)
                                                        <span class="badge badge-danger-transparent" title="قابل للخصم">غير نشط</span>
                                                    @else
                                                        <span class="badge badge-success-transparent" title="قابل للخصم">نشط</span>
                                                    @endif
                                                </td>
                                                <td class="wd-15p border-bottom-0">{{$r_row->user}}</td>
{{--                                                <td class="wd-15p border-bottom-0">--}}
{{--                                                    <a class="btn btn-danger btn-sm" data-effect="effect-scale" data-toggle="modal" href="#modaldemo4" data-id="{{$r_row->id}}"  data-c_id="{{$r_row->c_id}}"--}}
{{--                                                       data-count="{{$r_row->count}}" ><i class="fa fa-trash"></i></a>--}}

{{--                                                </td>--}}


                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @endif


                        </div>

{{--                        end--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->




    <!--  start -->
    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> {{trans('translate.customer')}} - {{trans('translate.Reservation')}} </h6><button aria-label="Close" class="close" data-dismiss="modal"
              type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('re_store')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>{{trans('translate.confirm')}}</p><br>
                        <input type="hidden" name="id" id="id" value="" required>
                        <input type="hidden" name="qr" id="qr" value="" required>
                        <input type="hidden" name="p_id" id="p_id" value="" required>
                        <input type="hidden" name="statue" id="statue" value="" required>
                        <input type="hidden" name="count" id="count" value="" required>
                        <input type="hidden" name="price" id="price" value="" required>
                        <input type="hidden" name="total" id="total" value="" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!--End -->


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
        function count(){
        let price = $('#price').val();
        let count = $('#count').val();
        $('#total').val(price * count);
        }


        $('#pricelist').change(function (){
            let count = $(this).find(':selected').data('count');
            let price = $(this).find(':selected').data('price');
            let statue = $(this).find(':selected').data('statue');
            let total = price * count;
            $('#prieclist_info').html('<br>' +
                '<input type="hidden" name="statue" id="statue" readonly class="form-control" value="'+statue+'"/></div>'+
                ' <div class="row" ><div class="col-md-2"><label>{{trans('translate.count')}}</label><input type="text" name="count" id="count" onkeyup="count()" class="form-control" value="'+count+'"/></div>' +
                '<div class="col-md-2"><label>{{trans('translate.price')}}</label><input type="text" name="price" id="price" readonly class="form-control" value="'+price+'"/></div>' +
                '<div class="col-md-2"><label>الإجمالي</label><input type="text" id="total" name="total" class="form-control" readonly value="'+total+'"/></div>'+
                '<div class="col-md-2"><label>حفظ الحجز</label><a class="btn btn-primary text-white btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo3"><i class="fa fa-save"></i></a></div></div>');



            $('#modaldemo3').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = $('#c_id').val()
                var qr = $('#qr').val()
                var p_id = $('#pricelist').val()
                var count = $('#count').val()
                var price = $('#price').val()
                var total = $('#total').val()
                var statue = $('#statue').val()
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #qr').val(qr);
                modal.find('.modal-body #p_id').val(p_id);
                modal.find('.modal-body #count').val(count);
                modal.find('.modal-body #price').val(price);
                modal.find('.modal-body #statue').val(statue);
                modal.find('.modal-body #total').val(total);
            });

        });

    </script>





@endsection
