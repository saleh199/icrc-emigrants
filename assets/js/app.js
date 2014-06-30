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
	function errorTemplate(msg){
		return '<label class="control-label error-label">' + msg + '</label>';
	}

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
				}else{

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
});