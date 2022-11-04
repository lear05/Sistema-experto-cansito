$("#formConocimientos").submit(function(event){
   event.preventDefault();
   $.post(url_aplication+'conocimientos/process', $("#formConocimientos").serialize(), function(response) {
      if(response.result==true){
         tblConocimientos.fnReloadAjax();
         $("#modalConocimientos").modal("hide");
         Alerta("Registro Exitoso!!", "success");
      }else{
         Alerta(response.msg, "warning");
      }
   },'json');
});