
            <?php
                  ini_set('display_errors', 1);
                  ini_set('display_startup_errors', 1);
                  error_reporting(E_ALL);
                $enCoursDeTraitement = isset($_POST['like_php']);
                $userId2 = intval($_GET['user_id']);
                if ($enCoursDeTraitement) {
                include "mySql.php";
                $instructionSqlPosts = "SELECT posts.id FROM posts JOIN likes ON posts.id = likes.post_id;";
                $PostsInformations = $mysqli->query($instructionSqlPosts);
                if (! $PostsInformations){
                    echo "La requête n'a pas fonctionné";
                } else {
                    $post = $PostsInformations->fetch_assoc();
                    $postId=$post['id'];
                }
                // Etape 5 : construction de la requete
                $lInstructionSql = "INSERT INTO likes (id, user_id, post_id)"
                    . "VALUES (NULL, "
                    . "'" . $_SESSION['connected_id'] . "', "
                    . "'" . intval($postId) . "'); "
                    ;

                $ok = $mysqli->query($lInstructionSql);
                
                if (!$ok) {
                    echo "Votre requête n'a pas abouti : " . $mysqli->error;
                } else {
                    echo "Vous venez de like le post de  : " . $userId2;
                   
                }
            }
                ?>
                    <form action="wall.php?user_id=<?php echo $userId2 ?>" method="post">
                    <input type="submit" value="Like" name="like_php"> 
            </form>


</body>

</html>







