<?php
/**
 * Created by PhpStorm.
 * User: Eliam
 * Date: 12/03/2017
 * Time: 12:28 PM
 */
?>

@extends("app") @section("title") Sisjur Procesos @stop @section("content")
    <div id="listar_abogados">
        <section class="content-header">
            <div class="row">
                <div class="col-md-4 col-sm-4" id="contenido-cabecera">

                </div>

            <div class="col-md-5 col-sm-4" id="msj" style="float:right">
                 @if (isset($msj))
                <div class="alert align-right alert-success alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
                    {{$msj}}
                </div>
                @endif
                  @if (isset($err))
                <div class="alert  alert-error alert-dismissible" role="alert" style="margin-bottom : -5px;margin-top : -5px;z-index:2;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
                    {{$err}}
                </div>
                @endif

            </div>
            </div>
        </section>

        <section style="padding : 10px 25px 25px 25px;">
            <div class="box box-danger">

                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending" style="width: 105px;">Radicado</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending" style="width: 150px;">Cliente</th>
                                        @if(session("users")["tipo"]=="administrador")
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 131px;">Abogado</th>
                                        @endif    
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 131px;">Descripción</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Fecha inicio</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                            style="width: 101px;">Estado</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending" style="width: 70px;">Acciones</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($casos as $caso)


                                        <tr role="row">
                                         <a href="#">
                                            <td>{{$caso->radicado}}</td>
                                            <td>{{$caso->nombre_cliente}}</td>
                                            @if(session("users")["tipo"]=="administrador")
                                            <th>{{$caso->abogado[0]->persona->nombre}} {{$caso->abogado[0]->persona->apellido}}</th>
                                            @endif  
                                            <td>{{$caso->descripcion}}</td>
                                            <td>{{$caso->fecha_inicio}}</td>
                                            <td>
                                            @if($caso->estado=="Activo")
                                                <span class="label label-success">{{$caso->estado}}</span>
                                            @elseif($caso->estado=="Pendiente")
                                                <span class="label label-warning">{{$caso->estado}}</span>
                                            @elseif($caso->estado=="Por asignar")
                                                 <span class="label label-danger">{{$caso->estado}}</span>
                                            @endif
                                            </td>
                                            <!--<td>{{$caso->estado}}</td>-->
                                              <td>
                                              <a href="{{URL::asset('procesos/info')}}/{{$caso->id}}" class="btn btn-primary  btn-sm" data-original-title="Informacion" data-toggle="tooltip" ><i class="fa fa-info"></i></a>

                                           @if(session("users")["tipo"]=="abogado")

                                            <a href="{{URL::asset('procesos/editar')}}/{{$caso->id}}" class="btn btn-primary  btn-sm" data-original-title="Editar proceso" data-toggle="tooltip" ><i class="fa fa-edit"></i></a>
                                            <a href="{{URL::asset('procesos/eliminar')}}/{{$caso->id}}" data-original-title="Eliminar proceso" data-toggle="tooltip" class="btn btn-danger btn-sm" ><i class="fa fa-times-circle"></i></a>
                                            @elseif(session("users")["tipo"]=="administrador")
                                            <a href="{{URL::asset('procesos/asignar')}}/{{$caso->id}}" class="btn btn-warning  btn-sm" data-original-title="Re asignar" data-toggle="tooltip" ><i class="fa fa-exchange"></i></a>

                                          @endif
                                                 </td>


                                         </a>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </section>

    </div>

@stop
@section("scripts")
    <script>

        animation_title("Listado de procesos");



    </script>
@stop
