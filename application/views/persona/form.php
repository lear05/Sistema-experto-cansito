<div class="modal fade" id="modalPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Registrar</span> Usuario</h4>
      </div>

      <form id='formPersona' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_pers" name="id_pers" value="">
                    <span class="input-group-addon">Nombre</span>
                    <input name="nombre_pers" type="text" class="form-control" id="nombre_pers" required="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">A. Paterno</span>
                    <input name="apaterno_pers" type="text" class="form-control" id="apaterno_pers" >
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">A. Materno</span>
                    <input name="amaterno_pers" type="text" class="form-control" id="amaterno_pers">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Sexo</span>
                    <select name="sexo_pers" id="sexo_pers" class="form-control">
                      <option value="">.:: Seleccione ::.</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Dirección</span>
                    <input name="direccion_pers" type="text" class="form-control" id="direccion_pers">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Teléfono</span>
                    <input name="telefono_pers" type="text" class="form-control" id="telefono_pers">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">DNI</span>
                    <input name="dni_pers" type="text" class="form-control" id="dni_pers" maxlength="8" minlength="8">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Fecha Nac.</span>
                    <input name="fnacimiento_pers" type="text" class="form-control" id="fnacimiento_pers">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Perfil</span>
                    <select name="id_per" id="id_per" class="form-control" required>
                      <option value="">.:: Seleccione ::.</option>
                      <?php foreach($perfil as $obj){ ?>
                      <option value="<?php echo $obj->id_per; ?>"><?php echo $obj->name_per; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Usuario</span>
                    <input name="name_usu" type="text" class="form-control" id="name_usu">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Password</span>
                    <input name="pass_usu" type="password" class="form-control" id="pass_usu">
                </div>
              </div>
            </div>
          </div>
        </div>

          <div class="modal-footer clearfix">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

            <button type="submit" class="btn btn-success" id="btnRealizar" data-e="R" data-loading-text="Procesando...<i class='fa fa-refresh fa-spin'></i>"><i class="fa fa-check"></i> Realizar</button>
          </div>
      </form>
    </div>
  </div>
</div>