<?PHP

function ft_split($str)
{
	$str = preg_replace('!\s+!', ' ', $str);
	$array = explode(" ", $str);
	sort($array);
	return $array;
}

?>
