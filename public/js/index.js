var seleccionado, key_cat, num_paginate, key, html, img_logo, name_product, h_contend;

h_contend = $(".content-wrapper").height();
h_contend += h_contend*1.1;

$("#put-productos").css({
	"height" : h_contend+"px",
	"overflow-y" : "scroll",
	"position" : "relative"
});

$("#id_cat").select2();

$("#id_cat").change(function(){
	key_cat = $(this).val();
	num_paginate = $("#paginate .active").html();
	$.post(url_aplication+'producto/list_cat', {
		id_cat : key_cat,
		pagine :  num_paginate
	}, function(response) {
		$("#carga").show();
		$("#list-products").html("");
		$.each(response, function(index, obj) {
			if($(".key-producto-add[value='"+obj.id_pro+"']").length){
				seleccionado = true;
				style_icon = "display:block";
			}else{
				seleccionado = false;
				style_icon = "display:none";
			}

			t="<a href='javascript:void(0)' class='col-sm-3 link-box' placement='top'><div class='box-producto effect' id='box-producto"+obj.id_pro+"' seleccionado='"+seleccionado+"'><center><img src='"+obj.img_pro+"' class='img-responsive'/><button class='btn btn-success btn-flat add-producto' key-obj='"+obj.id_pro+"' product='"+obj.name_pro+" | "+obj.name_cat+"' img='"+obj.img_pro+"' style='display:none'><i class='fa fa-cart-plus'></i> Agregar</button><i class='fa fa-cart-arrow-down icon-added' style='"+style_icon+"'></i></center><div class='descripcion-pro'><h4>"+obj.name_pro+" | "+obj.name_cat+"</h4><p>"+obj.desc_pro+"</p><div class='tri'></div></div></div></a>";
			$("#list-products").append(t);
		});
		$("#carga").fadeOut("fast");
		/*$('[data-toggle="popover"]').popover({
			placement:'bottom'
		});*/
	},'json');
});

$("#id_cat").trigger('change');

$(document).on("mouseover", ".box-producto", function(){
	if($(this).attr("seleccionado")=="false"){
		$(this).find("button").show();
	}

	$(this).find(".descripcion-pro").show();
});
$(document).on("mouseout", ".box-producto", function(){
	if($(this).attr("seleccionado")=="false"){
		$(this).find("button").hide();
	}

	$(this).find(".descripcion-pro").hide();
});

$(document).on('click', '.add-producto', function(event) {
	key = $(this).attr("key-obj");
	$("#box-producto"+key).find(".icon-added").fadeIn("fast");
	$(this).fadeOut("fast");
	$(this).parent().parent().attr("seleccionado", "true");
	img_logo = $(this).attr("img");
	name_product = $(this).attr("product");

	html = '<div class="row"><div class="col-sm-5 container-img-action sp"><img src="'+img_logo+'" class="img-responsive"></div><div class="col-sm-7 container-action sp"><div class="put-producto"><input type="hidden" class="key-producto-add" name="key-pro[]" value="'+key+'"><input type="hidden" name="name-pro[]" value="'+name_product+'"><b>'+name_product+'</b><ul class="option-selected"><li><button type="button" class="btn btn-flat btn-primary btn-sm btn-action btn-increase" title="Aumentar Cantidad"><i class="fa fa-plus"></i></button></li><li><input type="text" name="cantidad[]" class="cantidad-producto" value="1" required></li><li><button type="button" class="btn btn-flat btn-info btn-sm btn-action btn-decrease" title="Disminuir Cantidad"><i class="fa fa-minus"></i></button></li> <li styke="margin-left:10px"><button type="button" class="btn btn-flat btn-danger btn-sm btn-action btn-remove-add-product" title="Quitar Producto"><i class="fa fa-trash"></i></button></li></ul></div></div></div></div>';

	$("#put-productos").append(html);

	if($("#put-productos").html()!=""){
		$("#addition-datos").slideDown();
	}

	$(".cantidad-producto").numeric();
});

$(document).on('click', '.btn-remove-add-product', function(event) {
	key_id = $(this).parent().parent().parent().parent().find(".key-producto-add").val();
	$(this).parent().parent().parent().parent().parent().remove();
	$("#box-producto"+key_id).attr("seleccionado", "false");
	$("#box-producto"+key_id).find(".icon-added").fadeOut();

	if($("#put-productos").html()==""){
		$("#addition-datos").slideUp();
	}
});

$(document).on('keydown', '.cantidad-producto', function(e) {
	if(event.shiftKey){
	    event.preventDefault();
	}

	if (event.keyCode != 46 || event.keyCode != 8){

	}else{
	    if (event.keyCode < 95) {
	        if (event.keyCode < 48 || event.keyCode > 57) {
	           	event.preventDefault();
	        }
	    } else {
	        if (event.keyCode < 96 || event.keyCode > 105) {
	            event.preventDefault();
	        }
	    }
	}
});

$(document).on('click', '.btn-increase', function(event) {
	cant = parseInt($(this).parent().parent().find(".cantidad-producto").val());
	if(isNaN(cant)){
		cant = 1;
	}else{
		cant+=1;
	}

	$(this).parent().parent().find(".cantidad-producto").val(cant);
});

$(document).on('click', '.btn-decrease', function(event) {
	cant = parseInt($(this).parent().parent().find(".cantidad-producto").val());
	if(isNaN(cant) || cant==0){
		cant = 1;
	}else{
		cant-=1;
	}

	if(cant>=1){
		$(this).parent().parent().find(".cantidad-producto").val(cant);
	}
});

$("#formCotizar").submit(function(event) {
	event.preventDefault();
	Confirmar("¿Estas seguro de realizar la cotización?", "warning", function(){
		$.post(url_aplication+'cotizacion/process', $("#formCotizar").serialize(), function(response) {
			if(response.result==true){
				Mensaje(response.msg, "success");
				$("#put-productos").html("");
				$(".box-producto").attr("seleccionado", false);
				$(".box-producto .icon-added").fadeOut();
				$("#formCotizar input").val("");
				$("#addition-datos").slideUp();
			}else{
				Mensaje(response.msg, "error");
			}
		},'json');
	}, function(){

	}, 'btn-success');
});

