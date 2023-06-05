<?php
include 'header.php';
?>



<div id="wrapper">

    <aside>
        <h2>Présentation</h2>
        <p>Sur cette page on peut poster un message en se faisant
            passer pour quelqu'un d'autre</p>
    </aside>
    <main>
        <article>
            <h2>Poster un message</h2>
            <form action="formpost.php" method="post">

                <dl>

                    <dt><label for="message">Message</label></dt>
                    <dd><textarea name="content"></textarea></dd>

                </dl>
                <?php
                /**
                 * BD
                 */
                include "mySql.php";

                $enCoursDeTraitement = isset($_POST['content']);
                if ($enCoursDeTraitement) {
                    echo "<pre>" . print_r($_POST, 1) . "</pre>";
                    $new_posts = $_POST['content'];
                    
                }


                //Etape 5 : construction de la requete
                $lInstructionSql = "INSERT INTO users (id, user_id,content,created)"
                    . "VALUES (NULL, "
                    . "'" . $_SESSION['connected_id'] . "', "
                    . "'" . $new_posts . "', "
                    . "NOW()"
                    . ");";

                $ok = $mysqli->query($lInstructionSql);
                if (!$ok) {
                    echo "L'inscription a échouée : " . $mysqli->error;
                } else {
                    echo "Votre inscription est un succès : " . $new_alias;
                    echo " <a href='login.php'>Connectez-vous.</a>";
                }
                /**
                 * Récupération de la liste des auteurs
                 */
                $listAuteurs = [];
                $laQuestionEnSql = "SELECT * FROM users";
                $lesInformations = $mysqli->query($laQuestionEnSql);
                while ($user = $lesInformations->fetch_assoc()) {
                    $listAuteurs[$user['id']] = $user['alias'];
                }
                ?>
                <input type='submit'>
            </form>
        </article>
    </main>
</div>
</body>

</html>