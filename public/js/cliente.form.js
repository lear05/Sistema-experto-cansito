$("#dni_cli").numeric();
$("#formCliente").submit(function(event){
   event.preventDefault();
   $.post(url_aplication+'cliente/process', $("#formCliente").serialize(), function(response) {
      if(response.result==true){
         tblCliente.fnReloadAjax();
         $("#modalCliente").modal("hide");
         Alerta("Registro Exitoso!!", "success");
      }else{
         Alerta(response.msg, "warning");
      }
   },'json');
});