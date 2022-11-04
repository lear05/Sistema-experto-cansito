<div class="modal fade" id="modalModulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Registrar</span> Modulo</h4>
      </div>

      <form id='formModulo' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_mod" name="id_mod" value="">
                    <span class="input-group-addon">Descripción</span>
                    <input name="name_mod" type="text" class="form-control" id="name_mod" required="">
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="checkbox">
                <label><input type="checkbox" name="alone" id="alone"> Alone</label>
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Padre</span>
                    <select name="id_padre" id="id_padre" class="form-control">
                      <option value="">Padre</option>
                      <?php foreach($modulo_padre as $obj){ ?>
                      <option value="<?php echo $obj->id_mod; ?>"><?php echo $obj->name_mod; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">URL</span>
                    <input name="url" type="text" class="form-control" id="url">
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Icon</span>
                    <input name="icon" type="text" class="form-control" id="icon">
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Orden</span>
                    <input name="orden" type="text" class="form-control" id="orden" required="">
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