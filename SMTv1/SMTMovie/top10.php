<!DOCTYPE HTML>
<!DOCTYPE HTML>
<html lang ="en">

<?
	Include"php/header.php";
?>
<body class="body">
	<header class ="mainHeader">
		<nav><ul>
			<li><a href="DVDhome.html">Home</a></li>
			<li class="active"><a href="top10.php">Top 10 Movies</a></li>
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
					<? 
						Include "php/graph.php";
					?>
				</content>
			</article>
			<article class="bottomContent">
				<header>
					<h2><a href="#" title="Second post">Search Results</a></h2>
				</header>
				<footer>
					<p class ="post-info">Top 10 searched movies</p>
				</footer>
				<content>
					<?
						echo "<table>";
                        echo "<tr>";
                        echo "<th>Colour\t</th>";
                        echo "<th>\tTitle</th>";
                        echo "<th>Count</th>";
                        echo "</tr>";

                        for($i =0; $i<10;$i++) {
                        	$subS = substr($titles[$i],0,40);
 							echo "<tr>";
                            echo "<td><img src = 'images/colours/colour{$i}.png'></td>";
                            echo "<td>$subS</td>";
                            echo "<td>$occurences[$i]</td>";
                            echo "</tr>";	
                        }
                        echo "</table>";
					 ?>
				</content>
				</content>
			</article>
		</div>
	</div>
	<aside class ="topSidebar">
		<article>
		</article>
	</aside>
	<aside class = "middleSidebar">
		<article>
		</article>
	</aside>
	<aside class = "bottomSidebar">
		<article>
		</article>
	</aside>
	<?
		Include"php/footer.php";
	?>
</body>