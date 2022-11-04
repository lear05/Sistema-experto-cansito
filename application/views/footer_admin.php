						   </div>
                  </div>
               </div>
				</div>
			</div>
		</div>
   </div>
	<div id="carga" style="  z-index: 3000;background: rgba(255,255,255,0.7); border-radius: 3px; position: fixed;  top: 0;  left: 0;  width: 100%;  height: 100%; display:none">
        <i class="fa fa-refresh fa-spin" style="position: fixed;  top: 50%;  left: 50%;  margin-left: -15px;  margin-top: -15px;  color: #000;  font-size: 30px;"></i>
   </div>
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
   <script src="<?php echo base_url()?>public/lib/assets/js/fnReloadAjax.js"></script>
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery.dataTables.columnFilter.js"></script>


    <!--  Full Calendar Plugin    -->
   <script src="<?php echo base_url()?>public/lib/assets/js/fullcalendar.min.js"></script>

    <!-- Light Bootstrap Dashboard Core javascript and methods -->
   <script src="<?php echo base_url()?>public/lib/assets/js/light-bootstrap-dashboard.js"></script>

   <!--   Sharrre Library    -->
   <script src="<?php echo base_url()?>public/lib/assets/js/jquery.sharrre.js"></script>

   <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
   <script src="<?php echo base_url()?>public/lib/assets/js/demo.js"></script>

   <script src="<?php echo base_url()?>public/lib/select2/js/select2.full.min.js"></script>

   <script type="text/javascript" src="<?php echo base_url()?>public/lib/highcharts/highcharts.js"></script>

   <script type="text/javascript" src="<?php echo base_url()?>public/lib/highcharts/modules/exporting.js"></script>


   <script src="<?php echo base_url();?>public/lib/functions.js"></script>

   <script src="<?php echo base_url();?>public/lib/jquery.numeric.js"></script>

    	<script>
			var url_aplication = "<?php echo base_url();?>";
			var w = $(window).height();
			w = w*0.7;
      var btnLast, rowSelected;
      btnLast = "";

			/*menu = $("body").attr("option");
			if(menu==="" || menu===undefined){
				menu = "00";
			}

			$("#option"+menu).addClass('active');*/

			var param = {
				"scrollCollapse": true,
				"scrollY":        "600px",
		        "lengthMenu": [[10, 30, 60, 100], [10, 30, 60, 100]],
		        "language": {
		            "lengthMenu": " _MENU_",
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
		        },
		        "bProcessing": false,
				"bServerSide": true,
				"sAjaxSource": "",
				"sPaginationType": "full_numbers",
				"fnServerData" : ""
		    };

		    $(".modal").modal({"show": false, backdrop: 'static', keyboard: false});
		</script>

    	<?php foreach($lib_js as $key => $value){ ?>
	  	<script type="text/javascript" src="<?php echo $value; ?>"></script>
	  	<?php } ?>

</html>