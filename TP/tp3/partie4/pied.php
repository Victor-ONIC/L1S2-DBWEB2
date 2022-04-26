
<div class="w3-container w3-theme w3-center">
    <?php
        echo "<p>Dernière date de modification: " . date ("F d Y H:i:s.", filemtime("$path")) . "</p>";
    ?>
</div>
