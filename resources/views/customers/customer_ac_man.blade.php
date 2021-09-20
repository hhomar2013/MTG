<!-- add man -->
<div class="modal" id="modaldemo1">
    <div class="modal-dialog-md modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('translate.add')}} - {{trans('translate.customer')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                 type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    @php
                    $i=random_int(1000,9999999);
                    @endphp
                    <p>{{trans('translate.QR')}} - {!! $i !!}</p><br>
                    <input type="hidden" name="Qr" value="{!! $i !!}">
{{--                <div>{!! DNS1D::getBarcodeHTML("$i", "C128",2,22) !!}</div>--}}
{{--                    <img src="data:img/png;base64,{!! DNS1D::getBarcodePNG("$i", "C128",2,22) !!}">--}}

{{--                <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'UPCA') !!}</div>--}}
                    <br>
                    <hr>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2" style="border-left: 1px solid black">
                                <div class="row">

                                    <div class="col-md-12">
{{--                                        <img src="data:img/png;base64,{!! DNS1D::getBarcodePNG("$i", "C128",2,22) !!}">--}}
{{--                                        {!! DNS2D::getBarcodeHTML("$i", 'QRCODE') !!}--}}
                                        <img src="data:image/png;base64,{{DNS2D::getBarcodePNG("$i", 'QRCODE')}}" alt="barcode" style="font-size: 100px;" />
                                    </div>
                                    <br>

                                    <div class="col-md-12">
                                        <hr>
                                        <p>{{trans('translate.pic')}}</p><br>
                                        <input type="file" accept="image/*" name="image" class="dropify" data-height="200" required/>
                                    </div>
                                </div>

                                <br>
                            </div>
                            <div class="col-md-10">
                                <p>{{trans('translate.name')}}</p><br>
                                <input type="text" class="form-control" name="c_name" id="c_name" value="" placeholder="{{trans('translate.name')}}" required><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>{{trans('translate.phone')}}</p><br>
                                        <input type="text" class="form-control" name="phone" id="phone" value="" placeholder="{{trans('translate.phone')}}" required><br>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{trans('translate.national_id')}}</p><br>
                                        <input type="text" class="form-control" name="national_id" id="national_id" value="" placeholder="{{trans('translate.national_id')}}" required><br>
                                    </div>
                                </div>

                                <p>{{trans('translate.email')}}</p><br>
                                <input type="text" class="form-control" name="email" id="email" value="" placeholder="{{trans('translate.email')}}" required><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p>{{trans('translate.college')}}</p><br>
                                        <select class="form-control" name="collage_id" id="collage_id" required>
                                            <option disabled selected>{{trans('translate.option')}}</option>
                                            @foreach($college as $row_college)
                                                <option value="{{$row_college->id}}">{{$row_college->c_name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{trans('translate.aria')}}</p><br>
                                        <select class="form-control" name="id_e" id="id_e" required>
                                            <option disabled selected>{{trans('translate.option')}}</option>
                                            @foreach($area as $row_area)
                                                <option value="{{$row_area->id}}">{{$row_area->c_name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end add man -->


<!-- Edit man -->
<div class="modal" id="modaldemo2">
    <div class="modal-dialog-md modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> {{trans('translate.customer')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="customer/update" method="post" enctype="multipart/form-data">
                {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <hr>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2" style="border-left: 1px solid black">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden"  name="id" id="id" value=""  required><br>
                                        <input type="hidden" name="image" id="image"/>
                                        <p>{{trans('translate.pic')}}</p><br>
                                        <input type="file"  accept="image/*" id="image_new" name="image_new" class="dropify" data-height="200" />
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-10">
                                <p>{{trans('translate.name')}}</p><br>
                                <input type="text" class="form-control" name="c_name" id="c_name" value="" placeholder="{{trans('translate.name')}}" required><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>{{trans('translate.phone')}}</p><br>
                                        <input type="text" class="form-control" name="phone" id="phone" value="" placeholder="{{trans('translate.phone')}}" required><br>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{trans('translate.national_id')}}</p><br>
                                        <input type="text" class="form-control" name="national_id" id="national_id" value="" placeholder="{{trans('translate.national_id')}}" required><br>
                                    </div>
                                </div>

                                <p>{{trans('translate.email')}}</p><br>
                                <input type="text" class="form-control" name="email" id="email" value="" placeholder="{{trans('translate.email')}}" required><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p>{{trans('translate.college')}}</p><br>
                                        <select class="form-control" name="collage_id" id="collage_id" required>
                                            <option id="college_last" class="bg-danger-transparent" selected></option>
                                            @foreach($college as $row_college)
                                                <option value="{{$row_college->id}}">{{$row_college->c_name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{trans('translate.aria')}}</p><br>
                                        <select class="form-control" name="id_e" id="id_e" required>
                                            <option id="area_last" class="bg-danger-transparent"  selected></option>
                                            @foreach($area as $row_area)
                                                <option value="{{$row_area->id}}">{{$row_area->c_name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end Edit man -->


<!-- Delete man -->
<div class="modal" id="modaldemo3">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> {{trans('translate.customer')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
              type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="customer/destroy" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p>{{trans('translate.confirm')}}</p><br>
                    <input type="hidden" name="id" id="id" value="" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>

    </div>
</div>
<!--end Delete man -->


