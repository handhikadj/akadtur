$(function() {
	$("html").addClass("js")

	$("#opt11").hide()
	$("#opt12").hide()
    // Side Bar Toggle
    $('.hide-sidebar').click(function() {
	  $('#sidebar').hide('fast', function() {
	  	$('#content').removeClass('span9');
	  	$('#content').addClass('span12');
	  	$('.hide-sidebar').hide();
	  	$('.show-sidebar').show();
	  });
	});

	$('.show-sidebar').click(function() {
		$('#content').removeClass('span12');
	   	$('#content').addClass('span9');
	   	$('.show-sidebar').hide();
	   	$('.hide-sidebar').show();
	  	$('#sidebar').show('fast');
	});

	$("#email_teacher").submit(function(e){
		e.preventDefault()
		var formData = $(this).serialize();
		$.ajax({
			method: "POST",
			url: "./email_teacher_token.php",
			data: formData,
			dataType: "JSON",
			success: function(response) {
				console.log(response[0].message);
				if (response[0].success == "true") {
					var mess = "Berhasil Mendaftar. Silahkan Periksa Email Anda Untuk Memasukkan Kode Aktivasi"
					$.jGrowl(mess, { header: 'Sukses', life: 5000 })

					setTimeout(() => { 
						$("#signin_teacher_form").removeClass('signin_teacher_hide').addClass("signin_teacher_show")
						$("#email_teacher").addClass("email_teacher_hide")
					}, 1000)
					
				} 
				else $.jGrowl(response[0].message, { header: 'Gagal Mendaftar' })
			},
			error: function(response){
				alert("Terjadi Error Pada Sistem")
			}
		});
	})

	$("#email_student").submit(function(e){
		e.preventDefault()
		var formData = $(this).serialize();
		$.ajax({
			method: "POST",
			url: "./email_student_token.php",
			data: formData,
			dataType: "JSON",
			success: function(response) {
				console.log(response[0].message);
				if (response[0].success == "true") {
					var mess = "Berhasil Mendaftar. Silahkan Periksa Email Anda Untuk Memasukkan Kode Aktivasi"
					$.jGrowl(mess, { header: 'Sukses', life: 5000 })
					setTimeout(() => { 
						$("#signin_student_form").removeClass('signin_student_hide').addClass("signin_student_show")
						$("#email_student").addClass("email_student_hide")
					}, 1000)
					
				} 
				else $.jGrowl(response[0].message, { header: 'Gagal Mendaftar' })
			},
			error: function(response){
				alert("Terjadi Error Pada Sistem")
			}
		});
	})

	$("#show-excel-student").click(function(){
		$("#form-excel-student").removeClass("form-excel-student-hide").addClass("form-excel-student")
		$(this).hide('slow')
		$("#hide-excel-student").show(200)
	})

	$("#hide-excel-student").click(function(){
		$("#form-excel-student").removeClass("form-excel-student").addClass("form-excel-student-hide")
		$(this).hide('slow')
		$("#show-excel-student").show(200)
	})

	$("#qtype").change(function() {	
		var x = $(this).val()
		if(x == "1") {
			$("#opt12").hide()
			$("#opt11").show()
		} else if(x == "2") {
			$("#opt11").hide()
			$("#opt12").show()
		} else {
			$("#opt11").hide()
			$("#opt12").hide()
		}
	})

	var qtype = $("#qtype").val()
	if (qtype == 1) $("#opt11").show()
	else $("#opt12").show()

	var fileInput  = $(".input-file"),  
	    button     = $(".input-file-trigger"),
	    the_return = $(".file-return");

	button.keydown(function(event){
	    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
	        fileInput.focus();  
	    }  
	}); 

	button.click(function(event){
	   fileInput.focus();
	   return false;
	});  

	fileInput.on('change', function(event){
		$("#for-loader-excel").addClass("for-loading-excel")
		
	    var get_id = $("#get-id-excel").val()
	    $("#excel-questions-form").ajaxForm({	    	
	    	data: {'hidden-excel': get_id},
	    	uploadProgress: function(event, position, total, percentComplete) {
				$("#for-loader-excel").css("width", percentComplete + "%")
			},
			success: function(response) {
				var response = JSON.parse(response)
				if (!response.success) {
					$.jGrowl(response.message, { header: 'Gagal Mengupload', life: 5000 })
				} else location.reload()
			},
			error: function(response) {
				alert("Terjadi Error Pada System")
			}
		}).submit();
	});

	$(".adminUTeacher").click(function(e){
		e.preventDefault()

		$("#hidden-updateT").val("")
		$("#emailT").val("")
		$("#nameT").val("")
		$("#usernameT").val("")
		$("#passT").val("")

		var teacherId = $(this).attr("rel")
		$.ajax({
			method: "GET",
			url: "./get_update_teacher.php?teacher_id=" + teacherId,
			dataType: "JSON",
			success: function(response) {
				$("#hidden-updateT").val(response.data.teacher_id)
				$("#emailT").val(response.data.email)
				$("#nameT").val(response.data.name)
				$("#usernameT").val(response.data.username)
			},
			error: function(response){
				alert("Terjadi Error Pada Sistem")
			}
		});
	})

	$("#form-update-teacher").on('submit', function(e){

		e.preventDefault()

		var formUpdate = $(this).serialize()
		$.ajax({
			method: "POST",
			url: "./update_teacher_process.php",
			data: formUpdate,
			dataType: "JSON",
			success: function(response) {
				if (!response.success) {
					$.jGrowl(response.message, { header: 'Terjadi Error', life: 5000 })
				} else {
					$.jGrowl(response.message, { header: 'Berhasil', life: 5000 })
					setTimeout(() => { 
						location.reload()
					}, 1500)
				}
			},
			error: function(response){
				alert("Terjadi Error Pada Sistem")
			}
		});
	})

}); // end of docs ready