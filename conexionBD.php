<?php

function conectar(){

$link = mysqli_connect('localhost','root', 'grupo41', 'bdunaventon') 
	or die("Error ".mysqli_error($link));

return $link;

}
?>