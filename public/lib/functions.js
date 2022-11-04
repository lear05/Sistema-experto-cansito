function Alerta(text, typ){
	/*$.notify({
		// options
		message: text
	},{
		// settings
		type: typ,
		z_index: 1300,
		delay: 2000,
		placement: {
			from: "top",
			align: "center"
		},
		position:"fixed",
		timer: 50,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		}
	});*/
   if(typ=="success"){
      ico = "pe-7s-check";
   }else if(typ=="warning"){
      ico = "pe-7s-smile"
   }else if(typ=="danger"){
      ico = "pe-7s-close-circle";
   }

   $.notify({
      icon: ico,
      message: "<b>Mensaje</b> - "+text
      },{
      type: typ,
      timer: 45,
      z_index: 1300
   });
}

function Confirmar(title, type, fnA, fnC, btnType) {
	if(btnType==""||btnType==undefined){
		btnType = "btn-danger";
	}

    swal({
        title: title,
        type: type,
        showCancelButton: true,
        confirmButtonClass: "btn btn-info btn-fill",
        cancelButtonClass: "btn btn-danger btn-fill",
  		//confirmButtonClass: btnType,
        confirmButtonText: "Aceptar"
    }, function (isConfirm) {
        if (isConfirm) {
            if (typeof (fnA) == 'function')
                fnA();
        } else {
            if (typeof (fnC) == 'function')
                fnC();
        }
    });
}

function Mensaje(msg, type){
	swal("", msg, type);
}

$(document).on("mouseover", ".dataTable tbody tr", function(){
	if(!$(this).hasClass('bg-warning')){
		$(this).parent().removeClass('bg-info');
		$(this).addClass('bg-info');
	}
});

$(document).on("mouseout", ".dataTable tbody tr", function(){
	if(!$(this).hasClass('bg-warning')){
		$(this).removeClass('bg-info');
	}
});

function getDate(date){
	var fecha = date.split("-");
}