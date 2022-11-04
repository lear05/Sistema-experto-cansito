var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addPersona'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editPersona'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delPersona'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"persona/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};

var tblPersona = $("#table-persona").dataTable(param);/*.columnFilter({
// Set filter type
	aoColumns: [
		{ type: "text" },
		{ type: "text" },
		{ type: "text" },
		{ type: "text" },
		{ type: "text" }
	]
});*/
//SELECCIONAR GRILLA
$('#table-persona tbody').on('click','tr', function () {
    tblPersona.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-persona tbody').on('dblclick','tr', function () {
	rowSelected = tblPersona.fnGetData(tblPersona.$('tr.bg-warning'));
    editPersona(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addPersona").click(function(){
	$("#formPersona input, #formPersona select, #formPersona textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalPersona").modal("show");
});

$("#editPersona").click(function(){
	rowSelected = tblPersona.fnGetData(tblPersona.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editPersona(rowSelected.DT_RowId);
	}
});

$("#delPersona").click(function(){
	rowSelected = tblPersona.fnGetData(tblPersona.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delPersona(rowSelected.DT_RowId);
	}
});

$("#cargoPersona").click(function(){
	rowSelected = tblPersona.fnGetData(tblPersona.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		CargoPersona(rowSelected.DT_RowId);
	}
});

function editPersona(id){
	$("#carga").show();
	$.post(url_aplication+'persona/get', {id_pers: id}, function(response) {
		$("#id_pers").val(response.id_pers);
		$("#nombre_pers").val(response.nombre_pers);
		$("#apaterno_pers").val(response.apaterno_pers);
		$("#amaterno_pers").val(response.amaterno_pers);
		$("#sexo_pers").val(response.sexo_pers);
		$("#direccion_pers").val(response.direccion_pers);
		$("#telefono_pers").val(response.telefono_pers);
		$("#dni_pers").val(response.dni_pers);
		$("#fnacimiento_pers").val(response.fnacimiento_pers);
		$("#name_usu").val(response.name_usu);
		$("#pass_usu").val("");
		$("#id_per").val(response.id_per);
		$("#myModalLabel span").html("Editar");
		$("#modalPersona").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delPersona(id){
	Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'persona/delete', {id_pers: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblPersona.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}

function CargoPersona(id){
	$.post(url_aplication+'persona/cargo', {id_pers: id}, function(response) {
		$(".persona").html(response.Persona.nombre_pers+" "+response.Persona.apaterno_pers+" "+response.Persona.amaterno_pers);
		$("#tablePersonaCargo tbody").html("");
		$.each(response.Cargo, function(index, obj) {
			t="<tr>";
			t+="<td>"+obj.desc_car+"</td>";
			t+="<td>"+obj.desc_area+"</td>";
			t+="<td><center><input type='radio' name='cargo_persona' onclick='ActivarCargoPersona("+obj.id_pers+", "+obj.id_car
			+", "+obj.id_area+")' /></center></td>";
			$("#tablePersonaCargo tbody").append(t);
		});
		$("#modalPersonaCargo").modal("show");
	},'json');
}

function ActivarCargoPersona(persona, cargo, area){
	$.post(url_aplication+'persona/activarCargo', {
		id_pers : persona,
		id_car : cargo,
		id_area : area
	}, function(response) {

	},'json');
}

$("#formPersonaCargo").submit(function(event) {
	event.preventDefault();
	$.post(url_aplication+'persona/addCargo', {
		id_pers : rowSelected.DT_RowId,
		id_car : $("#id_car").val(),
		id_area : $("#id_area").val()
	}, function(response) {
		if(response.result==true){
			Alerta("Proceso Realizado", "success");
			$("#id_car, #id_area").val("");
			CargoPersona(rowSelected.DT_RowId);
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});