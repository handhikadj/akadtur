$(function() {
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



});