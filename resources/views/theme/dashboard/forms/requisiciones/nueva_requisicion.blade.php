{{-- DISEÑADO Y DESARROLLADO POR MIS. DANIEL MÉNDEZ CRUZ --}}
@extends('theme.dashboard.main', ['breadcrum' => __('REQUISICIÓN DE MATERIALES / NUEVA REQUISICIÓN'), 'titlePage' => __('SIRMAT | Nueva Requisición de Materiales')])

@section('contenidoCss')
    <style>
        table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
        }

        table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
        }

        table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
        }

        table th,
        table td {
        padding: .625em;
        text-align: center;
        }

        table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
        }

        .bd-example {
            --bd-example-padding: 1rem;
            position: relative;
            padding: 1.5rem;
            margin: 0 -1.5rem;
            border: solid hsla(215, 30%, 92%, 0.877);
            border-width: 1px 0;
            background-color: #f8f8f8;
        }

        .ui-autocomplete {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        float: left;
        display: none;
        min-width: 160px;   
        padding: 4px 0;
        margin: 0 0 10px 25px;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
    }

    .ui-menu-item > a.ui-corner-all {
        display: block;
        padding: 3px 15px;
        clear: both;
        font-weight: normal;
        line-height: 18px;
        color: #555555;
        white-space: nowrap;
        text-decoration: none;
    }

    .ui-state-hover, .ui-state-active {
        color: #ffffff;
        text-decoration: none;
        background-color: #0088cc;
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        background-image: none;
        cursor: pointer;
    }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }
            
            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
            
            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }
            
            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }
            
            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
            
            table td:last-child {
                border-bottom: 0;
            }
        }

        @media (min-width: 768px)
        {
            .bd-example {
                --bd-example-padding: 1.5rem;
                margin-right: 0;
                margin-left: 0;
                border-width: 1px;
                border-top-left-radius: 0.375rem;
                border-top-right-radius: 0.375rem;
                background-color: #ffffff;
            }
        }
    </style>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-1 mb-4"></div>
        <div class="col-lg-10 mb-4">
            <div class="bd-example">
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- formulario --}}
                {!! Form::open(['method' => 'post', 'class' => 'form needs-validation', 'route' => 'requisicion.store', 'files' => true, 'novalidate']) !!}
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            {!! Form::text('area_solicita', '',['class' => 'form-control', 'required', 'autocomplete' => 'off', 'id' => 'area_solicitud']) !!}
                            {!! Form::label('area_solicita', 'Área que Solicita', ['for' => 'area_solicita', 'class' => 'control-label']) !!}
                            <div class="invalid-feedback">
                                Proveer Área Solicita 
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            {!! Form::select('depto',['L' => 'LISTAS', 'S' => '-- SELECCIONAR --'], 'S', ['class' => 'form-control', 'id' => 'deptos']) !!}
                            {!! Form::label('depto', 'Departamento', ['for' => 'depto', 'class' => 'control-label']) !!}
                            <div class="invalid-feedback">
                                Proveer Departamento 
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            {!! Form::date('fechaRequisicion', '',['class' => 'form-control', 'required']) !!}
                            {!! Form::label('fechaRequisicion', 'Fecha de Requisición', ['for' => 'fechaRequisicion', 'class' => 'control-label']) !!}
                            <div class="invalid-feedback">
                                Proveer Fecha 
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            {!! Form::text('solicita', '',['class' => 'form-control', 'required', 'id' => 'solicita', 'autocomplete' => 'off']) !!}
                            {!! Form::label('solicita', 'Solicita', ['for' => 'solicita', 'class' => 'control-label']) !!}
                            <div class="invalid-feedback">
                                Proveer Solicita
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            {!! Form::text('puesto_solicita', '',['class' => 'form-control', 'required', 'id' => 'solicita', 'autocomplete' => 'off']) !!}
                            {!! Form::label('puesto_solicita_label', 'Puesto Solicita', ['for' => 'puesto_solicita', 'class' => 'control-label']) !!}
                            <div class="invalid-feedback">
                                Proveer Puesto Solicita
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            {!! Form::text('autoriza', '',['class' => 'form-control', 'required']) !!}
                            {!! Form::label('autoriza', 'Autoriza', ['for' => 'autoriza', 'class' => 'control-label']) !!}
                            <div class="invalid-feedback">
                                Proveer Autoriza 
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            {!! Form::text('puesto_autoriza', '',['class' => 'form-control', 'required']) !!}
                            {!! Form::label('puesto_autoriza_label', 'Puesto Autoriza', ['for' => 'puesto_autoriza', 'class' => 'control-label']) !!}
                            <div class="invalid-feedback">
                                Proveer Puesto Autoriza 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            {!! Form::textarea('justificacion', null, ['class' => 'form-control', 'name' => 'justificacion', 'id' => 'justificacionId', 'rows' => '50', 'cols' => '40','style' => 'height: 90px']) !!}
                            {!! Form::label('justificacion', 'Justificación', ['for' => 'justificacion', 'class' => 'control-label']) !!}
                        </div>
                    </div>
                </div>
                <hr>
                {!! Form::button('<i class="fas fa-plus-square"></i> Partida Presupuestal', 
                    ['class' => 'btn btn-info', 'id' => 'btnAgregar']
                ) !!}
                <br><br>
                <div class="field_wrapper">
                    <div class="addNewComponent" id="addNewComponent"></div>
                </div>
                {!! Form::hidden('id_departamento', '',['id' => 'id_departamento']) !!}
                {!! Form::hidden('id_administrativo', '', ['id' => 'id_administrativo']) !!}
                <hr>
                {!! 
                    Form::button(
                        '<i class="fas fa-edit" aria-hidden="true"></i> Enviar', 
                        ['class' => 'btn btn-success', 'type' => 'submit']
                    )
                !!}
                {!! Form::close() !!}
                <br>
                {{-- incluir mensaje --}}
                @include('theme.dashboard.messages.flash_message')
                {{-- incluir mensaje END --}}
            </div>
        </div>
        <div class="col-lg-1 mb-4"></div>
    </div>
@endsection

@section('contenidoJavaScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    /*
    * contenido de Javascript funcion para validar
    */
    (()=> {
        'use strict'
        // obtener los datos de todos los formularios que queremos aplicar la validación de bootstrap personalizada
        let contador = 0;
        let i = 0;
        const max_fields = 10000;
        const forms = document.querySelectorAll('.needs-validation');
        const ArregloAsociativo = [];
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated')
            }, false);
        });

        const btnAdd = document.getElementById('btnAgregar');
        btnAdd.addEventListener('click', event => {
            if (contador < max_fields) {
                contador++;

                $('#addNewComponent').append(
                    '<table class="table table-bordered" id="requisicionTable_'+contador+'">' +
                        '<thead>'+
                            '<tr>'+
                                '<th  style="width: 40%;">PARTIDA PRESUPUESTAL</th>'+
                                '<th  style="width: 40%;">CONCEPTO</th>'+
                                '<th  style="width: 10%">AGREGAR</th>'+
                                '<th  style="width: 10%;">QUITAR</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            '<tr>'+
                                '<td data-label="PARTIDA PRESUPUESTAL">'+
                                    '<input type="text" name="itemPartida['+contador+'][partida_presupuestal]" id="partida_presupuestal_'+contador+'" autocomplete="off"  class="form-control autocom"/>'+
                                '</td>'+
                                '<td data-label="CONCEPTO">'+
                                    '<input type="text" name="itemPartida['+contador+'][concepto]" id="concepto_'+contador+'" autocomplete="off"  class="form-control"/>'+
                                '</td>'+
                                '<td data-label="AGREGAR">'+
                                    '<a href="javascript:;" class="btn btn-success btn-circle btn-sm addItemPartidaPresupuestal" id="'+contador+'">'+
                                        '<i class="fas fa-database"></i>'+
                                    '</a>'+
                                '</td>'+
                                '<td data-label="QUITAR">'+
                                    '{!! Form::button('', ['class' => 'btn-close remove-tr', 'type' => 'button', 'arial-label' => 'Close']) !!}'+
                                '</td>'+
                            '</tr>'+
                            '<input type="hidden" name="itemPartida['+contador+'][id_partida_presupuestal]" id="id_partida_'+contador+'"/>'+
                            '<tr>'+
                                '<td colspan="4">'+
                                    '<div id="addItemPartida_'+contador+'"></div>'+
                                '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'
                )
            }
        });


        /***@argument*/
        $(document).on('click', '.addItemPartidaPresupuestal', function(e){
            let id = $(this).attr('id');

            if (i < max_fields) {
                i++;
                $('#addItemPartida_'+id).append(
                    '<table class="table table-bordered" id="partidaPresupuestal_'+i+'_'+id+'">'+
                        '<thead>'+
                            '<tr>'+
                            '<th  style="width: 20%;">CANT.</th>'+
                            '<th  style="width: 20%;">UNIDAD</th>'+
                            '<th  style="width: 50%;">DESCRIPCIÓN</th>'+
                            '<th  style="width: 10%">QUITAR</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            '<tr>'+
                                '<td data-label="CANT.">'+
                                    '<input type="text" name="itemPartida['+id+']['+i+'][cantidad]" class="form-control cantidades" id="cantidad[]" autocomplete="off"/>'+
                                '</td>'+
                                '<td data-label="UNIDAD">'+
                                    '<input type="text" name="itemPartida['+id+']['+i+'][unidad]" class="form-control" id="unidad[]" autocomplete="off"/>'+
                                '</td>'+
                                '<td data-label="DESCRIPCIÓN">'+
                                    '<textarea name="itemPartida['+id+']['+i+'][descripcion]" id="descripcion[]" class="form-control" rows="2" cols="30"></textarea>'+
                                '</td>'+
                                '<td data-label="QUITAR">'+
                                    '<button id="EliminarElemento_'+id+'_'+i+'" class="btn-close remove-item-tr" arial-label="Close"></button>'+
                                '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'
                )
            }
            ArregloAsociativo.push({componente: id, partida: i});
            console.log(ArregloAsociativo);
        });
        /*
        * eliminar elementos
        */
        $(document).on('click', '.remove-tr', function(e){
            e.preventDefault();
            // se remueve la parte de la tabla
            $('#requisicionTable_'+contador).remove();
            $('#addItemPartida_'+contador).empty();
            contador--;
        });
        
        /**
         * Eliminar item de elemento
        */
       $(document).on('click', '.remove-item-tr', function(event){
           event.preventDefault();
           // obtener el id
           let strId = $(this).attr('id');
           let ret = strId.split("_");

           const eliminarElemento = ArregloAsociativo.findIndex(item => item.partida === ret[2]);
           if (eliminarElemento > -1) {
                ArregloAsociativo.splice(eliminarElemento, 1);
           }
           $('#partidaPresupuestal_'+ret[2]+'_'+ret[1]).remove();
           i--;
       });

        $(document).on('keyup', '.cantidades', function() {
            if (this.value != this.value.replace(/[^0-9\-,]/g, '')) {
                this.value = this.value.replace(/[^0-9\-,]/g, '');
            }
        });

        /**
         * @author - Daniel Méndez Cruz
         * @argument - id
         * ajax - 
        */
        $(document).on('focus', '.autocom', function(){
            //obtener id
            let id_partida = $(this).attr('id');
            let recorte = id_partida.split("_");
           $(this).autocomplete({
               source: function(request, response){
                    $.ajax({
                        url: "{{ route('requisicion.partida.catalogo') }}",
                        method: 'GET',
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data){
                            response(data);
                        },
                        error: (error) => {
                            console.log(error.responseJSON.message);
                        }
                    });
               },
               minLength: 2,
               select: function (event, ui){
                    $("input#concepto_"+recorte[2]).val(ui.item.descripcion);
                    $("input#id_partida_"+recorte[2]).val(ui.item.id);
               }
           });
        });


        /**
         * @author - Daniel Méndez Cruz
         * @argument - name
         * ajax - requisicion.partida.solicita
        */
        $( "input#solicita" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "{{ route('requisicion.partida.solicita') }}",
                    method: 'GET',
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function( data ) {
                        response( data );
                    },
                    error: (error) => {
                        console.log(error.responseJSON.message);
                    }
                });
            }
        });

        $("input#deptos").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "{{ route('requisicion.partida.getdepto') }}",
                    method: 'GET',
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function( data ) {
                        response(data);
                    },
                    error: (error) => {
                        console.log(error.responseJSON.message);
                    }
                });
            },
            minLength: 2,
            select: function (event, ui){
                $("input#id_departamento").val(ui.item.id);
            }
        });
        /**
         * autocomplete área solicitante
        */
       $('input#area_solicitud').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{ route('requisicion.partida.administrativo') }}",
                    method: 'GET',
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: (data) => {
                        response(data);
                    },
                    error: (error) => {
                        console.log(error.responseJSON.message);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui){
                $('input#id_administrativo').val(ui.item.id);
                let itemId = ui.item.id;
                if (itemId) {
                    let url = '{{ route("requisicion.partida.getdeptos", ":iddepto") }}';
                    url = url.replace(":iddepto", itemId);
                    /**
                     * evento javascript
                    */
                   $.get(url, function(data){
                        $.each(data, function(fetch, Obj){
                            $('#deptos').append('<option value="'+Obj.id+'">'+Obj.nombre+'</option>');
                        });
                   })
                } else {
                    
                }
            }
       });
    })();
    
</script>
@endsection
{{-- DISEÑADO Y DESARROLLADO POR MIS. DANIEL MÉNDEZ CRUZ --}}