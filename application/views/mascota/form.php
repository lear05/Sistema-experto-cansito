<div class="modal fade" id="modalMascota" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Registrar</span> Mascota</h4>
      </div>

      <form id='formMascota' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_ani" name="id_ani" value="">
                    <span class="input-group-addon">Nombres</span>
                    <input name="nom_ani" type="text" class="form-control" id="nom_ani" required="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
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

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Edad</span>
                    <input name="edad_ani" type="text" class="form-control" id="edad_ani" required="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Peso</span>
                    <input name="peso_ani" type="text" class="form-control" id="peso_ani" required="">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Dueño</span>
                    <select name="id_cli" class="form-control" id="id_cli" required="" style="width:100%">
                      <option value="">.::Seleccione::.</option>
                      <?php foreach($cliente as $obj){ ?>
                      <option value="<?php echo $obj->id_cli;?>"><?php echo $obj->dni_cli." | ".$obj->nom_cli." ".$obj->ape_cli; ?></option>
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