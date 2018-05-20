@extends('layouts.app')


@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                </a></li>
            <li>Regitrar Evento</li>
        </ol>
    </div>
    <div class="row">
        <form action="{{route('RegistrarEvento')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-lg-6">
                <div class="panel-body">
                    <div class="form-group">
                        <label>Nombre de Evento:</label>
                        <input name="nombre_evento" type="text" placeholder="Nombre del Evento" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea class="form-control" name="descripcion_evento" placeholder="Describa el Evento.."
                                  rows="3" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Dirección:</label>
                        <input name="direccion_evento" type="text" placeholder="Dirección" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Categoria:</label>
                        <select class="form-control select" name="categoria_id">
                            @foreach($categoria as $categorias)
                                <option value="{{$categorias->id}}">{{$categorias->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Fecha de Evento:</label>
                        <input type="date" class="form-control" name="fecha_inicio_evento"/>
                    </div>

                    <div class="form-group">
                        <label>Hora de Evento:</label>
                        <input type="time" class="form-control" name="hora_evento"/>
                    </div>

                    <div class="form-group">
                        <label for="">Imagen de Portada:</label>
                        <input type="file" name="imagen" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block btn-md pull-right">
                            Registrar
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="panel-body">
                    <div class="form-group">
                        <label>Locación:</label>
                        <input type="text" class="form-control" id="us3-address"/>
                    </div>

                    <div id="us3" style="width: 550px; height: 300px;"></div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="m-t-small">
                        <div class="col-sm-3">
                            <input type="hidden" class="form-control" style="width: 110px;  " name="latitud" id="us3-lat"/>
                        </div>
                        <div class="col-sm-3">
                            <input type="hidden" class="form-control" style="width: 110px" name="longitud" id="us3-lon"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <script>
                        function getLocation() {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(showPosition);
                            } else {
                                x.innerHTML = "Geolocation is not supported by this browser.";
                            }
                        }

                        $('#us3').locationpicker({
                            location: {
                                latitude: -18.0065679,
                                longitude: -70.2462741
                                // latitude: latitude,
                                // longitude: longitude
                            },
                            radius: 300,
                            inputBinding: {
                                latitudeInput: $('#us3-lat'),
                                longitudeInput: $('#us3-lon'),
                                radiusInput: $('#us3-radius'),
                                locationNameInput: $('#us3-address')
                            },
                            enableAutocomplete: true,
                            onchanged: function (currentLocation, radius, isMarkerDropped) {
                                // Uncomment line below to show alert on each Location Changed event
                                // alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                            }
                        });
                    </script>

                </div>
            </div>
        </form>
    </div>

@stop