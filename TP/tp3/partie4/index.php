<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-purple.css">

    <title>TP3</title>
</head>
<body>

    <?php

        include("entete.php");
        include("menu.php");

        if (isset($_GET['page'])) {
            include($_GET['page']);
            $path = $_GET['page'];
            include('pied.php');
        }
        else {
            include('page_intro.php');
            $path = 'page_intro.php';
            include('pied.php');
        }
        
    ?>
    
</body>
</html>
