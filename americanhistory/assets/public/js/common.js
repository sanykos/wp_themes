jQuery(function($) {

    $('.weathers-menu a').on('click', function() {
        $('.weathers-menu a').removeClass('active');
        $id = $(this).data('id');
        console.log($id);
        $(this).addClass('active').closest('.weather-blocks').find('.weather-content').removeClass('active').filter('[data-id="'+$id+'"]').addClass('active');
        return false;
    })

    $(".subscribe-block form").submit(function() {
        var str = $(this).serialize();
        var text = $(this).find('input[type="text"]').val();
        console.log(text);
		$.ajax({
			type: "POST",
			url: "/wp-content/themes/americanhistory/includes/sendmail.php",
			data: {
                text: text,
                to: $(this).find('.main-btn').data('mail')
            },
			success: function(msg) {
                console.log(msg);
				// if(msg == 'OK') {
				// 	result = '<div class="ok">Сообщение отправлено</div>';
				// 	$("#fields").hide();
				// }
				// else {result = msg;}
				// $('#note').html(result);
			}
		});
		return false;
	});

});