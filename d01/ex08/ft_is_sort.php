<?PHP

function ft_is_sort($tab)
{
	$sorted = $tab;
	sort($sorted);
	foreach ($tab as $key=>$value)
		if ($value!=$sorted[$key])
			return(false);
	return (true);
}

?>
