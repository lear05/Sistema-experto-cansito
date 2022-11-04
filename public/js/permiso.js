$("#id_per").change(function(){
	$.post(url_aplication+'permiso/get', {
		id_per: $(this).val()
	}, function(response) {
		var li = "";
		$.each(response, function(index, pad) {
			if(pad.padre.toString()=="true"){
				li +=  "<ul class='col-sm-3' style='list-style: none;'>";
				li += "<li><label style='font-weight: normal;' class=''><input type='checkbox' class='check-option' value='"+pad.id+"' "+pad.checked+"/> "+pad.modulo+"</label></li><ul style='list-style: none;'>";
				$.each(response, function(index, mod_hijo) {
					if(pad.id.toString() == mod_hijo.padre.toString()){
						console.log(pad.id +" - "+ mod_hijo.padre);
						li += "<li class=''><label style='font-weight: normal;'><input type='checkbox' class='check-option' value='"+mod_hijo.id+"' "+mod_hijo.checked+"/> "+mod_hijo.modulo+"</label></li>";
					}
				});

				li += "</ul></ul>";
			}
		});

		$("#container-permitido").html(li);
	},'json');
});

$("#id_per").trigger('change');

$(document).on('click', '.check-option', function(event) {
	key_mod = $(this).val();
	$.post(url_aplication+'permiso/process', {
		id_per : $("#id_per").val(),
		id_mod : key_mod
	}, function(response) {

	},'json');
});