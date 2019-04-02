#!/usr/bin/php
<?PHP

function comp($a, $b)
{
	$i = 0;
	while ($a[$i] == $b[$i])
	{
		if ($i == strlen($a) - 1 || $i == strlen($b) - 1)
			break;
		$i++;
	}
	if (ctype_alpha($a[$i]))
	{	
		if (ctype_alpha($b[$i]))
			return strcasecmp($a, $b);
		if (ctype_digit($b[$i]))
			return (-1);
		return (-1);
	}
	if (ctype_digit($a[$i]))
	{
		if (ctype_digit($b[$i]))
			return ($a < $b ? -1 : ($a == $b ? 0 : 1));
		if (ctype_alpha($b[$i]))
			return (1);
		return (-1);
	}
	if (ctype_alpha($b[$i]))
		return (1);
	if (ctype_digit($b[$i]))
		return (1);
	return (ord($a[$i]) - ord($b[$i]));
}

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
usort($res, "comp");
foreach ($res as $elem)
	echo "$elem\n";

?>
