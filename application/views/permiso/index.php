<div class="content">
    <div class="row">
          <div class="col-sm-3">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Perfiles</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-12">
                    <select name="id_per" id="id_per" class="form-control">
                      <?php foreach($perfil as $obj){ ?>
                      <option value="<?php echo $obj->id_per?>"><?php echo $obj->name_per?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-9">
                <h3 class="">Modulos</h3>
              </div>
                <div class="row" id="container-permitido">

                </div>
            </div>
          </div>
        </div>
</div>
