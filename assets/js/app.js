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
		$("#familyQueryfrm").submit();
	});

	$('#formSubmitbtn').click(function(){
		$.ajax({
			url : appConfig.formAction,
			data: $("#mainDetails #familyfrm").serialize(),
			dataType: "JSON",
			type: 'POST',
			context: $(this),
			complete : function(xhr){
				json = xhr.responseJSON;
				if(json.success){
					html = 		  '<div class="alert alert-success" role="alert">';
					html = html + 'تمت إضافة الاستمارة بنجاح';
					html = html + '</div>';
					$('#alertHolder').html(html);
					appConfig.form_details_id = parseInt(json.id);
					$('#formSubmitbtn').attr('disabled', 'disabled');
				}else{
					html = 		  '<div class="alert alert-danger" role="alert">';
					html = html + json.errors;
					html = html + '</div>';
					$('#alertHolder').html(html);
				}
			}
		});
	});


	$('#insertAddressbtn').click(function(){
		$('#addressModel #alertHolder').html(' ');
		$.ajax({
			url : appConfig.insertAddressURL,
			data: $("#addressModel input, #addressModel textarea, #addressModel select").serialize() + '&form_details_id='+appConfig.form_details_id,
			dataType: "JSON",
			type: 'POST',
			context: $(this),
			complete : function(xhr){
				json = xhr.responseJSON;
				if(json.errors){
					html = 		  '<div class="alert alert-danger" role="alert">';
					html = html + json.errors;
					html = html + '</div>';
					$('#addressModel #alertHolder').html(html);
				}else if(json.result == "success"){
					$('#addressTable tr').removeClass('success');
					html = '<tr class="success">';
                  	html = html + '<th></th>';
                  	html = html + '<td>'+$("#addressModel option[value=" + $("#addressModel #city_id").val() + "]").text()+'</td>';
                  	html = html + '<td>'+$("#addressModel #zone").val()+'</td>';
                  	html = html + '<td>'+$("#addressModel #address").val()+'</td>';
                  	html = html + '<td></td>';
                	html = html + '</tr>';
                	$('#addressTable').append(html);
					$('#addressModel').modal('hide');
				}
			}
		});
	});


	$('#insertFamilybtn').click(function(){
		$('#familyModal #alertHolder').html(' ');
		$.ajax({
			url : appConfig.insertFamilyURL,
			data: $("#familyModal input, #familyModal textarea, #familyModal select").serialize() + '&form_details_id='+appConfig.form_details_id,
			dataType: "JSON",
			type: 'POST',
			context: $(this),
			complete : function(xhr){
				json = xhr.responseJSON;
				if(json.errors){
					html = 		  '<div class="alert alert-danger" role="alert">';
					html = html + json.errors;
					html = html + '</div>';
					$('#familyModal #alertHolder').html(html);
				}else if(json.result == "success"){
					html = '<tr>';
                  	html = html + '<th>#</th>';
                  	html = html + '<td>'+$("#familyModal #firstname").val()+'</td>';
                  	html = html + '<td>'+$("#familyModal #mothername").val()+'</td>';
                  	html = html + '<td>'+$("#familyModal #national_number").val()+'</td>';
                  	html = html + '<td>'+$("#familyModal #birthdate").val()+'</td>';
                  	html = html + '<td>'+$("#familyModal #gender option[value=" + $("#familyModal #gender").val() + "]").text()+'</td>';
                  	html = html + '<td>'+$("#familyModal #level_in_family option[value=" + $("#familyModal #level_in_family").val() + "]").text()+'</td>';
                  	html = html + '<td>'+$("#familyModal #situation_in_family option[value=" + $("#familyModal #situation_in_family").val() + "]").text()+'</td>';
                  	html = html + '<td>'+$("#familyModal #with_family option[value=" + $("#familyModal #with_family").val() + "]").text()+'</td>';
                  	html = html + '<td>'+$("#familyModal #study_status option[value=" + $("#familyModal #study_status").val() + "]").text()+'</td>';
                  	html = html + '<td>'+$("#familyModal #health_status option[value=" + $("#familyModal #health_status").val() + "]").text()+'</td>';
                	html = html + '</tr>';
                	$('#familyMemeberstbl').append(html);
					$('#familyModal').modal('hide');
				}
			}
		});
	});
});