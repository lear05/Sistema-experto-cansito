btnLast = "<button type='button' class='btn btn-flat btn-primary' id='BtnConsultarMascota'><i class='fa fa-eye'></i> Consulta</button> ";
//$(document).ready(function() {

	/*$(".option-hecho").click(function(){
		list_hecho = [];
		$(".option-hecho").each(function(index, el) {
			if($(this).is(":checked")){
				list_hecho.push($(this).val());
			}
		});

		$.post(url_aplication+'consulta/porcentaje', {
			hechos : list_hecho
		}, function(response) {
			$("#conocimiento").html("");
			$.each(response, function(key, obj) {
				t="<li><b>"+(key+1)+". </b>"+obj.nombre+" - "+obj.porcentaje+"%</li>";
				$("#conocimiento").append(t);
			});
		},'json');

	});*/

	$("#clearCheck").click(function(){
		$(".option-hecho").each(function(index, el) {
			if($(this).is(":checked")){
				$(this).click();
			}
		});
	});

	$("#consultar").click(function(){
		list_hecho = [];
		$(".option-hecho").each(function(index, el) {
			if($(this).is(":checked")){
				list_hecho.push($(this).val());
			}
		});

		if(list_hecho.length===0){
			Alerta("Seleccione los sintomas", "warning");
			return false;
		}

		$.post(url_aplication+'consulta/porcentaje', {
			id_tani : rowSelected[6],
			hechos : list_hecho
		}, function(response) {
			$("#resultado-lista tbody").html("");
			ban = 1;
			$.each(response, function(key, obj) {
				if(obj.porcentaje>0){
					t="<tr key-id='"+obj.id_con+"'>";
					t+="<td>"+(ban)+"</td>";
					t+="<td>"+obj.nombre+"</td>";
					t+="<td align='right'>"+obj.porcentaje+"</td>";
					t+="</tr>";
					$("#resultado-lista").append(t);
					ban++;
				}
			});
			$("#modalResultado").modal("show");
		},'json');
	});

	$("#id_tani").change(function(event) {
		$(".option-tani").hide();
		if($(this).val()!==""){
			$(".tani"+$(this).val()).show();
		}
		$("#clearCheck").trigger('click');
	});

	$("#id_tani").trigger('change');
//});

$(document).on('click', '#resultado-lista tbody tr', function(event) {
	$.post(url_aplication+'conocimientos/get', {
		id_con: $(this).attr("key-id")
	}, function(response) {
		$("#title-con").html(response.nombre_con);
		$("#text-cau").html(response.cau_con);
		$("#text-pre").html(response.pre_con);
		$("#modalConocimiento").modal("show");
	},'json');
});

$("#fecha").datetimepicker({
   format: 'YYYY-MM-DD',
   icons: {
         time: "fa fa-clock-o",
         date: "fa fa-calendar",
         up: "fa fa-chevron-up",
         down: "fa fa-chevron-down",
         previous: 'fa fa-chevron-left',
         next: 'fa fa-chevron-right',
         today: 'fa fa-screenshot',
         clear: 'fa fa-trash',
         close: 'fa fa-remove'
   }
});

$(document).on('click', '#BtnConsultarMascota', function(event) {
	rowSelected = tblMascota.fnGetData(tblMascota.$('tr.bg-warning'));
   if(rowSelected === null){
      Alerta("Seleccione un registro", "warning");
   }else{
      consultaMascota(rowSelected.DT_RowId);
   }
});

function consultaMascota(id){
	$.post(url_aplication+'consulta/getDiagnostico', {
		id_ani : id
	}, function(response) {
		$("#id_ani_diagnostico").val(id);
		$(".name_animal").html(rowSelected[0]+" - "+rowSelected[1]);

		$("#table-diagnostico tbody").html("");
		$.each(response, function(index, obj) {
			t="<tr>";
			t+="<td>"+obj.fecha+"</td>";
			t+="<td style='text-align:center'><a href='javascript:void(0)' class='btn btn-info btnDiagnosticar' key='"+obj.id_dia+"'>Diagnosticar</a></td>";
			t+="</tr>";
			$("#table-diagnostico tbody").append(t);
		});

		$("#modalDiagnostico").modal("show");
	},'json');
}

$("#formDiagnostico").submit(function(event) {
	event.preventDefault();
	$.post(url_aplication+'consulta/process', $("#formDiagnostico").serialize(), function(data) {
		if(data.result){
			Alerta("Proceso realizado", "success");
			consultaMascota(rowSelected.DT_RowId);
		}else{
			Alerta(data.msg, "warning");
		}
	},'json').fail(function(data){
		Alerta(data, "danger");
	});
});

$(document).on('click', '.btnDiagnosticar', function() {
	id_tani = rowSelected[6];
	key_dia = $(this).attr("key");
	$("#id_dia").val(key_dia);

	$.post(url_aplication+'consulta/getResultado', {
		id_dia : key_dia
	}, function(response) {
		if(response.length>0){
			$("#saveResultado").hide();
			$("#resultado-lista tbody").html("");
			$.each(response, function(key, obj) {
				if(key<3){
					t="<tr key-id='"+obj.id_con+"'>";
					t+="<td>"+(key+1)+"</td>";
					t+="<td>"+obj.nombre_con+"</td>";
					t+="<td align='right'>"+obj.por_res+"</td>";
					t+="</tr>";
					$("#resultado-lista tbody").append(t);
				}
			});

			$("#modalResultado").modal("show");
		}else{
			$(".option-tani").hide();
			$(".tani"+id_tani).show();
			$("#modalDiagnosticar").modal("show");
			$("#saveResultado").show();
		}
	},'json');

});

$("#saveResultado").click(function(){
	Confirmar("¿Estas seguro que desea guardar?. Una vez guardado no se podra realizar ningun cambio con los resultados", "warning", function(){

		array = [];

		$("#resultado-lista tbody tr").each(function(index, obj) {
			array.push({
				"id_con" : $(this).attr("key-id"),
				"por_res" : $(this).find("td:nth-child(3)").html()
			});
		});

		//console.log($("#id_dia").val());return;

      $.post(url_aplication+'consulta/setResultado', {
      	id_dia: $("#id_dia").val(),
      	resultado : array
      }, function(response) {
         if(response.result===true){
            Alerta("Datos Guardados", "success");
            $("#modalResultado").modal("hide");
            $("#modalDiagnosticar").modal("hide");
         }else{
            Alerta(response.msg, "danger");
         }
      },'json');
   }, function(){

   });
});

$("#buscar_sintoma").keyup(function(event) {
	id_tani = rowSelected[6];
	texto = $(this).val();
    texto = texto.toUpperCase();
    $(".option-tani").hide();
    $(".tani"+id_tani).show();

    $(".tani"+id_tani).each(function (index, el) {
        contenido = $.trim($(this).text());
        contenido = contenido.toUpperCase();
        index = contenido.indexOf(texto);
        if (index == -1) {
            $(this).hide();
        }
    });
});