<label for="{{ $slug }}" class="col-md-2 control-label">{{$name}}:</label>
<div class="col-md-10">
    {{--<textarea id="{{$slug}}" class="form-control redactor-text" placeholder="Resumen"></textarea>--}}
    <textarea id="{{$slug}}" name="{{$slug}}" class="text-area_editorial" rows="10" cols="80" style="width: 100%;">
        {{ $item != ''?str_replace('\\', '', $item->{$slug}):'' }}
    </textarea>
</div>