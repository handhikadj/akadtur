$(window).on('load', function(){
	$("#signin_teacher_form").hide()
})

$(function() {
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
					setTimeout(function() { $.jGrowl(mess, { header: 'Sukses' }) }, 1500)
					$("#signin_teacher_form").show('slow')
					$("#email_teacher").hide('slow')
				} 
				else $.jGrowl(response[0].message, { header: 'Gagal Mendaftar' })
			},
			error: function(response){
				alert("Terjadi Error Pada Sistem")
			}
		});
	})


});