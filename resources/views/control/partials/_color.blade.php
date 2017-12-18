<?php $type = isset( $type ) ? $type:'text'; ?>
<label for="{{$slug}}" class="col-sm-2 control-label">{{$name}}:</label>
<div class="col-sm-10">

    <div class="input-group color-picker_input">
        <input id="{{$slug}}" name="{{$slug}}" type="{{$type}}" class="form-control" value="{{ $item != ''?$item->{$slug}:'' }}">
        <div class="input-group-addon">
            <i></i>
        </div>
    </div>
</div>
