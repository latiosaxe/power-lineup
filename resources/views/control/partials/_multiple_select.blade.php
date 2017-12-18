<?php
$options_html = '';

$relation_array = array();

$relation_name = ${"relation_" . $slug};
$data_name = ${$slug};
$aux_id = substr($slug, 0, -1);
$relation_id = $aux_id."_id";


if($relation_name){
    foreach( $relation_name as $single_relation){
        array_push($relation_array, $single_relation->$relation_id);
    }
}

foreach( $data_name as $element ){
    $preselected = '';
    if(in_array($element->id, $relation_array )){
        $preselected = 'selected';
    }
    $options_html .= "<option value='{$element->id}' {$preselected}>{$element->{$name_slug}}</option>";
}

?>

<label class="col-sm-2 control-label">{{$name}}:</label>
<div class="col-sm-10">
    <select data-placeholder="Choose {{ $slug }}" multiple class="chosen-select work_relations" data-relation="{{ $slug }}" style="width: 100%">
        {!! $options_html !!}
    </select>
</div>
