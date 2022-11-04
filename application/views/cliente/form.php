<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Registrar</span> Cliente</h4>
      </div>

      <form id='formCliente' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_cli" name="id_cli" value="">
                    <span class="input-group-addon">Nombre</span>
                    <input name="nom_cli" type="text" class="form-control" id="nom_cli" required="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Apellidos</span>
                    <input name="ape_cli" type="text" class="form-control" id="ape_cli" required="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Teléfono</span>
                    <input name="tel_cli" type="text" class="form-control" id="tel_cli" required="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">DNI</span>
                    <input name="dni_cli" type="text" class="form-control" id="dni_cli" required="" maxlength="8" minlength="8">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Distrito</span>
                    <select name="id_dis" id="id_dis" class="form-control" required>
                      <option value="">.::Seleccione::.</option>
                      <?php foreach($distrito as $obj){ ?>
                      <option value="<?php echo $obj->id_dis; ?>"><?php echo $obj->desc_dis; ?></option>
                      <?php } ?>
                    </select>
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