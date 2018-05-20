<?php
function conectar(){
	$link = mysqli_connect('localhost', 'root', '', 'unaventon')
		or die("Error ".mysqli_error($link));

return $link;

}

?>