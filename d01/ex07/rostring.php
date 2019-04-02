#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$str = preg_replace('!\s+!', ' ', $argv[1]);
	$str = trim($str);
	$str = explode(" ", $str);
	$tmp = array_splice($str, 0, 1);
	array_splice($str, count($str), 0, $tmp);
	$i = 0;
	while ($i < count($str) - 1)
	{
		echo "$str[$i] ";
		$i++;
	}
	echo "$str[$i]\n";
}
?>
