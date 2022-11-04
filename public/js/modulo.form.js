$("#formModulo").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'modulo/process', $("#formModulo").serialize(), function(response) {
		if(response.result==true){
			tblModulo.fnReloadAjax();
			$("#modalModulo").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});

$("#alone").click(function(){
	if($(this).is(":checked")){
		$("#id_padre").prop("disabled", true);
	}else{
		$("#id_padre").prop("disabled", false);
	}
});