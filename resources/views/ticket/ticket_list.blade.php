@extends('layouts.master')
@section('title')
   MTG - {{trans('translate.customer')}}
@endsection
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('translate.customer')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الذهاب - العودة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="panel panel-primary tabs-style-3">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#tab11" data-toggle="tab" class="active"><i class="fa fa-tasks"></i>قائمة الذهاب</a></li>
                                        <li><a href="#tab12" data-toggle="tab"><i class="fa fa-tasks"></i>قائمة العودة</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab11">
                                        <div class="card-header">
                                            <h1> العدد  : {{ $ticket_go->count() }} </h1>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            @foreach($ticket_go as $ticket_go_row)
                                            <div class="col-sm-12 col-xl-4 col-lg-12">
                                                <div class="card user-wideget user-wideget-widget widget-user">
                                                    <div class="widget-user-header bg-primary">
                                                        <h3 class="widget-user-username">{{$ticket_go_row->get_customer->c_name}}</h3>
                                                        <h5 class="widget-user-desc"></h5>

                                                    </div>
                                                    <div class="widget-user-image">
                                                        <img src="{{URL::asset('avatar/'.$ticket_go_row->get_customer->image)}}" class="brround" alt="User Avatar">
                                                    </div>
                                                    <div class="user-wideget-footer">
                                                        <div class="row">
                                                            <div class="col-sm-6 border-left">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">عدد التذاكر</h5>
                                                                    <span class="description-text">{{$ticket_go_row->count}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 border-left">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">{{$ticket_go_row->note}}</h5>
                                                                    @if($ticket_go_row->count > 1)
                                                                        <span class="description-text">{{ $ticket_go_row->count - 1 }}</span>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab12">
                                        <div class="card-header">
                                            <h1> العدد : {{ $ticket_back->count()}} </h1>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            @foreach($ticket_back as $ticket_back_row)
                                                <div class="col-sm-12 col-xl-4 col-lg-12">
                                                    <div class="card user-wideget user-wideget-widget widget-user">
                                                        <div class="widget-user-header bg-primary">
                                                            <h3 class="widget-user-username">{{$ticket_back_row->get_customer->c_name}}</h3>
                                                            <h5 class="widget-user-desc"></h5>

                                                        </div>
                                                        <div class="widget-user-image">
                                                            <img src="{{URL::asset('avatar/'.$ticket_back_row->get_customer->image)}}" class="brround" alt="User Avatar">
                                                        </div>
                                                        <div class="user-wideget-footer">
                                                            <div class="row">
                                                                @if($ticket_back_row->count > 0)
                                                                <div class="col-sm-6 border-left">
                                                                    <div class="description-block">
                                                                        <h5 class="description-header">عدد التذاكر</h5>
                                                                        <span class="description-text">{{$ticket_back_row->count}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 border-left">
                                                                    <div class="description-block">
                                                                        <h5 class="description-header">{{$ticket_back_row->note}}</h5>
                                                                            <span class="description-text">{{ $ticket_back_row->count}}</span>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
@endsection
