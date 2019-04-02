#!/usr/bin/php
<?PHP

$i = 1;
$res = NULL;
while ($i < $argc)
{
	$str = trim($argv[$i]);
	$str = preg_replace('!\s+!', ' ', $str);
	$str = explode(" ", $str);
	if (!$res)
		$res = $str;
	else
		$res = array_merge($res, $str);
	$i++;
}
sort($res);
foreach ($res as $elem)
	echo "$elem\n";

?>
