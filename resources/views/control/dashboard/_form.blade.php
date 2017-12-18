<div class="form-group">
    @include('control.partials._input', ['item'=>$element,'slug'=>'token_init','name'=>'Tokens distribuidos'])
</div>
<div class="form-group">
    @include('control.partials._input', ['item'=>$element,'slug'=>'token_end','name'=>'Tokens totales'])
</div>

<script>
    var elements = ['token_init', 'token_end'],
        url = 'count_down'
        ;
</script>

