KOUKO.main = (function(){
    var _$redactor_text,
        _$newElement,
        _$showElement,
        formData,
        _$eliminateImage,
        _$image_url,
        _$date_picker,
        _$color_picker,
        _$chosen_select,
        _$multiple_relation,
        EpisodesOrderActive = false
        ;
    var _init = function _init(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        _$redactor_text = $('.text-area_editorial');
        _$image_url = $(".image_url");
        _$eliminateImage = $(".eliminateImage");
        _$date_picker = $(".datepicker_inpit");
        _$color_picker = $(".color-picker_input");

        _$redactor_text.wysihtml5();
        // $.each(_$redactor_text, function () {
        //     CKEDITOR.replace($(this).attr('id'));
        // });

        _$color_picker.colorpicker();

        _$date_picker.datepicker({
            autoclose: true
        });

        $('.table-hover').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            "pageLength"  : 50
        });

        _$image_url .on('change', function () {
            var file = $(this).val().split('.').pop();
            console.log(file);
            if(file=='png' || file=='jpg' || file=='PNG' || file=='JPG'){
                $(this).addClass('newImage');
            } else{
                $(this).val('');
                sweetAlert("Oops...", "El archivo no es valido, por favor intenta con un archivo PNG o JPG", "error");
            }
        });

        _$eliminateImage.on('click', function (event) {
            event.preventDefault();
            var $element = $(this).closest('.imageElement');
            $element.find('.image_url').addClass('newImage');
            $element.find('.image_text_url').val(' ');
            $element.find('.imagePreview').hide();
        });

        _$chosen_select = $(".chosen-select");
        if(_$chosen_select){
            _$chosen_select.chosen({no_results_text: "Oops, nothing found!"});
        }

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        });

        $(".goBackButton").on('click', function () {
            window.history.back();
        });

        $('body').delegate('.allEpisodes', 'change', function () {
            var $this = $(this);
            var $parent = $this.closest('.block_interaction');
            if($this.is(':checked')){
                $parent.find('.range-work').attr('disabled', true);
            }else{
                $parent.find('.range-work').attr('disabled', false);
            }
        });

        $('body').delegate('.deleteRow', 'change', function (event) {
            var $this = $(this);
            if($this.val() == 'DELETE'){
                $this.closest('.multiple_relation').addClass('removing');
            }else{
                $this.closest('.multiple_relation').removeClass('removing');
            }
        });

        $('body').delegate('.relateRow', 'change', function (event) {
            var $this = $(this),
                select;
            var value = $this.val();
            if(value === 'anime'){
                select = $this.closest('.row').find('.selectTarget .browseAnimeComponent:eq(0)');
            }else if(value === 'saga'){
                select = $this.closest('.row').find('.selectTarget .browseAnimeComponent:eq(1)');
            }
            select.removeClass('hidden');
        });

        var readyLabel = $("#browseAnimeReady");
        $('body').delegate('.browseAnimeComponent .browseAnimeResult .browseAnimeResultUL li', 'click', function () {
            var $this = $(this);
            var parent = $this.closest(".browseAnimeComponent");
            var relations = parent.attr('data-relations');
            parent.find('.browseAnimeReady').removeClass('hidden');
            console.log(relations);
            if($this.hasClass('active')){
                $this.removeClass('active');
                var array = relations.split(",");
                var index = array.indexOf($this.data('id').toString());
                if (index > -1) {
                    array.splice(index, 1);
                }
                parent.attr('data-relations', '');
                $.each(array, function (index, value) {
                    relations = parent.attr('data-relations');
                    if(relations){
                        parent.attr('data-relations', parent.attr('data-relations') + ',' + value);
                    }else{
                        parent.attr('data-relations', value);
                    }
                })
            }else{
                $this.addClass('active');
                if(relations){
                    parent.attr('data-relations', parent.attr('data-relations') + ',' + $this.data('id'));
                }else{
                    parent.attr('data-relations', $this.data('id'));
                }
            }
            var newRelations = parent.attr('data-relations');
            if(newRelations.length > 0){
                parent.addClass('changed');
            }else{
                parent.removeClass('changed');
            }
            readyLabel.removeClass('.hidden');
        });

        $('body').delegate('.browseAnimeComponent .browseAnimeReady', 'click', function () {
            $(this).closest('.browseAnimeComponent').find('.browseAnimeResult').removeClass('active');
        });

        $('body').delegate('.browseAnimeInput', 'change', function (event) {
            var $this = $(this),
                select;
            var value = $this.val();
            if(value === 'anime'){
                select = $this.closest('.row').find('.selectTarget .browseAnimeComponent');
            }else if(value === 'saga'){
                select = $this.closest('.row').find('.selectTarget select:eq(0)');
                select.removeClass('hidden');
            }
        });

        $('body').delegate('.addAnotherContribution', 'click', function (event) {
            event.preventDefault();
            var $this = $(this);
            var $parent = $this.closest('.work-style');

            $parent.find('.destination').append(EXTRA_ROW);

            _$chosen_select = $(".chosen-select");
            if(_$chosen_select){
                _$chosen_select.chosen({no_results_text: "Oops, nothing found!"});
            }
        });

        $('body').delegate('.saveGifImage', 'click', function (event) {
            event.preventDefault();
            var $this = $(this);
            $this.addClass('uploading');
            var pathArray = window.location.pathname.split( '/' );
            var formNewImage = new FormData();
            formNewImage.append('title', $this.data('title'));
            formNewImage.append('fixed', $this.data('image-fixed'));
            formNewImage.append('original', $this.data('image-original'));
            formNewImage.append('type', pathArray[pathArray.length-2]);
            formNewImage.append('element', pathArray[pathArray.length-1]);

            $.ajax({
                url: KOUKO.control_url + 'utils/newImage/',
                data: formNewImage,
                type: 'post',
                dataType : 'JSON',
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    $this.addClass('done')
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        var Alert = true;
        $('body').delegate('.episodeOrder .order', "change", function() {
            // $(".episodeOrder input").change(function () {
            console.log("Achis achis");
            if(Alert){
                swal('If you change this value, all episodes going to be reorder, make completly sure you want to do that.')
                Alert = false;
                EpisodesOrderActive = true;
            }
        });


        $(".deleteRelationCharacterAnime").on('click', function (event) {
            event.preventDefault();
            console.log("Delete Relation");
            var character = window.location.href.split('characters/');
            var deleteRelation = new FormData();
            var $this = $(this);
            deleteRelation.append('anime_id', $this.data('anime_id'));
            deleteRelation.append('character_id', parseInt(character[1]));
            console.log( deleteRelation );
            $.ajax({
                url: KOUKO.control_url + 'utils/deleteRelationCharacterAnime/',
                type: 'post',
                data: deleteRelation,
                dataType : 'JSON',
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    $this.parent().fadeOut(300);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        var searchValue = $("#searchValue, .browseAnimeInput");
        searchValue.on('keyup', function () {
            if(this.value.length >= 3){
                var formData = new FormData();
                var $this = $(this);
                formData.append('term', $this.val());

                var type = $this.closest('.browseAnimeComponent').data('type');
                if( type == null || type === 'anime' ){
                    formData.append('type', 'anime');
                }else{
                    formData.append('type', type);
                }

                $.ajax({
                    url: KOUKO.control_url + 'animes/searchGlobal/',
                    data: formData,
                    type: 'post',
                    dataType : 'JSON',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data.animes);
                        if(data.animes.length > 0){
                            console.log($this.parent());
                            var checkDiv = $this.parent().find('.browseAnimeResult');
                            if(checkDiv.length > 0){
                                var ul = checkDiv.find('ul');
                                ul.html('');
                                checkDiv.addClass('active');
                                $.each(data.animes, function (index, value) {
                                    ul.append('<li data-id="'+value.id+'">'+value.name.replace('\\','')+'</li>');
                                });
                            }else{
                                $("#resultAnime").html('');
                                $.each(data.animes, function (index, value) {
                                    $("#resultAnime").append('<li><a href="/control/animes/'+value.id+'"><strong>'+value.name.replace('\\','')+'</strong> | '+value.slug+'</a></li>');
                                });
                            }
                        }else{
                            $this.val($this.val().slice(0,-1));
                            swal('It seems like there\'s no results');
                        }
                        // document.location.href = KOUKO.control_url + url
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    complete: function () {

                    }
                });
            }
        });
        //function searchGlobal() {}
    };

    var _createElement = function _createElement(array, url) {
        formData = new FormData();
        _$newElement = $("#newElement");
        _$newElement.submit(function(event){
            event.preventDefault();
            $('button[type="submit"]').addClass('disabled').closest('.box-footer').prepend('<i class="fa fa-spinner fa-spin pleseKillMe"></i>');
            var slug =  $(this).data('slug');
            $.each(array, function (index, value) {
                if($("#"+value).is(':checkbox')){
                    if($("#"+value).is(":checked")){
                        formData.append(value, 1);
                    }else{
                        formData.append(value, 0);
                    }
                }else{
                    formData.append(value, $("#"+value).val());
                    console.log(value, $("#"+value).val());
                }
                if($("#"+value).hasClass('newImage')){
                    formData.append(value, $("#"+value)[0].files[0]);
                    console.log($("#"+value)[0].files[0])
                }
                if($("#"+value).hasClass('image_url')){
                    console.log(value);
                }else{
                }
            });

            if( $("#active").is(':checked') ){
                formData.append('active', 1);
            }else{
                formData.append('active', 0);
            }

            var _$relations = _$newElement.find('.work_relations');
            if(_$relations){
                $.each(_$relations, function (index, value) {
                    console.log($(value).data('relation'));
                    console.log($(value).val());
                    formData.append( $(value).data('relation'), $(value).val());
                });
            }

            var _$multiple_relation = _$newElement.find('.multiple_relation');
            if(_$multiple_relation){
                var Relations = [];
                $.each(_$multiple_relation, function (index, value) {
                    var completed = true;
                    var selects = $(value).find('select');
                    var element = [];
                    $.each(selects, function (index, value) {
                        if($(value).val()){
                            element.push($(value).val());
                        }else{
                            completed = false;
                        }
                    });
                    if(completed){
                        var select = $(value).find('.allEpisodes');
                        if(select.is(":checked")){
                            element.push('ALL');
                        }else{
                            element.push($(value).find('.range-work').val());
                        }
                        Relations.push(element);
                    }
                });
                if(Relations.length > 0){
                    var json_string = JSON.stringify(Relations);
                    formData.append('works', json_string);
                }
                console.log(Relations);
            }


            var _$content_relation = _$newElement.find('.browseAnimeComponent.changed');
            if(_$content_relation){
                var ContentArray = [
                    _$content_relation.data('type'),
                    _$content_relation.data('relations')
                ];
                formData.append('contents', JSON.stringify(ContentArray));
            }

            var _$aditional_animes = _$newElement.find('.specialAnimeInput.changed');
            if(_$aditional_animes){
                formData.append('animes', _$content_relation.data('relations'));
            }

            console.log(formData);

            $.ajax({
                url: KOUKO.control_url + url,
                data: formData,
                type: 'post',
                dataType : 'JSON',
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    document.location.href = KOUKO.control_url + url
                },
                error: function (data) {
                    // console.log(data);
                },
                complete: function () {
                    $('button[type="submit"]').removeClass('disabled');
                    $(".pleseKillMe").remove();
                }
            });
        });
    };
    var _editElement = function _createElement(array, url) {
        formData = new FormData();

        _$showElement = $("#showElement");
        _$showElement.submit(function(event){
            event.preventDefault();
            $('button[type="submit"]').addClass('disabled').closest('.box-footer').prepend('<i class="fa fa-spinner fa-spin pleseKillMe"></i>');
            var slug =  $(this).data('slug');
            if (slug == null){
                slug =  $(this).data('id');
            }
            $.each(array, function (index, value) {
                if($("#"+value).is(':checkbox')){
                    if($("#"+value).is(":checked")){
                        formData.append(value, 1);
                    }else{
                        formData.append(value, 0);
                    }
                }else{
                    formData.append(value, $("#"+value).val());
                }
                if($("#"+value).hasClass('newImage')){
                    formData.append(value, $("#"+value)[0].files[0]);
                    // console.log($("#"+value)[0].files[0])
                }
                if($("#"+value).hasClass('image_url')){
                    // console.log(value);
                }else{
                }
            });

            if( $("#active").is(':checked') ){
                formData.append('active', 1);
            }else{
                formData.append('active', 0);
            }

            var _$relations = _$showElement.find('.chosen-select');
            if(_$relations){
                $.each(_$relations, function (index, value) {
                    console.log($(value).data('relation'));
                    console.log($(value).val());
                    formData.append( $(value).data('relation'), $(value).val());
                });
            }

            var _$multiple_relation = _$showElement.find('.multiple_relation');
            if(_$multiple_relation){
                var Relations = [];
                $.each(_$multiple_relation, function (index, value) {
                    var completed = true;
                    var selects = $(value).find('select');
                    var element = [];
                    $.each(selects, function (index, value) {
                        if($(value).val()){
                            element.push($(value).val());
                        }else{
                            completed = false;
                        }
                    });
                    if(completed){
                        var select = $(value).find('.allEpisodes');
                        if(select.is(":checked")){
                            element.push('ALL');
                        }else{
                            element.push($(value).find('.range-work').val());
                        }
                        Relations.push(element);
                    }
                });
                if(Relations.length > 0){
                    var json_string = JSON.stringify(Relations);
                    formData.append('works', json_string);
                }
            }

            if(EpisodesOrderActive){
                var EpisodesOrder = [],
                    episodesAll = $(".episodeOrder .order");

                $.each(episodesAll, function (index, value) {
                    console.log(value);
                    EpisodesOrder.push(value.value);
                });
                formData.append('order', EpisodesOrder);
            }


            var _$content_relation = _$showElement.find('.browseAnimeComponent.changed');
            if(_$content_relation){
                var ContentArray = [
                    _$content_relation.data('type'),
                    _$content_relation.data('relations')
                ];
                formData.append('contents', JSON.stringify(ContentArray));
            }

            var _$aditional_animes = _$showElement.find('.specialAnimeInput.changed');
            if(_$aditional_animes){
                formData.append('animes', _$content_relation.data('relations'));
            }

            $.ajax({
                url: KOUKO.control_url + url+'Update/'+slug,
                data: formData,
                type: 'post',
                dataType : 'JSON',
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    document.location.href = KOUKO.control_url + url;
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
    };
    var _gifSearch = function _gifSearch(term) {
        var GIFURL = KOUKO.control_url + 'utils/getImages/';
        var formGIF = new FormData();
        formGIF.append('term', term);
        $.ajax({
            url: GIFURL,
            data: formGIF,
            type: 'post',
            dataType : 'JSON',
            contentType: false,
            processData: false,
            success: function (data) {
                $("#gifsWrapper").html('');
                $.each(data, function (index, value) {
                    $("#gifsWrapper").append('<li class="saveGifImage pointerClick" data-title="'+value.title+'" data-image-fixed="'+value.images.fixed_height.url+'" data-image-original="'+value.images.original.url+'"><img src="'+value.images.fixed_height.url+'" alt=""></li>');
                });
                $("#gifsWrapper").append('<li class="form"><form onsubmit="KOUKO.main.makeAnotherGifSearch(); return false;"><label for=""><p>Make another search</p> <input type="text" id="gifTermSearch"></label></form></li>');
            },
            error: function (data) {
                console.log(data);
            }
        });
    };
    var _deleteGIF = function _deleteGIF(url, element) {
        var deleteGIF = new FormData();
        deleteGIF.append('url', url);
        $.ajax({
            url: KOUKO.control_url + 'utils/deleteImages/',
            type: 'post',
            data: deleteGIF,
            dataType : 'JSON',
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $(element).closest('li').remove();
            },
            error: function (data) {
                console.log(data);
            }
        });
    };
    return {
        init: function init(){
            _init();
        },
        create: function init(array, url){
            _createElement(array, url);
        },
        edit: function init(array, url){
            _editElement(array, url);
        },
        gifSearch: function gifSearch(term) {
            _gifSearch(term);
        },
        makeAnotherGifSearch: function makeAnotherGifSearch() {
            var newTerm = $("#gifTermSearch").val();
            _gifSearch(newTerm);
        },
        deleteGIF: function deleteGIF(url, element) {
            _deleteGIF(url, element);
        }
    }
})();
