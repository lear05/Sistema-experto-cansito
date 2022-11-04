var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addCliente'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editCliente'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delCliente'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"cliente/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblCliente = $("#table-cliente").dataTable(param);/*.columnFilter({
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
$('#table-cliente tbody').on('click','tr', function () {
    tblCliente.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-cliente tbody').on('dblclick','tr', function () {
   rowSelected = tblCliente.fnGetData(tblCliente.$('tr.bg-warning'));
    editCliente(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addCliente").click(function(){
   $("#formCliente input, #formCliente select, #formCliente textarea").val("");
   $("#myModalLabel span").html("Registrar");
   $("#modalCliente").modal("show");
});

$("#editCliente").click(function(){
   rowSelected = tblCliente.fnGetData(tblCliente.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      editCliente(rowSelected.DT_RowId);
   }
});

$("#delCliente").click(function(){
   rowSelected = tblCliente.fnGetData(tblCliente.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      delCliente(rowSelected.DT_RowId);
   }
});

function editCliente(id){
   $("#carga").show();
   $.post(url_aplication+'cliente/get', {id_cli: id}, function(response) {
      $("#id_cli").val(response.id_cli);
      $("#nom_cli").val(response.nom_cli);
      $("#ape_cli").val(response.ape_cli);
      $("#tel_cli").val(response.tel_cli);
      $("#dni_cli").val(response.dni_cli);
      $("#id_dis").val(response.id_dis);
      $("#myModalLabel span").html("Editar");
      $("#modalCliente").modal("show");
      $("#carga").fadeOut("fast");
   },'json');
}

function delCliente(id){
   Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
      $.post(url_aplication+'cliente/delete', {id_cli: id}, function(response) {
         if(response.result==true){
            Alerta("Registro eliminado", "success");
            tblCliente.fnReloadAjax();
         }else{
            Alerta(response.msg, "danger");
         }
      },'json');
   }, function(){

   });
}