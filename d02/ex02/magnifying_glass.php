#!/usr/bin/php
<?PHP
@ob_end_clean();
if ($argc < 2 || !file_exists($argv[1]))
	exit();
$fd = fopen($argv[1], 'r');

?>
