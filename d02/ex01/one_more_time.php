#!/usr/bin/php
<?PHP

if ($argc != 2)
	exit;
$str = explode(' ', $argv[1]);
$str[4] = explode(':', $str[4]);
if (count($str) != 5 || count($str[4]) != 3)
{
	echo "Wrong Format\n";
	exit;
}
$dayofweek = array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
$month = array("janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
if (array_search($str[0], $dayofweek) === FALSE || array_search($str[2], $month) === FALSE || ctype_digit($str[1]) === FALSE || ctype_digit($str[3]) === FALSE || ctype_digit($str[4][0]) === FALSE || ctype_digit($str[4][1]) === FALSE || ctype_digit($str[4][2]) === FALSE || intval($str[1]) > 31 || intval($str[1]) < 1 || intval($str[4][0]) < 0 || intval($str[4][0]) > 23 || intval($str[4][1]) < 0 || intval($str[4][1]) > 59 || intval($str[4][0]) < 0 || intval($str[4][2]) > 59 || strlen($str[1]) > 2 || strlen($str[4][0]) != 2 || strlen($str[4][1]) != 2 || strlen($str[4][2]) != 2 || intval($str[3]) < 1970)
{
	echo "Wrong Format\n";
	exit;
}
$str[2] = array_search($str[2], $month);
if ($str[2] > 11)
	$str[2] = $str[2] - 12;
$days = array(0,31,59,90,120,151,181,212,243,273,304,334);
$time = (intdiv((intval($str[3]) - 1968), 4)) + $days[intval($str[2])] + (intval($str[1]) - 1) + ($str[3] - 1970) * 365;
$time = ($time * 24 * 60 * 60) + (($str[4][0] - 1) * 60 * 60) + ($str[4][1] * 60) + $str[4][2];
print_r($str);
echo $time."\n";
?>
