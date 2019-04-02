<?PHP
session_start();
include('header.php');
?>
<body>
<div class="topbar">
	<div class="topelem">
		<a href="index.php">
		<h1 class="logo">
			<span class="word1">The</span>
			<span class="word2">Koeli</span>
		</h1></a>
	</div>
	<div id="searchdiv">
		<form action="search.php" method="post">
			<input id="search" placeholder="Search" name="search" type="text" value="" />
		</form>
	</div>
	<div id="buttons">
	<?PHP
if (!$_SESSION['logged_on_user'])
{
	echo "<a href='create.php' class='button' id='register'>Register</a>";
	echo "<a href='login.php' class='button' id='signin'>Log in</a>";
}
else
{
	echo "<a href='delete.php' class='button' id='register'>Delete</a>";
	echo "<a href='index.php?session=logout' class='button' id='register'>Log Out</a>";
}
	?>
	</div>
	<div>
		<a href="basket.php"><img id="basket" src="https://www.designfreelogoonline.com/wp-content/uploads/2016/07/000749-online-store-logos-design-free-online-E-commerce-cart-logo-maker-01.png"></a>
	</div>
</div>
<div class="main">
<table>
  <tr>
    <th>Product</th>
    <th>Quantity</th>
    <th>Price</th>
  </tr>
<?PHP
$price = 0.00;
if (isset($_SESSION['product']))
{
	echo count($_SESSION['product']);
	for ($i = 0; $i < count($_SESSION['product']); $i++)
	{
		echo "<tr>
	    <td>".$_SESSION['product'][$i]."</td>
	    <td>".$_SESSION['productnb'][$i]."</td>
	    <td>".floatval($_SESSION['price'][$i]) * $_SESSION['productnb'][$i]."</td>
	  </tr>";
		$price = $price + floatval($_SESSION['price'][$i]) * $_SESSION['productnb'][$i];
	}
}
echo "<tr>
    <th>Total</th>
    <th></th>
    <th>".floatval($price)."$</th>
  </tr>
</table>\n";
?>
</div>
<div class="main">
<div class="right">
<p></p>
</div>
	<button class="checkout" style="vertical-align:middle"><span>Checkout </span></button>
</div>
<?PHP
include('footer.php');
?>
