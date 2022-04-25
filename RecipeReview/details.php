<?php
session_start();

if(isset($_SESSION["uname"]))
	{
		echo "Welcome";	
	}
	else
	{	
		header("Location: login.php");
				
    }

    $db = new mysqli("localhost", "gds412", "Iamgreg5", "gds412");
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }

    $recipeId = $_GET["id"];

    $q1 = "SELECT user_name, ingredients, instructions, title FROM recipe WHERE recipe_id = '$recipeId'";
       
    $r1 = $db->query($q1);

    $row = $r1->fetch_assoc();

    $user = $row["user_name"];
    $ing = $row["ingredients"];
    $ins = $row["instructions"];
    $title= $row["title"];
    $db->close();

    $validate = true;
    $rating = -1;
    
    

    if (isset($_POST["submitted"]) && $_POST["submitted"]) {
        $rating = trim($_POST["rating"]);
    
        $db = new mysqli("localhost", "gds412", "Iamgreg5", "gds412");
        if ($db->connect_error) {
            die ("Connection failed: " . $db->connect_error);
        }
        

        if($rating == null || $rating < 0) {
            $validate = false;
            echo "rating";
        }
    
        if($validate == true) {
            $user = $_SESSION["uname"];
            

            $q2 = "INSERT INTO rating (recipe_id, user_name, rating)
                   VALUES ('$recipeId','$user', '$rating')";     

            if ($db->query($q2) === true) {
                 header("Location: recipelist.php");
                $db->close();
                exit();
            }else {
                echo "Error: " . $q2 . "<br>" . $db->error;
              }
    
        } else {
            echo "Email address is not available. Signup failed.";
            $db->close();
        }


    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="recipestyle.css">
<script type="text/javascript" src="details.js"></script>
</head>

<?php



?>

<body>
<header>
    <h4><a href="http://www2.cs.uregina.ca/~gds412/as1/login.php" style="color: #C4C4C4;"><?php echo $_SESSION["uname"]  ?></a></h4>
    <h1>
    <?php echo $title ?>
    </h1>


<h2><a href="http://www2.cs.uregina.ca/~gds412/as1/recipelist.php" style="color: black; padding: 5px;">Browse other recipes</a></h2>
</header>

<section>
<article>
    <h2><?php echo $title ?></h2>
    <h3><?php echo $user ?></h3>
    <h3>Current Rating: </h3>
    <h5><button type="button" class="button button2 button3" id="plus" style="float: left;">+</button>
        <button type="button" class="button button2 button3" id="minus" style="float: left;">-</button>Rate this meal:</h5>

    <form action="details.php" method="post">
    <input type="hidden" name="submitted" value="1">
    <input type="number" id="rating" name = "rating" value="0" max="5" min="0">
    <button type="submit" class=" button2" >Rate</button>
    </form>

    <h3>Ingredients</h3>
   <p> <?php echo $ins ?></p>
</ul>

<h3>Instructions</h3>

<p><?php echo $ins ?></p>
</article>

</section>

<footer>
<p>&copy; 2021 Greg Sveinbjornson</p>
</footer>
<script type="text/javascript" src="details-r.js"></script>
</body>
</html>