<?PHP
include('header.php');
session_start();
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
		<a href="index.php?session=logout" class="button" id="signin">Log out</a>
	</div>
</div>
<h1 class="sectiontitle">CAREFUL!!! YOU ARE ABOUT TO DELETE YOUR ACCOUNT</h1>
<h2 class="sectiontitle">Please confirm your credentials to delete your account</h2>
<p style="color:red; margin-top:30px;"><?PHP if ($_GET['session'] === "error") echo "Incorrect Username or Password"?></p>
<form action="checkdel.php" method="post">
	<input class="inp" placeholder="Username" name="login" type="text" value="" />
	<br /><br />
	<input class="inp" placeholder="Password" name="passwd" type="password" value=""/>
	<br /><br />
	<div class="hidden medium">
		<p></p>
	</div>
	<div style="width:100%; margin: 10px;">
	<input class="confirm" name="submit" type="submit" value="OK" />
	</div>
</form>
<?PHP
include('footer.php');
?>
