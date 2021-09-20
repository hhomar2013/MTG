@if(session()->has('Add'))
    {{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
    {{--            <strong>{{ session()->get('Add') }}</strong>--}}
    {{--        </div>--}}

    <div class="card bd-0 mg-b-20 alert">
        <div class="card-body text-success">
            <div class="main-error-wrapper">
                <i class="si si-check mg-b-20 tx-50"></i>
                <h4 class="mg-b-20"><strong>{{ trans('translate.Add_message') }}</strong></h4>
            </div>
        </div>
    </div>
@endif

@if(session()->has('Edit'))
    {{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
    {{--            <strong>{{ session()->get('Edit') }}</strong>--}}
    {{--        </div>--}}

    <div class="card bd-0 mg-b-20 alert ">
        <div class="card-body text-success">
            <div class="main-error-wrapper">
                <i class="si si-check mg-b-20 tx-50"></i>
                <h4 class="mg-b-20"> <strong>{{ trans('translate.Edit_message') }}</strong></h4>
            </div>
        </div>
    </div>
@endif

@if(session()->has('Delete'))
    {{--        <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
    {{--            <strong>{{ session()->get('Delete') }}</strong>--}}
    {{--        </div>--}}

    <div class="card bd-0 mg-b-20 alert">
        <div class="card-body text-danger">
            <div class="main-error-wrapper">
                <i class="si si-check mg-b-20 tx-50"></i>
                <h4 class="mg-b-20"><strong>{{ trans('translate.Delete_message') }}</strong></h4>
            </div>
        </div>
    </div>
@endif

@if(session()->has('Error'))


    <div class="card bd-0 mg-b-20 alert_error">
        <div class="card-body text-danger">
            <div class="main-error-wrapper">
                <i class="si si-info mg-b-20 tx-50"></i>
                <h4 class="mg-b-20"><strong>{{ session()->get('Error') }}</strong></h4>
            </div>
        </div>
    </div>
@endif



{{--                        <div class="mb-3">{!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}</div>--}}

{{--                        <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!}</div>--}}

{{--                        <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA2T') !!}</div>--}}

{{--                        <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'CODABAR') !!}</div>--}}

{{--                        <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'KIX') !!}</div>--}}

{{--                        <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'RMS4CC') !!}</div>--}}

