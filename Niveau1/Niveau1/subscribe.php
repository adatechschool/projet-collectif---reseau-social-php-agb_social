<div id="wrapper">

    <main>
        <article>
            
            
                <?php
                  ini_set('display_errors', 1);
                  ini_set('display_startup_errors', 1);
                  error_reporting(E_ALL);
                $enCoursDeTraitement = isset($_POST['Follow']);
                $userId=$_GET['user_id'];
                if ($enCoursDeTraitement) {
                    echo "<pre>" . print_r($_POST, 1) . "</pre>";
                include "mySql.php";
                // Etape 5 : construction de la requete
                $lInstructionSql = "INSERT INTO followers (id, followed_user_id, following_user_id)"
                    . "VALUES (NULL, "
                    . "'" . $_SESSION['connected_id'] . "', "
                    . "'" . $userId . "'); "
                    ;

                $ok = $mysqli->query($lInstructionSql);
                
                if (!$ok) {
                    echo "Votre requete n'a pas abouti : " . $mysqli->error;
                } else {
                    echo "Vous venez de follow  : " . $userId;
                   
                }
            }
                ?>
                    <form action="subscribe.php" method="post">
                    <input type='submit' value="Follow"> <label for="Follow">
            </form>
        </article>
    </main>
</div>
</body>

</html>







