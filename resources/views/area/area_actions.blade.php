<!-- add man -->
<div class="modal" id="modaldemo1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('translate.add')}} - {{trans('translate.aria')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                 type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('area.store')}}" method="post">
{{--                {{method_field('')}}--}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p>{{trans('translate.name')}}</p><br>
                    <input type="text" class="form-control" name="c_name" id="c_name" value="" placeholder="{{trans('translate.name')}}" required>

                    <p>{{trans('translate.info')}}</p><br>
                    <input type="text" class="form-control" name="info" id="info" value="لا يوجد وصف" placeholder="{{trans('translate.info')}}" required>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> {{trans('translate.aria')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="area/update" method="post">
                {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="type" id="type" value="m" required>
                    <input type="hidden" class="form-control" name="id" id="id" value="" required>
                    <p>{{trans('translate.name')}}</p><br>
                    <input type="text" class="form-control" name="c_name" id="c_name" value="" placeholder="{{trans('translate.name')}}" required>

                    <p>{{trans('translate.info')}}</p><br>
                    <input type="text" class="form-control" name="info" id="info" value="" placeholder="{{trans('translate.info')}}" required>
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
                <h6 class="modal-title">{{trans('translate.aria')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
              type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="area/destroy" method="post">
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

