<div class="col-sm-3 hidden-xs" role="navigation">

    <!--<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">-->
    <div class="panel panel-default">
        <div class="panel-heading collapsed" role="tab" data-toggle="collapse"  data-target="#collapseAccount"  aria-expanded="true" aria-controls="collapseAccount" id="headingAccount">
            <h4 class="panel-title ">
                <span>Mon compte</span>
            </h4>
        </div>
        <div id="collapseAccount" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAccount">
            <div class="panel-body">
                <ul class="sub-menu-left">
                    <li class="selected"><a href="#">Mon compte</a></li>
                    <li><a href="#">Favoris</a></li>
                    <li><a href="#">Tendance</a></li>
                    <li><a href="./deconnexion.php" id="deconnexion">Déconnexion</a></li>


                </ul>

            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading collapsed" role="tab" data-toggle="collapse"  data-target="#collapseSales"  aria-expanded="true" aria-controls="collapseSales" id="headingSales">
            <h4 class="panel-title">
                <span>Vente</span>

            </h4>
        </div>
        <div id="collapseSales" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSales">
            <div class="panel-body">
                <ul class="sub-menu-left">
                    <li class="selected"><a href="#">En Cours</a></li>
                    <li><a href="#">Début Aujourd'hui</a></li>
                    <li><a href="#">Début demain</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading collapsed" role="tab" data-toggle="collapse"  data-target="#collapseCategory"  aria-expanded="true" aria-controls="collapseCategory" id="headingCategory">
            <h4 class="panel-title">
                <span>Catégories</span>
            </h4>
        </div>
        <div id="collapseCategory" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCategory">
            <div class="panel-body">
                <ul class="sub-menu-left">
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
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading collapsed in" role="tab" data-toggle="collapse"  data-target="#collapseAccountConf"  aria-expanded="true" aria-controls="collapseAccountConf" id="headingAccountConf">
            <h4 class="panel-title ">
                <span>Configuration</span>
            </h4>
        </div>
        <div id="collapseAccountConf" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingAccountConf">
            <div class="panel-body">
                <ul class="sub-menu-left">
                    <li><a href="./favoris.php">Favoris</a></li>
                    <li><a href="./notification.php ">Notifications</a></li>
                </ul>

            </div>
        </div>
    </div>
    <!--	</div>-->
</div>