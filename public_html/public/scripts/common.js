$(".form-button").click(function(){
	const rel = $(this).attr("rel");
	const $form = $('#common-form-'+rel);
	const $require = $('#common-form-'+rel+' .require');
	const $message = $(".message-"+rel);
	const root = $form.attr("action").toLowerCase();

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
			url: apiAddress + root,
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
			const resetRoute = [roots.register, roots.login];
            if (result.status === 200) {
				if(resetRoute.includes(root)){
					$form[0].reset();
				}

				if(root == roots.login){
					window.location.replace(roots.home);
				}
            }
			$message.addClass(result.class).html(result.message);

        });
    }
	else{
		$message.addClass("alert alert-danger").html('Veuillez remplir tous les champs obligatoires');
	}

    return false;
})