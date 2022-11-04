<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url() ?>" class="navbar-brand"><b>Company</b> S.A.C</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="#">¿Quienes somos?</a></li>
            <li><a href="#">Servicios</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-sign-in"></i> Intranet</a></li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper" style="background: #FFF">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-3">
            <div style="background: #E7EBEF; font-weight: normal; text-align: center; margin: 0px; display: block; padding: 7px 0px; box-shadow: 0px 0px 1px;">Productos Agregados</div>

            <form id="formCotizar">
              <div id="put-productos"></div>

              <div id="addition-datos" style="display: none">
                <center>
                  <div class="form-group">
                    <div class="input-group">
                        <input name="nombre_cot" type="text" class="form-control" id="nombre_cot" placeholder="Nombres y Apellidos(*)" required="">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                        <input name="telefono_cot" type="text" class="form-control" id="telefono_cot" placeholder="Teléfono(*)" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                        <input name="email_cot" type="text" class="form-control" id="email_cot" placeholder="E-mail(*)" required>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-success btn-flat" id="btn-process-cotizacion"><i class="fa fa-check"></i> Cotizar</button>
                </center>
              </div>
            </form>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon">Categorias</span>
                      <select name="id_cat" id="id_cat" class="form-control select2" style="width:100%; height: 0px;">
                        <option value="">Todas</option>
                      <?php foreach($categoria as $obj){ ?>
                        <option value="<?php echo $obj->id_cat?>"><?php echo $obj->name_cat; ?></option>
                      <?php } ?>
                      </select>
                  </div>
                </div>
              </div>

              <div class="col-sm-7">
                <ul class="pagination" style="margin:0px; display: none">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>

                <!--<button type="button" class="btn btn-success btn-flat" style="vertical-align: top;"><i class="fa fa-search"></i> Buscar</button>-->
              </div>

              <div class="col-sm-12">
                <div class="row" id="list-products"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; <?php echo date("Y") ?> <a href="http://almsaeedstudio.com">Company S.A.C.</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>