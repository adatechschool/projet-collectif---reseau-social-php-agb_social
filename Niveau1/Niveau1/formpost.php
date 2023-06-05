<?php
include 'header.php';
?>



<div id="wrapper">

    <aside>
        <h2>Présentation</h2>
        <p>Sur cette page on peut poster un message en étant enregistré.</p>
    </aside>
    <main>
        <article>
            <h2>Poster un message</h2>
            
                <?php
                  ini_set('display_errors', 1);
                  ini_set('display_startup_errors', 1);
                  error_reporting(E_ALL);
                  echo "{$_SESSION['connected_id']}";
                $enCoursDeTraitement = isset($_POST['content']);
                if ($enCoursDeTraitement) {
                    echo "<pre>" . print_r($_POST, 1) . "</pre>";
                    $new_post = $_POST['content'];    
                
                include "mySql.php";
                $new_post = $mysqli->real_escape_string($new_post);
                // Etape 5 : construction de la requete
                $lInstructionSql = "INSERT INTO posts (id, user_id, content, created)"
                    . "VALUES (NULL, "
                    . "'" . $_SESSION['connected_id'] . "', "
                    . "'" . $new_post . "', "
                    . "NOW());"
                    ;

                $ok = $mysqli->query($lInstructionSql);
                
                if (!$ok) {
                    echo "Votre message n'a pas pu etre envoyé : " . $mysqli->error;
                } else {
                    echo "Votre message à été envoyé : " . $new_post;
                   
                }
            }
                ?>
                    <form action="formpost.php" method="post">
                    <dl>
                        <dt><label for="message">Message</label></dt>
                        <dd><textarea name='content'></textarea></dd>
                    </dl>
                    <input type='submit'>
            </form>
        </article>
    </main>
</div>
</body>

</html>