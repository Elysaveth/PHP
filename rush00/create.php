<?PHP
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
		<form class="hidden" action="search.php" method="post">
			<input id="search" placeholder="Search" name="search" type="text" value="" />
		</form>
	</div>
	<div id="buttons">
		<a href="login.php" class="button" id="signin">Log in</a>
	</div>
</div>
<h1 class="sectiontitle">Get money for all your online purchases!</h1>
<p style="color:red; margin-top:30px;"><?PHP switch ($_GET['error']) {case captcha: echo "Please, complete the captcha"; break; case passwd: echo "Passwords doesn't match"; break; case exist: echo "That Username is already registered"; break; case fill: echo "Please, fill the form"; break;}?></p>
<form action="checkreg.php" method="post">
	<input class="inp" placeholder="Username" name="login" type="text" value="" />
	<br /><br />
	<input class="inp"placeholder="Password" name="passwd" type="password" value=""/>
	<br /><br />
	<input class="inp" placeholder="Confirm password" name="passwd2" type="password" value=""/>
	<br /><br />
	<div class="hidden medium">
		<p></p>
	</div>
	<div class="g-recaptcha" data-sitekey="6LeQLZsUAAAAAENF9Yf6JnpavxUxwTlPIDKMeRKC"></div>
	<div style="width:100%; margin: 10px;">
	<input class="confirm" name="submit" type="submit" value="OK" />
	</div>

</form>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="main.js"></script>
<?PHP
include('footer.php');
?>
