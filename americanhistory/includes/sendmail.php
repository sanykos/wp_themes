<?php
	$SITE_TITLE = 'americantravel';
	$SITE_DESCR = '';

	if ( isset($_POST) ) {
        //print_r($_POST);
        // $name = htmlspecialchars(trim($_POST['email']));
        $text = htmlspecialchars(trim($_POST['text']));
		$to = htmlspecialchars(trim($_POST['to']));

		$headers = "From: $SITE_TITLE \r\n";
		$headers .= "Reply-To: ". $to . "\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";

		$data = '<h1>'.$text."</h1>";
		$send = mail($to, '', $text, $headers);

	}
	else {
			echo '<div class="error">Ошибка, данные формы не переданы.</div>';
	}
	exit;
?>