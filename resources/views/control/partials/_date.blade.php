<?php $type = isset( $type ) ? $type:'text'; ?>
<label for="{{$slug}}" class="col-sm-2 control-label">{{$name}}:</label>
<div class="col-sm-10">
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="{{$slug}}" name="{{$slug}}" type="{{$type}}" class="form-control pull-right datepicker_inpit" value="{{ $item != ''?$item->{$slug}:'' }}">
    </div>
</div>
