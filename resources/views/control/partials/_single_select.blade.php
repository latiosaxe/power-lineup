<?php
    $aux = 0;
    if($element){
        $aux = $element->{$slug};
    }
?>
<label class="col-sm-2 control-label">{{$name}}:</label>
<div class="col-sm-10">
    <select id="{{$slug}}" class="chosen-select" style="width: 100%">
        <option value="">Select One</option>
        @foreach($group as $singleElement)
            <option value="{{ $singleElement->id }}" @if($singleElement->id === $aux ) selected @endif>{{ $singleElement->{$name_key} }}</option>
        @endforeach
    </select>
</div>
