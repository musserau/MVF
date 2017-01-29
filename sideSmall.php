
<!-- Left Navigation on SMALL screens (mmenu) -->
<nav id="menu-left" class="padd-menu">
    <ul>
        <li>
            <a href="#">Mon compte</a>
            <ul>
                <li><a href="#">First sub-item</a></li>
                <li><a href="#">Second sub-item</a></li>
                <li><a href="#">Third sub-item</a></li>
            </ul>
        </li>
        <li><a href="index.php">Vente</a></li>
        <li>
            <a href="horizontal-submenus.html">Catégories</a>
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
                    echo "<ul><a href='./categorie.php?cat=".$id."'>".$categorie."</a></ul>";
                }
            }

            $dbh = null;
            ?>





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
