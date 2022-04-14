$(".form-button").click(function(){
	const rel = $(this).attr("rel");
	const $form = $('#common-form-'+rel);
	const $require = $('#common-form-'+rel+' .require');
	const $message = $(".message-"+rel);
	const root = $form.attr("action").toLowerCase();
	const $password = $('#password');
	const $cpassword = $('#cpassword');

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
		if(roots.updatePassword && root == roots.updatePassword && $password.val() !== $cpassword.val()){
			if($message) {
				$message.addClass("alert alert-danger").html('La confirmation du mot de passe n\'est pas identique');
			}
		}
		else {
			if($message) {
				$message.removeClass("alert alert-danger").html('');
			}
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
				const resetRoute = [];
				if(roots.register){resetRoute.push(roots.register)}
				if(roots.login){resetRoute.push(roots.login)}
				if (result.status == 200) {
					if(resetRoute.includes(root)){
						$form[0].reset();
					}

					if(roots.login && root == roots.login){
						window.location.replace(roots.home);
					}

					if(roots.createPost && roots.comments && roots.updateInfo && roots.updateCategories && roots.updateLanguages && roots.updateSocialsNetworks && roots.updatePassword && 
						[roots.createPost, roots.comments, roots.updatePassword, roots.updateInfo, roots.updateCategories , roots.updateLanguages , roots.updateSocialsNetworks].includes(root)){
						setTimeout(() => {
							window.location.reload();
						}, 2000);
					}
				}
				if($message) {$message.addClass(result.class).html(result.message);}

			});
		}
    }
	else{
		if($message) {$message.addClass("alert alert-danger").html('Veuillez remplir tous les champs obligatoires');}
	}

    return false;
})