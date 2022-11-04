var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addConocimientos'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editConocimientos'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delConocimientos'><i class='fa fa-trash'></i> Eliminar</button> ";
btns += "<button type='button' class='btn btn-flat btn-primary' id='addHecho'><i class='fa fa-sliders'></i> Hechos</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"conocimientos/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblConocimientos = $("#table-conocimientos").dataTable(param);/*.columnFilter({
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
$('#table-conocimientos tbody').on('click','tr', function () {
    tblConocimientos.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-conocimientos tbody').on('dblclick','tr', function () {
   rowSelected = tblConocimientos.fnGetData(tblConocimientos.$('tr.bg-warning'));
    editConocimientos(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addConocimientos").click(function(){
   $("#formConocimientos input, #formConocimientos select, #formConocimientos textarea").val("");
   $("#myModalLabel span").html("Registrar");
   $("#modalConocimientos").modal("show");
});

$("#editConocimientos").click(function(){
   rowSelected = tblConocimientos.fnGetData(tblConocimientos.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      editConocimientos(rowSelected.DT_RowId);
   }
});

$("#delConocimientos").click(function(){
   rowSelected = tblConocimientos.fnGetData(tblConocimientos.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      delConocimientos(rowSelected.DT_RowId);
   }
});

$("#addHecho").click(function(){
   rowSelected = tblConocimientos.fnGetData(tblConocimientos.$('tr.bg-warning'));
   if(rowSelected == null){
      Alerta("Seleccione un registro", "warning")
   }else{
      addHecho();
   }
});

function editConocimientos(id){
   $("#carga").show();
   $.post(url_aplication+'conocimientos/get', {id_con: id}, function(response) {
      $("#id_con").val(response.id_con);
      $("#nombre_con").val(response.nombre_con);
      $("#cau_con").val(response.cau_con);
      $("#pre_con").val(response.pre_con);
      $("#myModalLabel span").html("Editar");
      $("#modalConocimientos").modal("show");
      $("#carga").fadeOut("fast");
   },'json');
}

function delConocimientos(id){
   Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
      $.post(url_aplication+'conocimientos/delete', {id_con: id}, function(response) {
         if(response.result==true){
            Alerta("Registro eliminado", "success");
            tblConocimientos.fnReloadAjax();
         }else{
            Alerta(response.msg, "danger");
         }
      },'json');
   }, function(){

   });
}

function addHecho(){
  $("#conocimiento_title").html(rowSelected[0]);
  $("#id_con_asignar").val(rowSelected.DT_RowId);
  $.post(url_aplication+'conocimientos/getHechos', {
    id_con : rowSelected.DT_RowId
  }, function(response) {
    $("#li-hecho tbody").html("");
    $.each(response.Hechos, function(index, obj) {
      t="<tr>";
      t+="<td><input type='hidden' name='hecho[]' class='key-hecho' value='"+obj.id_hec+"' />"+obj.nombre_hec+" - "+obj.desc_tani+"</td>";
      t+="<td><input type='text' name='peso[]' class='peso-hecho form-control' value='"+obj.peso+"' required/></td>";
      t+="<td><a href='javascript:void(0)' class='btn btn-danger btn-sm delPeso'><i class='fa fa-trash'></i></a></td>";
      t+="</tr>";
      $("#li-hecho tbody").append(t);
      $(".peso-hecho").numeric();
    });
    $("#modalAsignarConocimiento").modal("show");
  },'json');
}

$("#putHecho").click(function(){
  if($("#id_hec").val()==""){
    Alerta("Seleccione un hecho a asignar", "warning");
    return false;
  }

  if($(".key-hecho[value='"+$("#id_hec").val()+"']").length){
    Alerta("Ya esta asignado el hecho seleccionado", "warning");
    return false;
  }

  t="<tr>";
  t+="<td><input type='hidden' name='hecho[]' class='key-hecho' value='"+$("#id_hec").val()+"' />"+$("#id_hec option:selected").html()+"</td>";
  t+="<td><input type='text' name='peso[]' class='peso-hecho form-control' required/></td>";
  t+="<td><a href='javascript:void(0)' class='btn btn-danger btn-sm delPeso'><i class='fa fa-trash'></i></a></td>";
  t+="</tr>";
  $("#li-hecho tbody").append(t);
  $(".peso-hecho").numeric();
});

$(document).on('click', '.delPeso', function(event) {
  $(this).parent().parent().remove();
});

$("#formAsignarPeso").submit(function(event) {
  event.preventDefault();
  $.post(url_aplication+'conocimientos/setPeso', $("#formAsignarPeso").serialize(), function(response) {
    if(response.result){
      Alerta("Proceso realizado", "success");
      addHecho();
    }else{
      Alerta(response.msg, "warning");
    }
  },'json');
});