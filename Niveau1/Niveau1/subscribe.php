<div id="wrapper">
    <main>
        <article>
            <?php
                  ini_set('display_errors', 1);
                  ini_set('display_startup_errors', 1);
                  error_reporting(E_ALL);
                $enCoursDeTraitement = isset($_POST['follow_php']);
                $userId2 = intval($_GET['user_id']);
                if ($enCoursDeTraitement) {
                    echo "<pre>" . print_r($_POST, 1) . "</pre>";
                include "mySql.php";
                // Etape 5 : construction de la requete
                $lInstructionSql = "INSERT INTO followers (id, followed_user_id, following_user_id)"
                    . "VALUES (NULL, "
                    . "'" . $userId2 . "', "
                    . "'" . $_SESSION['connected_id']. "'); "
                    ;

                $ok = $mysqli->query($lInstructionSql);
                
                if (!$ok) {
                    echo "Votre requête n'a pas abouti : " . $mysqli->error;
                } else {
                    echo "Vous venez de follow  : " . $userId2;
                   
                }
            }
                ?>
                    <form action="wall.php?user_id=<?php echo $userId2 ?>" method="post">
                    <input type="submit" value="Follow" name="follow_php"> 
            </form>
        </article>
    </main>
</div>
</body>

</html>







