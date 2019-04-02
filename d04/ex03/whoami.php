<?PHP

session_start();
if ($_SESSION['loggued_on_user'])
	echo $SESSION['loggued_on_user']."\n";
else
	echo "ERROR\n";

?>
