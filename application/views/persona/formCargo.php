<div class="modal fade" id="modalPersonaCargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cargo [ <b class="persona"></b> ]</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form id="formPersonaCargo">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Cargo</span>
                        <select name="id_car" id="id_car" class="form-control" required>
                          <option value="">.:: Seleccione ::.</option>
                          <?php foreach($cargo as $obj){ ?>
                          <option value="<?php echo $obj->id_car; ?>"><?php echo $obj->desc_car; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Aréa</span>
                        <select name="id_area" id="id_area" class="form-control" required>
                          <option value="">.:: Seleccione ::.</option>
                          <?php foreach($area as $obj){ ?>
                          <option value="<?php echo $obj->id_area; ?>"><?php echo $obj->desc_area; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <center><button class="btn btn-success btl-flat">Agregar</button></center>
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-12">
            <table id="tablePersonaCargo" class="table table-bordered">
              <thead class="bg-success">
                <tr>
                  <th>Cargo</th>
                  <th>Aréa</th>
                  <th>Activo</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="modal-footer clearfix">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>