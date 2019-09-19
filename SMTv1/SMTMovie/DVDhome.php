<!DOCTYPE HTML>
<html lang ="en">

<?
	Include "php/header.php";
?>
<body class="body">
	<header class ="mainHeader">
		<nav><ul>
			<li class="active"><a href="DVDhome.html">Home</a></li>
			<li><a href="top10.php">Top 10 Movies</a></li>
		</ul></nav>
	</header>
	<div class="mainContent">
		<div class ="content">
			<article class="topContent">
				<header>
					<h2><a href="#" title="First post">Movie search</a></h2>
					<?	
						Require "php/connection.php";
						Include "php/dbInit.php";
					?>
				</header>
				<footer>
					<p>

					</p>
				</footer>
				<content>
					<form action="php/search.php" method="post">
						<p>
							Title : <input type="text" name="title">
						</p>
						<p>
							Genre : <input type="text" name="genre">
						</p>
						<p>
							Rating : <input type="text" name="rating">
						</p>
						<p>
							Year : <input type="text" name="year">
						</p>
						<p><input type="submit" value="Search"></p>
					</form>
				</content>
			</article>
			<article class="bottomContent">
				<header>
					<h2><a href="#" title="Second post">Search Results</a></h2>
				</header>
				<footer>
					<p class ="post-info">All current Users</p>
				</footer>
				<content>
<!--  					<?
						Include "php/search.php";
					?> -->
				</content>
				</content>
			</article>
		</div>
	</div>
	<aside class ="topSidebar">
		<article>
			<h2>Data</h2>
			<p>Data</p>
		</article>
	</aside>
	<aside class = "middleSidebar">
		<article>
			<h2>Data</h2>
			<p>Data</p>
		</article>
	</aside>
	<aside class = "bottomSidebar">
		<article>
			<h2>Data</h2>
			<p>Data</p>
		</article>
	</aside>
	<?
		Include"php/footer.php";
	?>
</body>