@extends('layouts.master')
@section('title')
    MTG - {{trans('translate.pricelist')}}
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
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('translate.prices')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('translate.pricelist')}}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card" id="basic-alert">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">

                                </div>
                                <p class="mg-b-20"></p>
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="">
                                                <a class="modal-effect btn btn-primary waves-effect waves-light" data-effect="effect-scale"
                                                   data-toggle="modal"
                                                   href="#modaldemo1" title=""><i class="fa fa-plus"></i> {{trans('translate.add')}}</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table text-md-nowrap hover table-bordered" id="example1">
                                                    <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">{{trans('translate.name')}}</th>
{{--                                                        <th class="wd-15p border-bottom-0">{{trans('translate.count')}}</th>--}}
                                                        <th class="wd-15p border-bottom-0">{{trans('translate.price')}}</th>
                                                        <th class="wd-15p border-bottom-0">{{trans('translate.statue')}}</th>
                                                        <th class="wd-15p border-bottom-0"><i class="fa fa-cogs"></i></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=0; ?>
                                                    @foreach($pricelist as $row)
                                                        <?php $i++?>
                                                        <tr>
                                                            <td class="wd-15p border-bottom-0">{{$i}}</td>
                                                            <td class="wd-15p border-bottom-0">{{$row->c_name}}</td>
{{--                                                            <td class="wd-15p border-bottom-0">{{$row->count}} </td>--}}
                                                            <td class="wd-15p border-bottom-0">{{$row->price}} </td>
                                                            <td class="wd-15p border-bottom-0">
                                                                 @if($row->statue == 1)
                                                                    <span class="badge badge-danger" title="قابل للخصم">عادي</span>
                                                                @else
                                                                    <span class="badge badge-success">سنوي</span>
                                                                @endif
                                                            </td>
                                                            <td class="wd-15p border-bottom-0">
                                                                <a class="btn btn-primary text-white"
                                                                   data-effect="effect-scale" data-toggle="modal"
                                                                   href="#modaldemo2"
                                                                   data-id="{{$row->id}}"
                                                                   data-c_name="{{$row->c_name}}"
                                                                   data-price="{{$row->price}}"
                                                                   data-statue="{{$row->statue}}"
                                                                ><i class="fa fa-edit"></i></a>
                                                                <a class="btn btn-danger text-white" data-effect="effect-scale" data-toggle="modal"
                                                                   href="#modaldemo3" data-id="{{$row->id}}"  ><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
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
                @include('pricelist.pricelist_actions')

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



    {{--        Edit --}}
    <script>

        $('#modaldemo2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var c_name = button.data('c_name')
            var price = button.data('price')
            var statue = button.data('statue')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #c_name').val(c_name);
            modal.find('.modal-body #price').val(price);
            if (statue == 1){
                modal.find('.modal-body #statue_last').val(statue);
                modal.find('.modal-body #statue_last').text('عادي' + '- الأختيار السابق');
            }else {
                modal.find('.modal-body #statue_last').val(statue);
                modal.find('.modal-body #statue_last').text('سنوي' + '- الأختيار السابق');
            }


        })
    </script>
    {{--        End Edit --}}

    {{--        Delete --}}
    <script>

        $('#modaldemo3').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
    {{--        End Delete --}}

@endsection

