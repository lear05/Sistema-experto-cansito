$("#formHecho").submit(function(event){
   event.preventDefault();
   $.post(url_aplication+'hechos/process', $("#formHecho").serialize(), function(response) {
      if(response.result==true){
         tblHecho.fnReloadAjax();
         $("#modalHecho").modal("hide");
         Alerta("Registro Exitoso!!", "success");
      }else{
         Alerta(response.msg, "warning");
      }
   },'json');
});