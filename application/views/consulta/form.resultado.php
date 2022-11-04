<div class="modal fade" id="modalDiagnosticar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Diagnosticar</span></h4>
        <div class="row">
          <div class="col-md-8 col-md-offset-2" style="">
            <div class="input-group">
              <input type="text" class="form-control" id="buscar_sintoma" placeholder="Buscar sintoma">
              <div class="input-group-addon"><i class="fa fa-search"></i></div>
            </div>
          </div>
        </div>
      </div>
        <div class="modal-body">
          <div class="row">
              <div class="row">
                <div class="col-md-6 col-md-offset-3" style="box-shadow: 0px 0px 1px #000;   padding-top: 1%;padding-bottom: 1%;">
                  <b>Lista de Sintomas</b><br><br>

                  <ul id="hechos" style='padding: 0px; list-style: none; overflow-y: scroll; height: 350px'>
                    <?php foreach($hecho as $obj){ ?>
                    <li class='tani<?php echo $obj->id_tani?> option-tani'>
                      <label style="font-weight: normal; cursor:pointer">
                        <input type="checkbox" class='option-hecho' value='<?php echo $obj->id_hec; ?>'> <?php echo $obj->nombre_hec; ?>
                      </label>
                    </li>
                    <?php } ?>
                  </ul>
                  <center>
                    <a href="javascript:void(0)" class="btn btn-sm btn-success" id="consultar">Consultar</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-warning" id="clearCheck">Limpiar</a>
                  </center>
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

<div class="modal fade" id="modalResultado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Resultado</span></h4>
      </div>
        <input type="hidden" id="id_dia" name="id_dia">
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12">
                <table id="resultado-lista" class="table table-bordered table-hover">
                  <thead class="bg-success">
                    <tr>
                      <th width="40">N°</th>
                      <th>ENFERMEDAD</th>
                      <th width="60">%</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
          </div>
        </div>

        <div class="modal-footer clearfix">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>

          <button type="button" class="btn btn-success" id="saveResultado"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalConocimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span id="title-con"></span></h4>
      </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-6">
                <b>Causas</b>
                <p id="text-cau"></p>
              </div>

              <div class="col-md-6">
                <b>Prevención</b>
                <p id="text-pre"></p>
              </div>
          </div>
        </div>

        <div class="modal-footer clearfix">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        </div>
    </div>
  </div>
</div>