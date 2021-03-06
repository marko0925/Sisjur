@extends("app") @section("title") Sisjur Cliente @stop @section("content")
<div id="registrar_cliente">
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
        <div class="col-md-12">
            <form role="form" action="registrar" onsubmit="return comprobar()" method="POST" id="form" enctype="multipart/form-data">
                <div class="box box-danger">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="row ">
                            <div class="col-md-4 col-md-offset-4">
                                <img id="preview" class="profile-user-img img-responsive img-circle" src="{{URL::asset('dist/img/profile2.png')}}"  alt="User profile picture">
                                <br>
                                    <input  id="file-image" name="image" type="file" accept='image/jpeg' class="file" data-show-preview="false" onchange="loadImage(event)" >
                            </div>
                        
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input required type="number" class="form-control" name="txt_dni" placeholder="Digita tu identifiacion" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required type="text" class="form-control" name="txt_nombre" placeholder="Digita el nombre" value=''>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input required type="text" class="form-control" name="txt_apellido" placeholder="Digita el apellido" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo</label>
                                    <input required type="email" class="form-control" name="txt_correo" id="exampleInputEmail1" placeholder="Digita el correo"
                                        value="">
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" class="form-control" name="txt_contrasena" id="exampleInputPassword1" placeholder="Digita la contraseña">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha de nacimiento:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input required type="text"  data-original-title='Fecha incorrecta' class="form-control pull-right" name="txt_fecha_nac" id="datepicker" value="">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Celular:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" name="txt_celular" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                            data-mask="(___.___)">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>


                    </div>


                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn .btn-sm btn-danger" id="registrar" value="Registrar" style="">

                    </div>
                </div>

            </form>

        </div>
    </section>
</div>

@stop @section("scripts")
<script>
      function loadImage () {
                var output = document.getElementById('preview');
                output.src = URL.createObjectURL(event.target.files[0]);
                this.image = event.target.files[0];
                console.log(output.src);
            }

    function comprobar(){
         return comprobar_fecha_nac("input[name=txt_fecha_nac]");
    }
    //mascara para celular
    $("input[name=txt_celular]").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
    animation_title("Registrar Cliente");
    $('body').on('focus', "#datepicker", function () {
        $(this).datepicker({
            autoclose: true
        });
    });
    $("#file-image").fileinput({
        showUpload : false
    });
    only_numbers("input[name=txt_dni]");
    only_letters("input[name=txt_nombre]");
    only_letters("input[name=txt_apellido]");

</script>

@stop