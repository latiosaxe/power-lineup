<?php $type = isset( $type ) ? $type:'text'; ?>
<label for="{{$slug}}" class="col-sm-2 control-label">{{$name}}:</label>
<div class="col-sm-10">
    <input id="{{$slug}}" name="{{$slug}}" type="{{$type}}" class="form-control" value="{{ $item != ''?str_replace('\\', '', $item->{$slug}):'' }}">
</div>
