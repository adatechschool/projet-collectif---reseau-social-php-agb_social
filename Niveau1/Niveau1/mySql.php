<?php
  $env = parse_ini_file(".env");
  $dbpassword = $env["DB_PASSWORD"];
  $login= $env["LOGIN"];
 /**
       * Etape 1: Ouvrir une connexion avec la base de donnée.
         */
        // on va en avoir besoin pour la suite
        $mysqli = new mysqli("localhost", $login, $dbpassword, "socialnetwork");
        //verification
        if ($mysqli->connect_errno)
        {
            echo("Échec de la connexion : " . $mysqli->connect_error);
            exit();
        }
        ?>