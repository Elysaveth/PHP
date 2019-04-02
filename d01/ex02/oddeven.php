#!/usr/bin/php
<?PHP

while (1)
{
	$line = readline("Enter a number: ");
	if (is_numeric($line))
	{
		if ($line % 2)
			echo "The number $line is odd\n";
		else
			echo "The number $line is even\n";
	}
	else
		echo "'$line' is not a number\n";
}

?>
