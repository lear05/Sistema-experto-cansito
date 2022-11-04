var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addHecho'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editHecho'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delHecho'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"hechos/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblHecho = $("#table-hechos").dataTable(param);/*.columnFilter({
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
$('#table-hechos tbody').on('click','tr', function () {
    tblHecho.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-hechos tbody').on('dblclick','tr', function () {
   rowSelected = tblHecho.fnGetData(tblHecho.$('tr.bg-warning'));
    editHecho(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addHecho").click(function(){
   $("#formHecho input, #formHecho select, #formHecho textarea").val("");
   $("#myModalLabel span").html("Registrar");
   $("#modalHecho").modal("show");
});

$("#editHecho").click(function(){
   rowSelected = tblHecho.fnGetData(tblHecho.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      editHecho(rowSelected.DT_RowId);
   }
});

$("#delHecho").click(function(){
   rowSelected = tblHecho.fnGetData(tblHecho.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      delHecho(rowSelected.DT_RowId);
   }
});

function editHecho(id){
   $("#carga").show();
   $.post(url_aplication+'hechos/get', {id_hec: id}, function(response) {
      $("#id_hec").val(response.id_hec);
      $("#id_tani").val(response.id_tani);
      $("#nombre_hec").val(response.nombre_hec);
      $("#myModalLabel span").html("Editar");
      $("#modalHecho").modal("show");
      $("#carga").fadeOut("fast");
   },'json');
}

function delHecho(id){
   Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
      $.post(url_aplication+'hechos/delete', {id_hec: id}, function(response) {
         if(response.result==true){
            Alerta("Registro eliminado", "success");
            tblHecho.fnReloadAjax();
         }else{
            Alerta(response.msg, "danger");
         }
      },'json');
   }, function(){

   });
}