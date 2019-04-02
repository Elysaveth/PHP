<?PHP

session_start();

if (!$_GET['product'] || !$_GET['price'])
	header('Location: index.php');
if (!isset($_SESSION['product']))
{
	$_SESSION['product'] = array();
	$_SESSION['price'] = array();
	$_SESSION['productnb'] = array();
}
$i = 0;
while ($i < count($_SESSION['product']))
{
	if ($_SESSION['product'][$i] === $product)
	{
		$_SESSION['productnb'][$i]++;
		header('Location: basket.php');
	}
	$i++;
}
$_SESSION['product'][$i] = $_GET['product'];
$_SESSION['price'][$i] = $_GET['price'];
$_SESSION['productnb'][$i] = 1;
header('Location: basket.php');
?>
