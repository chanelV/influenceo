$(".form-button").click(function(){
	
    const $require = $(".require");
	const rel = $(this).attr("rel");
    const $form = $('#common-form-'+rel);
	const $message = $(".message-"+rel);

    var nbError = 0;
    $require.each(function(){
		if($.trim($(this).val()) == ""){
			$(this).addClass("is-invalid");
			nbError++;
		}
		else{
			$(this).removeClass("is-invalid");
		}
	});

    if(nbError == 0){
        $message.removeClass("alert alert-danger").html('');
		var formData = new FormData($form.get(0));

        $.ajax({
			type: $form.attr("method").toUpperCase(),
			url:apiAddress + $form.attr("action").toLowerCase(),
			data: formData,
            dataType: "JSON",
			contentType:false,
			processData:false,
			async:true,
			error:function(xhr, status, error){
				alert(xhr.responseText);
			}
			
		})
		.done(function(result){
            if (result.status === "OK") {
				if($form.attr("action").toLowerCase() == "/login"){
					window.location.replace("/dashboard");
				}
            } else {
                $message.addClass("alert alert-danger").html(result.message);
            }
        });
    }
	else{
		$message.addClass("alert alert-danger").html('Veuillez remplir tous les champs obligatoires');
	}

    return false;
})