@extends ('control.master')
@section ('content')
    <section class="content-header">
        <h1>
            Bienvenido al panel de administración de {{ env('CLIENT') }} <strong>{{ $user }}</strong>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar información de Tokens</h3>
                    </div>
                    <form role="form" id="editElement" class="form-horizontal">
                        <div class="box-body">
                            @include('control.dashboard._form', ['element'=>$tokens[0]])
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary  pull-right">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('javascript')
    <script>

        var formData, _$showElement;

        $(document).ready(function(){
//            KOUKO.main.edit(elements, url);

            formData = new FormData();

            _$showElement = $("#editElement");
            _$showElement.submit(function(event){
                event.preventDefault();

                formData.append('token_init', $("#token_init").val());
                formData.append('token_end', $("#token_end").val());

                console.log( formData );

                $.ajax({
                    url: KOUKO.control_url + 'tokensUpdate',
                    data: formData,
                    type: 'post',
                    dataType : 'JSON',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        document.location.href = KOUKO.control_url;
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    complete: function () {
                        $('button[type="submit"]').removeClass('disabled');
                        $(".pleseKillMe").remove();
                    }
                });
            });

        });
    </script>
@endsection