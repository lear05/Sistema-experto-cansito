var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addDistrito'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editDistrito'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delDistrito'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"distrito/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblDistrito = $("#table-distrito").dataTable(param);/*.columnFilter({
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
$('#table-distrito tbody').on('click','tr', function () {
    tblDistrito.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-distrito tbody').on('dblclick','tr', function () {
   rowSelected = tblDistrito.fnGetData(tblDistrito.$('tr.bg-warning'));
    editDistrito(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addDistrito").click(function(){
   $("#formDistrito input, #formDistrito select, #formDistrito textarea").val("");
   $("#myModalLabel span").html("Registrar");
   $("#modalDistrito").modal("show");
});

$("#editDistrito").click(function(){
   rowSelected = tblDistrito.fnGetData(tblDistrito.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      editDistrito(rowSelected.DT_RowId);
   }
});

$("#delDistrito").click(function(){
   rowSelected = tblDistrito.fnGetData(tblDistrito.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      delDistrito(rowSelected.DT_RowId);
   }
});

function editDistrito(id){
   $("#carga").show();
   $.post(url_aplication+'distrito/get', {id_dis: id}, function(response) {
      $("#id_dis").val(response.id_dis);
      $("#desc_dis").val(response.desc_dis);
      $("#myModalLabel span").html("Editar");
      $("#modalDistrito").modal("show");
      $("#carga").fadeOut("fast");
   },'json');
}

function delDistrito(id){
   Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
      $.post(url_aplication+'distrito/delete', {id_dis: id}, function(response) {
         if(response.result==true){
            Alerta("Registro eliminado", "success");
            tblDistrito.fnReloadAjax();
         }else{
            Alerta(response.msg, "danger");
         }
      },'json');
   }, function(){

   });
}