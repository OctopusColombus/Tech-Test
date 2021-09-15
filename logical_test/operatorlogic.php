<!DOCTYPE html>
<html>
<head>
<body>
	<div>
	<form method="POST">
		<div>
		<label>Input Bilangan 1</label>
		<input type="number" name="bilangan1">
	</div>
	<div>
		<label>Input Bilangan 2</label>
		<input type="number" name="bilangan2">
	</div>
	<div>
		<input type="submit" name="submit" value="submit">
	</div>
	</form>
</div>
<?php
function bagi($dibagi, $pembagi) {
    $x = (($dibagi < 0) ^
             ($pembagi < 0)) ? -1 : 1;
     
    // Update both divisor and
    // dividend positive
    $dibagi = abs($dibagi);
    $pembagi = abs($pembagi);
     
    // Initialize the quotient
    $y = 0;
    while ($dibagi >= $pembagi)
    {
        $dibagi -= $pembagi;
        ++$y;
    }
    //if the sign value computed earlier is -1 then negate the value of quotient
    if($x==-1) $y=-$y;
    return $y;
}
	if(isset($_POST['submit'])){

		$a=$_POST['bilangan1'];
		$b=$_POST['bilangan2'];

		echo bagi($a,$b);
	}
?>
</body>
</head>
</html>