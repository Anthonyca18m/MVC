

<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>USUARIOS</h1>
            <h2 class="">nuevo usuario</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Tablero General</a></li>
                <li><a href="#">Usuarios</a></li>
                <li class="active">Nuevo Usuario</li>
            </ol>
        </div>
    </div>
    <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="row">
            <div class="col-md-12">
                <div class="block-web">
                    <div class="header">
                        <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> </div>
                        <h3 class="content-header">Registrar Nuevo Usuario</h3>
                    </div>
                    <div class="porlets-content">
                        <form class="form-horizontal group-border-dashed FormularioAjax" 
                        action="<?php echo SERVERURL; ?>ajax/userAjax.php" data-form="save" 
                        method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group" style="padding:1%;">
                                <div class="col-sm-12">
                                    <label class="control-label text"><b>
                                            <h3>Datos Básicos<h3>
                                        </b></label>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Nombres: *</b></label>
                                    <input type="text" id="reg_nombres" name="reg_nombres" class="form-control" required placeholder="Ingresa nombres" />
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Apellido Paterno: *</b></label>
                                    <input type="text" id="reg_paterno" name="reg_paterno" class="form-control" required placeholder="Ingresa apellido paterno" />
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Apellido Materno: *</b></label>
                                    <input type="text" id="reg_materno" name="reg_materno" class="form-control" required placeholder="Ingresa apellido materno" />
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Genéro: *</b></label>
                                    <select required id="reg_genero" name="reg_genero">
                                        <option value="">SELECCIONE GENÉRO</option>
                                        <option value="1">MUJER</option>
                                        <option value="2">HOMBRE</option>
                                        <option value="3">NO DEFINIDO</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Tipo de Documento: *</b></label>
                                    <select required id="reg_tipodoc" name="reg_tipodoc">
                                        <option value="">SELECCIONE TIPO</option>
                                        <option value="1">DNI</option>
                                        <option value="2">CARNET DE EXTRANJERIA</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Documento: *</b></label>
                                    <input parsley-type="digits" min-lenght="8" max-length="8" id="reg_doc" name="reg_doc" type="text" class="form-control" required placeholder="Ingresa documento" />
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Foto Perfil:</b></label>
                                    <input type="file" id="reg_foto" name="reg_foto" accept="image/*" />
                                </div>
                            </div>
                            <!--/form-group-->

                            <div class="form-group" style="padding:1%;">
                                <div class="col-sm-12">
                                    <label class="control-label text"><b>
                                            <h3>Credenciales<h3>
                                        </b></label>
                                </div>
                                <div class="col-sm-4">
                                    <label class=" control-label"><b>Nombre de usuario *</b></label>
                                    <input type="text" id="reg_user" name="reg_user" class="form-control" required parsley-rangelength="[5,10]" placeholder="Ingresa nombre usuario" />
                                </div>

                                <div class="col-sm-4">
                                    <label class="control-label"><b>Contraseña *</b></label>
                                    <input type="password" id="reg_pass" name="reg_pass" class="form-control" required placeholder="Ingresa contraseña" />
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label"><b>Confirmar Contraseña *</b></label>
                                    <input type="password" class="form-control" required parsley-equalto="#reg_pass" placeholder="RE-Ingresa contraseña para confirmar" />
                                </div>
                            </div>
                           


                            <div class="form-group" style="padding:1%;">
                                <div class="col-sm-12">
                                    <label class="control-label text"><b>
                                            <h3>Contacto<h3>
                                        </b></label>
                                </div>


                                <div class="col-sm-3">
                                    <label class="control-label"><b>E-Mail:</b></label>
                                    <input type="email" id="reg_email" name="reg_email" class="form-control" parsley-type="email" placeholder="Ingresa email" />
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Celular:</b></label>
                                    <input type="text" id="reg_celular" name="reg_celular" placeholder="+51 999 999 999" class="form-control mask" data-inputmask="'mask':'+51 999 999 999'">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Teléfono:</b></label>
                                    <input type="text" id="reg_telefono" name="reg_telefono" placeholder="+01 999 9999" class="form-control mask" data-inputmask="'mask':'+01 999 9999'">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Dirección:</b></label>
                                    <input parsley-type="alphanum" id="reg_direccion" name="reg_direccion" type="text" class="form-control" placeholder="Ingresa dirección" />
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Referencia:</b></label>
                                    <input parsley-type="alphanum" id="reg_referencia" name="reg_referencia" type="text" class="form-control" placeholder="Ingresa referencia" />
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>País:</b></label>
                                    <select id="reg_pais" name="reg_pais">
                                        <option value="1">PERÚ</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Departamento:</b></label>
                                    <select id="reg_departamento" name="reg_departamento">
                                        <option value="">SELECCIONE DEPARTAMENTO</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Provincia:</b></label>
                                    <select id="reg_provincia" name="reg_provincia">
                                        <option value="">SELECCIONE PROVINCIA</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label"><b>Distrito:</b></label>
                                    <select id="reg_distrito" name="reg_distrito">
                                        <option value="">SELECCIONE DISTRITO</option>
                                    </select>
                                </div>



                            </div>
                            <!--/form-group-->


                            <!--/form-group-->
                            <div class="form-group">
                                <div class="col-sm-12 center">
                                    <button class="btn btn-warning">Limpiar</button>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                    <button class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                    </div>


                    <!--/form-group-->
                    <div class="RespuestaAjax"></div>
                    </form>
                </div>
                <!--/porlets-content-->
            </div>
            <!--/block-web-->
        </div>
        <!--/col-md-12-->
    </div>
    <!--/row-->
</div>
<!--\\\\\\\ container  end \\\\\\-->
</div>
<!--\\\\\\\ content panel end \\\\\\-->


<script type="text/javascript">
    $('#tablerogeneral').removeClass("left_nav_active");
    $("#ul_usuarios").css("display", "block");
    $('#usuarios').addClass("left_nav_active");
    $('#nuevo_usuario').addClass("left_nav_active");
</script>