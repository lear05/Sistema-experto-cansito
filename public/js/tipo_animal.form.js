$("#formTipoAnimal").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'tipo_animal/process', $("#formTipoAnimal").serialize(), function(response) {
		if(response.result==true){
			tblTipoAnimal.fnReloadAjax();
			$("#modalTipoAnimal").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});