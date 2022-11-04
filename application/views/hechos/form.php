<div class="modal fade" id="modalHecho" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Registrar</span> Sintoma</h4>
      </div>

      <form id='formHecho' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_hec" name="id_hec" value="">
                    <span class="input-group-addon">Descripción</span>
                    <input name="nombre_hec" type="text" class="form-control" id="nombre_hec" required="">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Tipo Animal</span>
                    <select name="id_tani" class="form-control" id="id_tani" required="">
                      <option value="">.::Seleccione::.</option>
                      <?php foreach($tipo_animal as $obj){ ?>
                      <option value="<?php echo $obj->id_tani; ?>"><?php echo $obj->desc_tani; ?></option>
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