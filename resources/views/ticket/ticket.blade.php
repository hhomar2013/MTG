@extends('layouts.master')
@section('title')
    MTG
@endsection
@section('css')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('translate.customer')}} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('translate.cust_search')}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


{{--    Qr Reader--}}
{{--<div class="col-md-12">--}}
{{--    <video id="preview" width="100%" hidden></video>--}}
{{--    <input type="hidden" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control" readonly>--}}
{{--</div>--}}
{{--   End Qr Reader--}}


    <!-- row -->
    <div class="row">
{{--        <video id="preview" width="100%" ></video>--}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h2>{{trans('translate.search_list')}}</h2>
                        <hr>
                        <select class="form-control" name="search_ticket" id="search_ticket">
                            <option value="" disabled selected>{{trans('translate.option')}}</option>
                            <option value="QR" >QR</option>
                            <option value="all" >بحث عام</option>
                        </select>

                    </div>
                    <div class="col-md-3">
                        <h2>الحالة</h2><hr>
                        <select class="form-control" name="search_statue" id="search_statue">
                            <option value="" disabled selected>{{trans('translate.option')}}</option>
                            <option value="1" class="bg-primary-transparent">ذهاب</option>
                            <option value="2" class="bg-danger-transparent">عودة</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <h2><i class="fa fa-cogs"></i></h2><hr>
                       <a href="{{route('ticket.index')}}" class="btn btn-secondary"> بحث جديد</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div id="get_search_area"></div>
                            </div>
                            <div class="card-body">
                                <form action="" id="form_ticket">
                                    @csrf
                                <div id="search_result"></div>

{{--                                start--}}
                                <div class="modal" id="modaldemo3">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{trans('translate.Ticket')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                                <div class="modal-body">
                                                    <p>{{trans('translate.confirm')}}</p><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                    <button type="submit" id="save_daily_ticket" class="btn btn-primary"><i class="fa fa-check"></i></button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
{{--                                end--}}
                                </form>
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
@section('js')


    <script>
{{--        Get search All--}}

function search_all(){
    let id = $('#search').val();
    let s_type = $('#search_ticket').val();
    let search_statue = $('#search_statue').val();
    if(search_statue == null ||  search_statue == null){}else{
        $.ajax({
            type:'get',
            url:'{{route('search_ticket')}}',
            data:{
                all:'yes',
                id:id,
                s_type:s_type,
                search_statue:search_statue
            },
            success:function (data){
                $('#search_result').html(data);
            }
        })
    }

}


        {{--Get Search QR--}}
        function search(){
            let id = $('#search').val();
            let s_type = $('#search_ticket').val();
            let search_statue = $('#search_statue').val();
            if(search_statue == null ||  search_statue == null){}else{
                $.ajax({
                    type:'get',
                    url:'{{route('search_ticket')}}',
                    data:{
                        id:id,
                        s_type:s_type,
                        search_statue:search_statue
                    },
                    success:function (data){
                        $('#search_result').html(data);
                    }
                })
            }

        }


        //
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0 ){
                scanner.start(cameras[0]);
            } else if(cameras.length > 1){
                scanner.start(cameras[1]);
                // alert('No cameras found');
            }

        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan',function(c){
            document.getElementById('search').value=c;
            search();
        });



    </script>


    <script>


function check_ticket_count(){
    let id = $('#search').val();
    let s_type = $('#search_ticket').val();
    let search_statue = $('#search_statue').val();
    let count_ticket = $('#count_ticket').val();
    $.ajax({
        type:'get',
        url:'{{route('check_ticket')}}',
        data:{
            id:id,
            s_type:s_type,
            count_ticket:count_ticket,
            search_statue:search_statue
        },
        success:function (data){
            if(data == null){
                $('#search_result_msg').html(data);
            }else {
                $('#search_result_msg').html(data);
            }

        }
    })
}


$('#save_daily_ticket').click(function (e){
    e.preventDefault();
    let id = $('#cust_id').val();
    let count_ticket = $('#count_ticket').val();
    let search_statue = $('#search_statue').val();
    let _token = $("input[name=_token]").val();
    let note = $('#note').val();
    let date_now = $('#date_now').val();
    let time_now = $('#time_now').val();
    $.ajax({
        type:'POST',
        url:'{{route('daily_ticket')}}',
        data:{
            _token:_token,
            id:id,
            count_ticket:count_ticket,
            search_statue:search_statue,
            note:note,
            date_now:date_now,
            time_now:time_now
        },
        success:function (data){
            if (data)
            {
                 $('#message').html(data);
                $('#form_ticket')[0].reset();
                $('#modaldemo3').modal('hide');
                $('#search').val('');

                setTimeout(function (){
                    $('#search_result').empty();
                },2000)
            }else {
                alert('error');
            }

        }

    });

});



        $('#search_ticket').change(function (){
            let value = $(this).val();
            if (value == 'QR'){
                $('#get_search_area').html('<video id="preview" width="100%" hidden></video><input type="text" name="search" id="search" placeholder="scan qrcode" class="form-control" readonly>');

            }else {
                $('#get_search_area').html('<input type="text" class="form-control" id="search"/><br><button class="btn btn-primary" onclick="search_all()"><i class="fa fa-search"></i></button>')
            }
            $('#search').focus();

        });

    </script>





@endsection
