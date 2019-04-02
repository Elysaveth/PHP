#!/usr/bin/php
<?PHP

if ($argc > 2)
{
	$i = 2;
	$str = NULL;
	while ($i < $argc)
	{
		$tmp = explode(':', $argv[$i]);
		if (strcmp($argv[1], $tmp[0]) == 0)
			$str = $tmp[1];
		$i++;
	}
	if ($str != NULL)
		echo "$str\n";
}

?>
