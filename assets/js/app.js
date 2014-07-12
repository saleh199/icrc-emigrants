var app = {};
app.initialize = function(){

}

function requestJSON(url, callback) {
	$.ajax({
		url: url,
		complete: function(xhr) {
			callback.call(null, xhr.responseJSON);
		}
	});
}

$(function(){
	$("#familyQueryfrm").submit(function( event ) {
		$.ajax({
			url : appConfig.familyQueryURL,
			data: $(this).serialize(),
			dataType: "JSON",
			type: 'POST',
			context: $(this),
			complete : function(xhr){
				json = xhr.responseJSON;
				if(json.errors){
					errors = json.errors;
					if(errors.document){
						$("#familyQueryfrm input[name=document_no]").tooltip({
							title : errors.document
						}).tooltip('show');
						$('#document_no_container').addClass('has-error');
					}

					if(errors.father_nationalnumber){
						$("#familyQueryfrm input[name=father_nationalnumber]").tooltip({
							title : errors.father_nationalnumber
						}).tooltip('show');
						$('#father_nationalnumber_container').addClass('has-error');
					}

					if(errors.mother_nationalnumber){
						$("#familyQueryfrm input[name=mother_nationalnumber]").tooltip({
							title : errors.mother_nationalnumber
						}).tooltip('show');
						$('#mother_nationalnumber_container').addClass('has-error');
					}
				}else if(json.status == "success"){
					location.href = appConfig.successQuery;
				}
			}
		});
		event.preventDefault();
	});

	$('#familyQuerybtn').click(function(){
		$("#familyQueryfrm .has-error").removeClass('has-error');
		$("#familyQueryfrm *").tooltip('destroy');

		if($("#familyQueryfrm input[name=document_type]").val() == 'b'){

		}
		$("#familyQueryfrm").submit();
	});


	$("#addAddressBtn").click(function(){
		if(parseInt(appConfig.form_details_id) == 0){
			alert("لا يمكن إضافة عنوان قبل حفظ معلومات العائلة الأساسية");
		}else{
			$('#modal').modal({
				backdrop : false,
				remote : appConfig.addressModalURL + '?form_details_id=' + appConfig.form_details_id
			});
		}
	});

	$( document ).delegate("#addressEditBtn", "click", function(){
		id = $(this).attr('data-addressid');
		$('#modal').modal({
			backdrop : false,
			remote : appConfig.addressModalURL + '?form_details_id=' + appConfig.form_details_id + '&form_address_id=' + id
		});
	});

	$( document ).delegate("#addressFromBtn", "click", function(){
		$('#modal #alertHolder').html(' ');
		$.ajax({
			url : $("#addressfrm").attr('action'),
			data: $("#addressfrm").serialize() + '&form_details_id='+appConfig.form_details_id,
			dataType: "JSON",
			type: 'POST',
			context: $(this),
			complete : function(xhr){
				json = xhr.responseJSON;
				if(json.errors){
					html = 		  '<div class="alert alert-danger" role="alert">';
					html = html + json.errors;
					html = html + '</div>';
					$('#modal #alertHolder').html(html);
				}else if(json.result == "success"){
					$("#addresseslist").load(appConfig.addressesListURL + '?form_details_id=' + appConfig.form_details_id);
					$('#modal').modal('hide');
				}
			}
		});

		return false;
	});

	$('#formSubmitbtn').click(function(){
		$.ajax({
			url : $("#familyfrm").attr("action"),
			data: $("#familyfrm").serialize(),
			dataType: "JSON",
			type: 'POST',
			context: $(this),
			complete : function(xhr){
				json = xhr.responseJSON;
				if(json.success){
					html = 		  '<div class="alert alert-success" role="alert">';
					html = html + 'تمت حفظ الاستمارة بنجاح';
					html = html + '</div>';
					$('#alertHolder').html(html);
					appConfig.form_details_id = parseInt(json.id);
					//$('#formSubmitbtn').attr('disabled', 'disabled');
					//$('#familyfrm input[name="tmp_ref"]').attr('disabled', 'disabled');
					$("#familyfrm").attr("action", appConfig.updateFormURL);
					$("#familyfrm").append('<input type="hidden" name="form_details_id" value="'+appConfig.form_details_id+'" >');
				}else{
					html = 		  '<div class="alert alert-danger" role="alert">';
					html = html + json.errors;
					html = html + '</div>';
					$('#alertHolder').html(html);
				}
			}
		});
	});



	$("#addFamilyMemberBtn").click(function(){
		if(parseInt(appConfig.form_details_id) == 0){
			alert("لا يمكن إضافة عنوان قبل حفظ معلومات العائلة الأساسية");
		}else{
			$('#modal').modal({
				backdrop : false,
				remote : appConfig.familyMembersModalURL + '?form_details_id=' + appConfig.form_details_id
			});
		}
	});

	$( document ).delegate("#familymembersEditBtn", "click", function(){
		id = $(this).attr('data-familyid');
		$('#modal').modal({
			backdrop : false,
			remote : appConfig.familyMembersModalURL + '?form_details_id=' + appConfig.form_details_id + '&form_family_id=' + id
		});
	});


	$( document ).delegate("#familymembersFormBtn", "click", function(){
		$('#modal #alertHolder').html(' ');
		$.ajax({
			url : $("#familymembersfrm").attr('action'),
			data: $("#familymembersfrm").serialize() + '&form_details_id='+appConfig.form_details_id,
			dataType: "JSON",
			type: 'POST',
			context: $(this),
			complete : function(xhr){
				json = xhr.responseJSON;
				if(json.errors){
					html = 		  '<div class="alert alert-danger" role="alert">';
					html = html + json.errors;
					html = html + '</div>';
					$('#modal #alertHolder').html(html);
				}else if(json.result == "success"){
					$("#familymemberslist").load(appConfig.familyMembersListURL + '?form_details_id=' + appConfig.form_details_id);
					$('#modal').modal('hide');
				}
			}
		});
	});

	$('#modal').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
    });
});