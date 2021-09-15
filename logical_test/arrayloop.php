<?php
$aplikasi[1]='gtAkademik';
$aplikasi[2]='gtFinansi';
$aplikasi[3]='gtPerizinan';
$aplikasi[4]='eCampuz';
$aplikasi[5]='eOviz';

$arrayLength = count($aplikasi);
$i=1;
while ($i <= $arrayLength)
	{
		echo $aplikasi[$i];
		echo "<br>";
		$i++;
	}
?>