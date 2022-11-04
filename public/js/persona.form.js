$("#dni_pers, #fnacimiento_pers").numeric();
moment.locale('es');
$("#fnacimiento_pers").datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
});

/*.datepicker({
      autoclose: true,
      language: 'es',
      //format: 'dd/mm/yyyy',
      format: 'yyyy-mm-dd'
});*/

$("#formPersona").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'persona/process', $("#formPersona").serialize(), function(response) {
		if(response.result==true){
			tblPersona.fnReloadAjax();
			$("#modalPersona").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});