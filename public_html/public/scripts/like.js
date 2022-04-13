$(".action-like").click(function(){
	const id_mission = $(this).attr("rel");

	$.ajax({
		type: "GET",
		url: apiAddress + "/like/"+id_mission,
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
			$("#action-like-"+id_mission).html(result.message);
		}
	});
    

    return false;
})