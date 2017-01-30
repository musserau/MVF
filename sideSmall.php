
<!-- Left Navigation on SMALL screens (mmenu) -->
<nav id="menu-left" class="padd-menu">
    <ul>
        <li>
            <a href="#">Mon compte</a>
            <ul>
                <li><a href="./parametre.php">Paramètres</a></li>
                <li><a href="#">Favoris</a></li>
                <li><a href="#">Tendances</a></li>
            </ul>
        </li>
        <li>
            <a href="index.php">Vente</a>
            <ul>
                <li><a href="#">En cours</a></li>
                <li><a href="#">Début aujourd'hui</a></li>
                <li><a href="#">Début demain</a></li>
            </ul>
        </li>


        <li>
            <a href="horizontal-submenus.html">Catégories</a>
            <ul>
            <?php

            $dbh = getConnection();
            $stmt = $dbh->prepare("SELECT distinct(nom),id FROM categorie order by nom asc");
            if ($stmt->execute())
            {
                $count = $stmt->rowCount();

                $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row)
                {
                    $id = $row["id"];
                    $categorie = $row["nom"];
                    echo "<li><a href='./categorie.php?cat=".$id."'>".$categorie."</a></li>";
                }
            }

            $dbh = null;
            ?>
            </ul>




        </li>
        <li>
            <a href="#">Configuration</a>
            <ul>
                <li><a href="./favoris.php">Favoris</a></li>
                <li><a href="./notification.php">Notifications</a></li>
            </ul>
        </li>
    </ul>
</nav>
<!-- // Left Navigation on SMALL screens (mmenu) -->
