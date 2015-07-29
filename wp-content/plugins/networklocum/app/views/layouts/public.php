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

<<<<<<< HEAD
if(	$mylayout == 'newempty')

	include('newemptypage-layout.php');
=======
if(	$mylayout == 'blankempty')
	include('blankemptypage-layout.php');



>>>>>>> 92707f9c64f816df9e756ca899b018a0eb61e22a

else
	include('client-layout.php');
?>
