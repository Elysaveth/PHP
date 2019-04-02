#!/usr/bin/php
<?PHP

if ($argc == 2)
{
	$str = trim($argv[1]);
	$str = preg_replace('!\s+!', '', $str);
	if (count($str = explode('+', $str)) == 2 && ctype_digit($str[0]) && ctype_digit($str[1]))
		echo (intval($str[0]) + intval($str[1]));
	else if (count($str = explode('-', $str[0])) == 2 && ctype_digit($str[0]) && ctype_digit($str[1]))
		echo (intval($str[0]) - intval($str[1]));
	else if (count($str = explode('*', $str[0])) == 2 && ctype_digit($str[0]) && ctype_digit($str[1]))
		echo (intval($str[0]) * intval($str[1]));
	else if (count($str = explode('/', $str[0])) == 2 && ctype_digit($str[0]) && ctype_digit($str[1]))
		echo (intval($str[0]) / intval($str[1]));
	else if (count($str = explode('%', $str[0])) == 2 && ctype_digit($str[0]) && ctype_digit($str[1]))
		echo (intval($str[0]) % intval($str[1]));
	else
		echo "Syntax Error";
}
else
	echo "Incorrect Parameters";
echo "\n"

?>
