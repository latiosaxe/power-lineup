<?php
$options_html = '';

$relation_array = array();
$data_name = $singular.'_id';
foreach( $element->{$slug} as $single_relation){
    array_push($relation_array, $single_relation->$data_name);
}


foreach( $group as $singleElement ){
    $preselected = '';
    if(in_array($singleElement->id, $relation_array )){
        $preselected = 'selected';
    }
    $options_html .= "<option value='{$singleElement->id}' {$preselected}>{$singleElement->{$name_key}}</option>";
}
?>
<label class="col-sm-2 control-label">{{$name}}:</label>
<div class="col-sm-10">
    <select data-placeholder="Choose {{ $slug }}" id="{{$slug}}" multiple class="chosen-select work_relations" data-relation="{{ $slug }}" style="width: 100%">
        {!! $options_html !!}
    </select>
</div>
