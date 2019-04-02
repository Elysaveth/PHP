#!/usr/bin/php
<?PHP

if ($argc == 1)
	exit;
$str = preg_replace('!\t+!', ' ', trim($argv[1]));
$str = preg_replace('!\s+!', ' ', $str);
echo $str."\n";

?>
