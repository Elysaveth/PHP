#!/usr/bin/php
<?PHP

if ($argc != 2)
	exit;
$line = array();
$user = array();
$stdin = fopen('php://stdin', 'r');
fgets($stdin);
while ($stdin && !feof($stdin))
{
	$tmp = fgetcsv($stdin, 0, ";");
	if (count($tmp) == 4)
	{
		$line[] = $tmp;
		if (!array_key_exists($tmp[0], $user))
		{
			$user[$tmp[0]] = null;
			$user[$tmp[0]][0] = 0;
			$user[$tmp[0]][1] = 0;
			$user[$tmp[0]][2] = 0;
		}
	}
}
ksort($user);
if (strcmp($argv[1], "average") == 0)
{
	$total = 0;
	$count = 0;
	foreach ($line as $elem)
	{
		if (strcmp($elem[2], "moulinette") != 0 && strcmp($elem[1], ''))
		{
			$total = $total + $elem[1];
			$count++;
		}
	}
	if ($count != 0)
		echo ($total / $count)."\n";
}
else if (strcmp($argv[1], "average_user") == 0 || strcmp($argv[1], "moulinette_variance") == 0)
{
	foreach ($line as $elem)
	{
		if (strcmp($elem[2], "moulinette") && strcmp($elem[1], ''))
		{
			$user[$elem[0]][2] = $user[$elem[0]][2] + 1;
			$user[$elem[0]][1] = $user[$elem[0]][1] + $elem[1];
		}
		else if (strcmp($elem[2], "moulinette") == 0)
			$user[$elem[0]][0] = $elem[1];
	}
	if (strcmp($argv[1], "average_user") == 0)
	{
		foreach ($user as $key => $elem)
			if ($elem[2] != 0)
				echo $key.":".($elem[1] / $elem[2])."\n";
	}
	else
		foreach ($user as $key => $elem)
			if ($elem[2] != 0)
				echo $key.":".(($elem[1] / $elem[2]) - $elem[0])."\n";
}

?>
