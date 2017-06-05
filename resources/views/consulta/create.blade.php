<?php
/**
 * Created by PhpStorm.
 * User: Eliam
 * Date: 17/04/2017
 * Time: 12:45 AM
 */
?>
@extends("app") @section("title") Sisjur Procesos @stop @section("content")
    <div id="registrar_consulta">
        <section class="content-header">
            <div class="row">
                <div class="col-md-4 col-sm-4" id="contenido-cabecera">

                </div>

                <div class="col-md-offset-3 col-md-5 col-sm-4" id="msj">
                  @if (count($errors) > 0)
                  <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                </div>
            </div>
        </section>
        <section style="padding : 10px 25px 25px 25px;">
            <form action="{{URL::asset('consultas/store')}}" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Clientes</label>

                                        <select requerid class=" selectpicker form-control" style="width: 100%;"
                                                tabindex="-1" aria-hidden="true" name="cliente" data-live-search="true">
                                            <option selected></option>
                                            @foreach ($clientes as $cliente)
                                                <option data-tokens="{{$cliente->id}}" value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input required type="text" class="form-control" name="tipo_caso"
                                           placeholder="Digita el tipo de caso" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input required type="text" class="form-control pull-right" name="fecha_ini" id="datepicker"
                                               value="">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>


                        </div>


                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit" >Registrar</button>
                    </div>
                </div>
            </div>
            </form>
        </section>
    </div>

@stop @section("scripts")
    <script>
        animation_title("Registrar Consulta");



        //mascara para celular
        $("input[name=txt_celular]").inputmask("mask", {"mask": "(999) 999-9999"});
        //solo admitir letras
        only_letters("input[name=tipo_caso]");
        only_letters("input[name=nombre_juez]");

        $('body').on('focus', "input[name='fecha_ini']", function () {
            $(this).datepicker({
                autoclose: true
            });
        });
    </script>

@stop
