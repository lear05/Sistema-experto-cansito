<div class="modal fade" id="modalDiagnostico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" ><span>Consultar [ <b class="name_animal"></b> ]</span></h4>
      </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <form id="formDiagnostico">
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Fecha</span>
                            <input name="fecha" type="text" class="form-control" id="fecha" required="">
                            <input name="id_ani" type="hidden" class="form-control" id="id_ani_diagnostico">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4" style="text-align: right">
                      <button class="btn btn-success"><i class="fa fa-plus"></i> Agregar</button>
                    </div>
                  </form>

                  <div class="col-md-12">
                    <table id="table-diagnostico" class="table table-hover table-bordered">
                      <thead class="bg-success">
                        <tr>
                          <th>Fecha</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
              </div>
            </div>
        </div>

        <div class="modal-footer clearfix">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        </div>
    </div>
  </div>
</div>