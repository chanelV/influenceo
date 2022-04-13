$(".delete-post").click(function(){
	const id_post = $(this).attr("rel");

	$.ajax({
		type: "GET",
		url: apiAddress + "/deletePost/"+id_post,
		dataType: "JSON",
		contentType:false,
		processData:false,
		async:true,
		error:function(xhr, status, error){
			alert(xhr.responseText);
		}
		
	})
	.done(function(result){
		if (result.status == 200) {
			window.location.reload();
		}
	});
    

    return false;
})