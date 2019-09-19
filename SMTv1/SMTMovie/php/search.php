<!DOCTYPE HTML>
<!DOCTYPE HTML>
<html lang ="en">

<head>
    <title>Web Programming Portfolio</title>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>

<body class="body">
    <header class ="mainHeader">
        <nav><ul>
            <li class="active"><a href="../DVDhome.html">Home</a></li>
            <li><a href="../top10.php">Top 10 Movies</a></li>
        </ul></nav>
    </header>
    <div class="mainContent">
        <div class ="content">
            <article class="topContent">
                <header>
                    <h2><a href="#" title="First post">Movie search</a></h2>
                    <?  
                        Require "connection.php";
                        Include "dbInit.php";
                    ?>
                </header>
                <footer>
                    <p>

                    </p>
                </footer>
                <content>
                    <form action="search.php" method="post">
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
                    <p class ="post-info">Movie search results : </p>
                </footer>
                <content>
                    <?php
                    /**
                    PHP version 7

                    @category SQL

                    @package Web Programming Project

                    @author Original Author <mitchel_king@icloud.com>

                    @license http://www.php.net/license PHP license 7

                    @link http:/pear.php.net
                     
                    PHP script to get all users from database, and display in html table
                     */
                    $SQLselect;
                    $title = $_POST['title'];
                    $genre = $_POST['genre'];
                    $rating = $_POST['rating'];
                    $year = $_POST['year'];
                    if (!$connection) {
                        die("Could not connect to database.");
                    }

                    if(empty($title) && empty($genre) && empty($rating) && empty($year)) {
                        echo"<p>No user data entered</p>";
                        }
                        else {
                            $SQLselect = "SELECT title, rating,
                            year, genre, ID FROM movies 
                            WHERE title LIKE '%{$title}%'
                            AND rating LIKE '%{$rating}%'
                            AND year LIKE '%{$year}%'
                            AND genre LIKE '%{$genre}%';";

                            $SQLResults = mysqli_query($connection, $SQLselect);
                            if (mysqli_num_rows($SQLResults) > 0) {
                            echo "<table>";
                            echo "<tr>";
                            echo "<th>Title</th>";
                            echo "<th>Rating</th>";
                            echo "<th>Year</th>";
                            echo "<th>Genre</th>";
                            echo "</tr>";

                            while ($row = mysqli_fetch_array($SQLResults)) {
                                $SQLupdate = "UPDATE movies SET count
                                = count+1 WHERE ID = '{$row['ID']}';";
                                mysqli_query($connection, $SQLupdate);                               
                                echo "<tr>";
                                echo "<td>", $row['title'], "</td>";
                                echo "<td>", $row['rating'], "</td>";
                                echo "<td>", $row['year'], "</td>";
                                echo "<td>", $row['genre'], "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            mysqli_free_result($SQLResults);
                            } 
                            else {
                            echo "<p>No reults in table</p>";
                            }
                        }                       
                    ?>
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
    <footer class="mainFooter">
        <p>Mitchel King 2019<a href="#" title="Test Title"></a></p>
    </footer>
</body>
