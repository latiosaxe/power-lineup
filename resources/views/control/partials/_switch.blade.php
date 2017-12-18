<?php
$html_extra_class = '';
if( isset( $html ) && $html ){
	$html_extra_class = 'html-class-initializer';
}; ?>
<label for="{{$slug}}" class="control-label">{{$name}}</label>
<div class="">
    <textarea name="{{$slug}}" id="{{$slug}}" class="form-control {{$html_extra_class}}">{!! $item->{$slug} !!}</textarea>
</div>


@include('control.partials._switch',['item'=>$doctor,'slug'=>'gender','name'=>'Género', 'options'=>['Femenino','Masculino']])
