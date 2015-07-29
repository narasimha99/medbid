<?php
/* 
if( $mylayout == 'locum')
	include('locum-layout.php');

if(	$mylayout == 'practice')
	include('practice-layout.php');

if(	$mylayout == 'client')
	include('client-layout.php');
*/

if(	$mylayout == 'empty')
	include('emptypage-layout.php');

if(	$mylayout == 'newempty')

	include('newemptypage-layout.php');

else
	include('client-layout.php');
?>
