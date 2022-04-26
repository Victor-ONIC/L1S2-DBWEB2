<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-purple.css">

    <title>Hôtel Le Clos des Lilas</title>
</head>

<body class="w3-theme-l5">

    <!-- MAIN DIV -->
    <div style="min-height:100vh; display:flex; flex-direction:column; justify-content:space-between;">

        <!-- WRAPPER DIV -->
        <div>

            <!-- HEADER -->
            <div class="w3-container w3-theme w3-padding-16 w3-center">

                <?php
                    if (isset($_GET["page"]) && ($_GET["page"] == "init.php"))
                    {
                        echo "<img src='lavande.png' alt='image lavande' class='w3-round w3-image' style='height:40%; width:35%;'>";
                    }
                ?>

                <h1 class="w3-text-white" style="font-size:50px;"><b><u>Hôtel Le Clos des Lilas</u></b></h1>

            </div>

            <!-- BODY -->
            <div class="w3-row">

                <!-- NAVBAR -->
                <div class="w3-col s2 w3-theme-l2">

                    <h3 class="w3-center"><b><u>Menu</u></b></h3>
                    <a href="index.php?page=init.php" class="w3-button" style="width:100%">Accueil</a> <br>
                    <a href="index.php?page=reservations.php" class="w3-button" style="width:100%">Réservations</a> <br>
                    <br>

                </div>

                <!-- CONTENT -->
                <div class="w3-col s10 w3-padding">
                    
                    <?php

                        if (isset($_GET["page"]))
                        {
                            include($_GET['page']);
                        }
                        else
                        {
                            header("Location: index.php?page=init.php");
                        }

                    ?>

                </div>  <!-- /CONTENT -->

            </div>  <!-- /BODY -->

        </div>  <!-- /WRAPPER -->

        <!-- FOOTER -->
        <?php
            if (isset($_GET["page"]))
            {
                $path = $_GET["page"];
                include("footer.php");
            }
            else
            {
                $path = "init.php";
                include("footer.php");
            }
        ?>

    </div>  <!-- /MAIN -->

</body>
</html>
