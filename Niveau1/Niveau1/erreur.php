
<?php
if (!isset($_SESSION["connected_id"])){
     header("Location: notLoggedIn.php");
    }
     else {
        echo "Vous êtes connecté.e";
    }
?>