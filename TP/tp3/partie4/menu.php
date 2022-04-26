
<div class='w3-bar w3-theme'>
<?php
    $TABPAGES = array(
        "Page Intro" => "page_intro.php",
        "Page Formulaire" => "page_formulaire.php"
    );

    foreach ($TABPAGES as $key => $value) {
        echo "\t\t<a href='index.php?page=$value' class='w3-bar-item w3-button'>$key</a>\n";
    }
?>
</div>
