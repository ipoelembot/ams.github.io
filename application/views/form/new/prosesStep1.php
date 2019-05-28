<?php

 
if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	/*
	jika data mau dimasukkan ke database,
	maka perintah SQL INSERT bisa ditulis di sini
	*/
 
	$data = '';
	foreach ($_POST as $k => $v) {
		$data .= "$k : $v<br />";
	}
	echo '<b>Form berhasil disubmit. Berikut ini data anda:</b>';
	echo '<br />';
	echo $data;
}
die();
?>