<?php
$types = ['Anime', 'Saga', 'Character'];
$final_html = "";

$final_html = generateList($name, $types, $animes, $sagas, $final_html, $relation_animes);

$empty_row = "";
$empty_row = generateList($name, $types, $animes, $sagas, $empty_row, null);
$empty_row = str_replace("\n", '', $empty_row);

function generateList($name, $types, $animes, $sagas, $final_html, $relation_animes) {
    if(!$relation_animes){
        $relation_animes = [];
        $tempElement = (object) [];
        $tempElement->content_id = 0;
        $tempElement->content_type = '';
        $tempElement->person_id = 0;
        $tempElement->job_id = 0;
        $tempElement->range = 0;
        $relation_animes[] = $tempElement;
    }
    foreach ($relation_animes as $relation){
        $final_html = generateRow($name, $types, $animes, $sagas, $final_html, $relation);
    }

    return $final_html;
}

function generateRow($name, $types, $animes, $sagas, $final_html, $relation){
    $type_html = "<option value=''>Select Value</option>";
    $works_html = "<option value=''>Select Value</option>";
    $animes_html = "<option value=''>Select Value</option>";
    $characters_html = "<option value=''>Select Value</option>";
    $sagas_html = "<option value=''>Select Value</option>";
    $range_html = '';

    foreach( $types as $type ){
        $type_html .= "<option value='".str_slug($type)."' ". ($relation->content_type == str_slug($type) ? 'selected' : '') ." >{$type}</option>";
    }

    foreach( $animes as $anime ){
        $animes_html .= "<option value='{$anime->id}' ". ($relation->content_id == $anime->id ? 'selected' : '') .">{$anime->name}</option>";
    }

    foreach( $sagas as $saga ){
        $sagas_html .= "<option value='{$saga->id}' ". ($relation->content_id == $saga->id ? 'selected' : '') .">{$saga->name}</option>";
    }


    if($relation->range == 'ALL'){
        $range_html = "
            <div class='col-sm-3'>
                <span>ALL</span>
                <input type='checkbox' checked class='allEpisodes'>
            </div>
            <div class='col-sm-9 parent'>
                <input type='text' class='form-control range-work' value='' placeholder='Range' disabled='disabled' style='width: 100%'>
            </div>";
    }else{
        $range_html = "
            <div class='col-sm-3'>
                <span>ALL</span>
                <input type='checkbox' class='allEpisodes'>
            </div>
            <div class='col-sm-9 parent'>
                <input type='text' class='form-control range-work' value='". $relation->range ."' placeholder='Range' style='width: 100%'>
            </div>";
    }

    $final_html .= "
        <div class='form-group multiple_relation'>
            <label class='col-sm-2 control-label'>". $name .":</label>
            <div class='col-sm-10'>
                <div class='row'>
                    <div class='col-sm-2'>
                        <select data-placeholder='Type of content' class='chosen-select relateRow' style='width: 100%;'>
                            ".$type_html."
                        </select>
                    </div>
                    <div class='col-sm-6'>
                        <div class='selectTarget'>
                            <div class='browseAnimeComponent hidden' data-relations='' data-type='anime'>
                                <div class='browseAnimeReady hidden'>Ready</div>
                                <input class='browseAnimeInput form-control' placeholder='Browse for Anime(s)'/>
                                <div class='browseAnimeResult'><ul class='browseAnimeResultUL'></ul></div>
                            </div>
                            <div class='browseAnimeComponent hidden' data-relations='' data-type='saga'>
                                <div class='browseAnimeReady hidden'>Ready</div>
                                <input class='browseAnimeInput form-control' placeholder='Browse for Sagas(s)'/>
                                <div class='browseAnimeResult'><ul class='browseAnimeResultUL'></ul></div>
                            </div>
                            <div class='browseAnimeComponent hidden' data-relations='' data-type='character'>
                                <div class='browseAnimeReady hidden'>Ready</div>
                                <input class='browseAnimeInput form-control' placeholder='Browse for Sagas(s)'/>
                                <div class='browseAnimeResult'><ul class='browseAnimeResultUL'></ul></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";

    return $final_html;
}

?>
<script>
    var EXTRA_ROW = "{!! $empty_row !!}";

</script>

@if($final_html)
    {!! $final_html !!}
@else
    {!! $empty_row !!}
@endif

{{--<select data-placeholder='Element' class='hidden' style='width: 100%;'>--}}
    {{--".$animes_html."--}}
{{--</select>--}}