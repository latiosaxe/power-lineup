<?php
$html_extra_class = '';
?>
<label>{{$name}}</label>
@foreach( $options as $k => $v )
    <div class="radio">
        <label>
            <input type="radio" data-rule-required="true" aria-required="true"
                   name="{{$slug}}" value="{{$k}}" @if( $k == $item->{$slug}) checked @endif>{{$v}}
        </label>
    </div>
@endforeach
