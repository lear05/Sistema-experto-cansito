<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="black" data-image="">   
        
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="post">
                            
                        <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card card-hidden">
                                <div class="header text-center">Acceso</div>

                                <center><img src="<?php echo base_url(); ?>public/img/logo.jpg" style="width:40%"></center>
                                          
                                <?php if($this->input->cookie("msg-error")!=""){  ?>
                                <div class="alert alert-danger">
                                  <span>
                                    <i class="pe-7s-smile"></i>
                                    <?php echo $messages["error"];?>                                 
                                  </span>
                                </div>
                                <?php } ?>

                                <div class="content">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="text" class="form-control" name="name_usu" placeholder="Usuario" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Clave</label>
                                        <input type="password" class="form-control" name="pass_usu" placeholder="Clave" required>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-success btn-wd">Login</button>
                                </div>
                            </div>
                                
                        </form>
                                
                    </div>                    
                </div>
            </div>
        </div>
    </div>                          
</div>
          