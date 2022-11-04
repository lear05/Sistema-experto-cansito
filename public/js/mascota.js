btns = "<button type='button' class='btn btn-flat btn-success' id='addMascota'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editMascota'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delMascota'><i class='fa fa-trash'></i> Eliminar</button> ";
btns+=btnLast;
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"mascota/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblMascota = $("#table-mascota").dataTable(param);/*.columnFilter({
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
$('#table-mascota tbody').on('click','tr', function () {
    tblMascota.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-mascota tbody').on('dblclick','tr', function () {
   rowSelected = tblMascota.fnGetData(tblMascota.$('tr.bg-warning'));
    editMascota(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addMascota").click(function(){
   $("#formMascota input, #formMascota select, #formMascota textarea").val("");
   $("#myModalLabel span").html("Registrar");
   $("#modalMascota").modal("show");
});

$("#editMascota").click(function(){
   rowSelected = tblMascota.fnGetData(tblMascota.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      editMascota(rowSelected.DT_RowId);
   }
});

$("#delMascota").click(function(){
   rowSelected = tblMascota.fnGetData(tblMascota.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      delMascota(rowSelected.DT_RowId);
   }
});

function editMascota(id){
   $("#carga").show();
   $.post(url_aplication+'mascota/get', {id_ani: id}, function(response) {
      $("#id_ani").val(response.id_ani);
      $("#id_tani").val(response.id_tani);
      $("#id_cli").val(response.id_cli);
      $("#id_cli").select2();
      $("#nom_ani").val(response.nom_ani);
      $("#edad_ani").val(response.edad_ani);
      $("#peso_ani").val(response.peso_ani);
      $("#myModalLabel span").html("Editar");
      $("#modalMascota").modal("show");
      $("#carga").fadeOut("fast");
   },'json');
}

function delMascota(id){
   Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
      $.post(url_aplication+'mascota/delete', {id_ani: id}, function(response) {
         if(response.result==true){
            Alerta("Registro eliminado", "success");
            tblMascota.fnReloadAjax();
         }else{
            Alerta(response.msg, "danger");
         }
      },'json');
   }, function(){

   });
}