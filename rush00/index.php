<?PHP
session_start();
if ($_GET['session'] === "logout")
{
	session_destroy();
	header('Location: index.php');
}
if ($_SESSION['logged_on_user'] && !$_GET['session'])
		header('Location: index.php?session='.$_SESSION['logged_on_user']);
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
	
</div>
<h2 style="text-align:center"></h2>

<div class="Pen">
<a href="add.php?product=Supreme_Pen&price=999.99">
  <img src="https://github.com/Krishna-Oli/Rush_img/blob/master/0006861-super-sharpie-red-marker.jpg?raw=true" alt="Red Pen" style="display: block;width:50%;margin:0 auto;"></a>
  <h1>Supreme Pen</h1>
  <p class="price">$999.99</p>
  <p>Supreme Pen, Nothing to say.</p>
  <p><button>Add to Cart</button></p>
</div>

<div class="Pen">
<a href="add?product=Orange_Pen&price=19.99.php">
  <img src="https://github.com/Krishna-Oli/Rush_img/blob/master/149556.jpg?raw=true" alt="Red Pen" style="display:block; width:100%; margin:0 auto;"></a>
  <h1>Orange Pen</h1>
  <p class="price">$19.99</p>
  <p>Please Pass Us. We Tried.</p>
  <p><button>Add to Cart</button></p>
</div>

<div class="Pen">
<a href="add?product=Black_Pen&price=19.99.php">
  <img src="https://github.com/Krishna-Oli/Rush_img/blob/master/marker-add-on-black-marker-1.jpg?raw=true" alt="Red Pen" style="display: block;width:50%;margin:0 auto;"></a>
  <h1>Black Pen</h1>
  <p class="price">$19.99</p>
  <p>We Tried Hard.</p>
  <p><button>Add to Cart</button></p>
</div>

<div class="Pen">
<a href="add?product=Pink_Pen&price=19.99.php">
  <img src="https://github.com/Krishna-Oli/Rush_img/blob/master/sharpie-electric-pink-ultra-fine-markers.jpg?raw=true" alt="Red Pen" style="display: block;width:50%;margin:0 auto;"></a>
  <h1>Pink Pen</h1>
  <p class="price">$19.99</p>
  <p>Really Hard.</p>
  <p><button>Add to Cart</button></p>
</div>
<?PHP
include('footer.php');
?>
