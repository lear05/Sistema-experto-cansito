$("#formDistrito").submit(function(event){
   event.preventDefault();
   $.post(url_aplication+'distrito/process', $("#formDistrito").serialize(), function(response) {
      if(response.result==true){
         tblDistrito.fnReloadAjax();
         $("#modalDistrito").modal("hide");
         Alerta("Registro Exitoso!!", "success");
      }else{
         Alerta(response.msg, "warning");
      }
   },'json');
});