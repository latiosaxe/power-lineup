<label class="col-sm-2 control-label">{{$name}}:</label>
<div class="col-sm-10">
    <div class='browseAnimeComponent specialAnimeInput' data-relations='' data-type='anime'>
        <div class='browseAnimeReady hidden'>Ready</div>
        <input class='browseAnimeInput form-control' placeholder='Browse for Anime(s)'/>
        <div class='browseAnimeResult'><ul class='browseAnimeResultUL'></ul></div>
    </div>
    @if($relation_animes)
        <p style="margin-top: 15px;"><strong>Actual Relations</strong></p>
        <ul>
        @foreach($relation_animes as $relation)
            <li>{{$relation->name}}, <a href="#" class="deleteRelationCharacterAnime" data-anime_id="{{$relation->anime_id}}">Delete</a></li>
        @endforeach
        </ul>
    @endif
</div>

