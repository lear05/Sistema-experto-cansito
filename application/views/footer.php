	</body>
   
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery-ui.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url()?>public/lib/assets/js/bootstrap.min.js" type="text/javascript"></script>

   <!--  Forms Validations Plugin -->
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery.validate.min.js"></script>

   <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
   <script src="<?php echo base_url()?>public/lib/assets/js/moment.min.js"></script>

    <!--  Date Time Picker Plugin is included in this js file -->
   <script src="<?php echo base_url()?>public/lib/assets/js/bootstrap-datetimepicker.js"></script>

    <!--  Select Picker Plugin -->
   <script src="<?php echo base_url()?>public/lib/assets/js/bootstrap-selectpicker.js"></script>

   <!--  Checkbox, Radio, Switch and Tags Input Plugins -->
   <script src="<?php echo base_url()?>public/lib/assets/js/bootstrap-checkbox-radio-switch-tags.js"></script>

   <!--  Charts Plugin -->
   <script src="<?php echo base_url()?>public/lib/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
   <script src="<?php echo base_url()?>public/lib/assets/js/bootstrap-notify.js"></script>

    <!-- Sweet Alert 2 plugin -->
   <script src="<?php echo base_url()?>public/lib/assets/js/sweetalert2.js"></script>

    <!-- Vector Map plugin -->
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery-jvectormap.js"></script>

    <!--  Google Maps Plugin    -->
    <!--<script src="<?php echo base_url()?>public/lib/assets/js/apimap.js"></script>-->

   <!-- Wizard Plugin    -->
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery.bootstrap.wizard.min.js"></script>

    <!--  Bootstrap Table Plugin    -->
   <script src="<?php echo base_url()?>public/lib/assets/js/bootstrap-table.js"></script>

   <!--  Plugin for DataTables.net  -->
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery.datatables.js"></script>


    <!--  Full Calendar Plugin    -->
   <script src="<?php echo base_url()?>public/lib/assets/js/fullcalendar.min.js"></script>

    <!-- Light Bootstrap Dashboard Core javascript and methods -->
   <script src="<?php echo base_url()?>public/lib/assets/js/light-bootstrap-dashboard.js"></script>

   <!--   Sharrre Library    -->
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery.sharrre.js"></script>

   <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
   <script src="<?php echo base_url()?>public/lib/assets/js/demo.js"></script>

   <script src="<?=base_url()?>public/lib/functions.js"></script>

   <script>
         var url_aplication = "<?=base_url()?>";
         var w = $(window).height();
         w = w*0.7;

         /*menu = $("body").attr("option");
         if(menu==="" || menu===undefined){
            menu = "00";
         }

         $("#option"+menu).addClass('active');*/

         var param = {
              "lengthMenu": [[10, 20, 100], [10, 20, 100]],
              "language": {
                   "lengthMenu": "<button class='btn btn-flat btn-success' data-toggle='modal' data-target='#modal_registro'>Registrar</button> | Cantidad de registros  _MENU_",
                   "zeroRecords": "No hay registros",
                   "info": "",
                      "info": "Pagina _PAGE_ de _PAGES_",
                      //"info": "<buton type='button' class='btn btn-sm btn-success' title='Exportar a un archivo Excel'><i class='fa fa-file-excel-o'></i></buton>",
                   "infoEmpty": "Registro no encontrado",
                   "infoFiltered": "(buscado en _MAX_ registros)",
                   "search":         "Buscar: ",
                   "paginate": {
                      "first":      "First",
                      "last":       "Last",
                      "next":       "<i class='fa fa-angle-double-right'></i>",
                      "previous":   "<i class='fa fa-angle-double-left'></i>"
                  },
              }
          };

         $(".modal").modal({"show": false, backdrop: 'static', keyboard: false});

      setTimeout(function(){
                // after 1000 ms we add the class animated to the login/register card
         $('.card').removeClass('card-hidden');
      }, 300)
   </script>

   <?php foreach($lib_js as $key => $value){ ?>
   <script type="text/javascript" src="<?php echo $value ?>"></script>
   <?php } ?>
</html>