<?php $type = isset( $type ) ? $type:'text'; ?>

<label class="col-md-2 control-label">
    {{ $name }}
    <small style="display: block">{{ $description }}</small>
</label>
<div class="col-md-8">
    <label>
        <input type="checkbox" class="flat-red" id="{{$slug}}" @if($item != '') @if($item->$slug == 1) checked @endif @endif>
        <small style="margin-left: 10px">Si esta palomeada se mostrará en el sitio web.</small>
    </label>
</div>
