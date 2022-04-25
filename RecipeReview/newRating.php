<?php

$db = new mysqli("localhost", "gds412", "Iamgreg5", "gds412");
	
	if ($db -> connect_error) {
	   die ("Connection failed: " . $db -> connect_error);
	}

    $user = $_SESSION["uname"];
    $recipeId = $_GET["id"];
    $rating = $_POST['rating'];

    $q = "INSERT INTO rating (recipe_id, user_name, rating)
                   VALUES ('$recipeId','$user', '$rating')"; 


    $r = $db->query($q);





?>