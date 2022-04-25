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

$validate = true;
$title = "";
$ing = "";
$ins = "";

if (isset($_POST["submitted"]) && $_POST["submitted"]) {
    $title = trim($_POST["title"]);
    $ing = trim($_POST["ing"]);
    $ins = trim($_POST["ins"]);

    $db = new mysqli("localhost", "gds412", "Iamgreg5", "gds412");
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }
    
    if($title == null || $title == "" || $title > 40) {
        $validate = false;
        echo "title";
    }

    if($ing == null || $ing == ""|| $ing > 400) {
        $validate = false;
        echo "username";
    }
          
    if($ins == null || $ins == ""|| $ins > 400) {
        $validate = false;
        echo "username";
    }
          
    if($validate == true) {
        $user = $_SESSION["uname"];

        $q2 = "INSERT INTO recipe (user_name, title, ingredients, instructions)
               VALUES ('$user', '$title', '$ing', '$ins')";
        
        if ($db->query($q2) === true) {
            header("Location: recipelist.php");
            $db->close();
            exit();
        }else {
            echo "Error: " . $q2 . "<br>" . $db->error;
        }

    } else {
        echo "Invalid input";
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Recipe</title>
    <link rel="stylesheet" href="recipestyle.css">
    <script type="text/javascript" src="post.js"></script>
</head>
<body>
<header>
    <h4><a href="http://www2.cs.uregina.ca/~gds412/as1/login.php" style="color: #C4C4C4;"> <?php echo $_SESSION["uname"]  ?> </a></h4>
    <h1>
    Post Recipe
    </h1>


<h2><a href="http://www2.cs.uregina.ca/~gds412/as1/recipelist.php" style="color: black; padding: 5px;"  >Browse other recipes</a></h2>
</header>

<section>
<article>
    <form id="p" action="post.php" method="post">
    <input type="hidden" name="submitted" value="1">

        <label for="title" id="msg_title"></label><br>
        <label for="title">Title:</label><br>
        <textarea id="title" name="title" onkeyup="charcount1(this.value)"></textarea><br>
        <span id=charcount1></span><br>

        <label for="ing" id="msg_ing"></label><br>
        <label for="ing">Ingredients:</label><br>
        <textarea id="ing" name="ing" onkeyup="charcount2(this.value)"></textarea><br>
        <span id=charcount2></span><br>

        <label for="ins" id="msg_ins"></label><br>
        <label for="ins">Instructions:</label><br>
        <textarea id="ins" name="ins" onkeyup="charcount3(this.value)"></textarea><br>
        <span id=charcount3></span>
        <br><br>
        
        <button type="submit" class="button button2" >Post</button>
    </form>
</article>

</section>
<footer>
    <p>&copy; 2021 Greg Sveinbjornson</p>
    </footer>
    <script type="text/javascript" src="post-r.js"></script>
</body>
</html>