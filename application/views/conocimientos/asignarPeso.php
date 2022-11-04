<div class="modal fade" id="modalAsignarConocimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" >Asignar Peso [ <span id="conocimiento_title"></span> ]</h4>
      </div>

      <form id='formAsignarPeso' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10 col-sm-8">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_con_asignar" name="id_con" value="">
                    <span class="input-group-addon">Sintoma</span>
                    <select id="id_hec" class="form-control" style="width:100%">
                      <option value="">.::Seleccione::.</option>
                      <?php foreach($hechos as $obj){ ?>
                      <option value="<?php echo $obj->id_hec; ?>"><?php echo $obj->nombre_hec." - ".$obj->desc_tani; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <a href="javascript:void(0)" id="putHecho" class="btn btn-success btn-sm">Agregar</a>
            </div>
            <div class="col-md-12" style="overflow-y: scroll; height: 200px; padding: 0px 0px 0px 5px;">
              <table id="li-hecho" class="table table-bordered table-hover">
                <thead class="bg-success">
                  <tr>
                    <th>Sintoma - Tipo Animal</th>
                    <th width="70">Peso</th>
                    <th width="50"></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
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