#!/usr/bin/php
<?PHP

if ($argc == 4)
{
	if (trim($argv[2]) == "+")
		echo (intval(trim($argv[1])) + intval(trim($argv[3])));
	if (trim($argv[2]) == "-")
		echo intval(trim($argv[1])) - intval(trim($argv[3]));
	if (trim($argv[2]) == "*")
		echo intval(trim($argv[1])) * intval(trim($argv[3]));
	if (trim($argv[2]) == "/")
		echo intval(trim($argv[1])) / intval(trim($argv[3]));
	if (trim($argv[2]) == "%")
		echo intval(trim($argv[1])) % intval(trim($argv[3]));
}
else
	echo "Incorrect Parameters";
echo "\n"

?>
