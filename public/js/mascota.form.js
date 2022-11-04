$("#edad_ani").numeric();
$("#peso_ani").numeric();

$("#id_cli").select2();

$("#formMascota").submit(function(event){
   event.preventDefault();
   $.post(url_aplication+'mascota/process', $("#formMascota").serialize(), function(response) {
      if(response.result==true){
         tblMascota.fnReloadAjax();
         $("#modalMascota").modal("hide");
         Alerta("Registro Exitoso!!", "success");
      }else{
         Alerta(response.msg, "warning");
      }
   },'json');
});