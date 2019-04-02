<?PHP

date_default_timezone_set('America/Los_Angeles');
session_start();
if (!($_SESSION['loggued_on_user']))
	echo "ERROR\n";
echo "<html><head><script language='javascript'>setTimeout(function(){window.location.reload(1);}, 2000);</script></head></html>";
$chat = unserialize(file_get_contents('../private/chat'));
foreach ($chat as $v)
	echo "[".date('H:i', $v['time'])."] <b>".$v['login']."</b>: ".$v['msg']."<br />";

?>
