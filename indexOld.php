<?php

include_once("./checkCookie.php");

echo $_SESSION["user"];
print_r($_COOKIE);
print_r($_SESSION);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="./css/font-awesome/font-awesome.css" />
    <link type="text/css" rel="stylesheet" href="./css/font-awesome/build.css" />
	<link type="text/css" rel="stylesheet" href="dist/mmenu/dist/css/jquery.mmenu.all.css" />
	<link type="text/css" rel="stylesheet" href="css/styles.css" />
</head>
<body>

<div id="page">
	<!-- <div class="navbar navbar-fixed-top" role="navigation"> -->
	<div class="navbar" role="navigation">
		<!--<div class="container">-->

			<div class="navbar-header col-sm-3 col-md-3 col-lg-3">
				<a href="#" class="navbar-brand  hidden-xs brand-logo">
					<img src="img/logo-mvf.png" alt="logo-mvf" />
				</a>

				<!--Button -->
				<div id="header" class="visible-xs">
					<a class="toggle-menu" href="#menu-left"></a>
					<img src="img/logo-mvf.png" alt="logo-mvf" />
					<ul class="nav navbar-nav navbar-right sub-menu">
						<li>
							<!--<img src="css/img/toggle-menu.png" height="50" width="50"/>-->
							<a href="#">
								<img src="img/menu-alertes-small.png">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/header-account-small.png">
							</a>
						</li>
					</ul>
				</div>
				<!-- //Button -->
			</div>
	<!--
				<div class="row">
					<div class="">
						<div class="col-xs-6 col-sm-3 search-bar">
							<div class="input-group">
								<input type="text" class="form-control form-search" placeholder="Search for...">
								<span class="input-group-btn">
      								 <button class="btn btn-default btn-search" type="button"></button>
								</span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-2">
							<div class="collapse navbar-collapse" role="navigation">
								<ul class="nav navbar-nav navbar-right hidden-xs">
									<li>
										<a href="#">
											<img src="img/menu-alertes.png">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/menu-favoris-config.png">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/menu-partage.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-6 col-sm-2">
							<a href="#" class="btn btn-mvf btn-myacount-header">
								<span>Mon compte</span>
							</a>
						</div>
					</div>
				</div>
-->
			<!--<div class="row">-->
				<!-- Navigation on LARGE and MEDIUM screens -->
				<div class="col-sm-3 col-md-3 col-lg-5 search-bar">
					<div class="input-group">
						<input type="text" class="form-control form-search" placeholder="Search for...">
						<span class="input-group-btn">
      					 <button class="btn btn-default btn-search" type="button"></button>
					</span>
					</div>
				</div>

        <?php
         if($_SESSION["user"] != "unknown")
        {
                echo "
                <div class=\"col-sm-4 col-md-4 col-lg-2\" >
					<div class=\"collapse navbar-collapse\" role =\"navigation\" >
						<ul class=\"nav navbar-nav navbar-right hidden-xs\" >
							<li >
								<button class=\"btn btn-default btn-header dropdown-toggle\" type = \"button\" data-toggle = \"dropdown\" >
									<img src = \"img/menu-alertes.png\" >
								</button >
                                <ul class=\"dropdown-menu\" style = \"width: 500px\" >
                                    <li class=\"notification unread\" >
                                        <a href = \"#\" >
                                           <img  class=\"img-rounded img-notification\" src = \"./img/test.jpg\" >

                                        </a >
                                    </li >
                                    <li class=\"divider\" ></li >
                                    <li class=\"notification read\" >
                                        <a href = \"#\" > dd</a >
                                    </li >
                                </ul >


							</li >
							<li >
								<button class=\"btn btn-default btn-header dropdown-toggle\" type =\"button\" data-toggle =\"dropdown\" >
									<img src = \"img/menu-favoris-config.png\" >
								</button >
								<ul class=\"dropdown-menu\" >
									<li ><a href = \"#\" > Favoris</a ></li >
									<li ><a href = \"#\" > Notification</a ></li >
								</ul >
							</li >
							<li >
								<button class=\"btn btn-default btn-header dropdown-toggle\" type = \"button\" data-toggle = \"dropdown\" >
									<img src = \"img/menu-partage.png\" >
								</button >
								<ul class=\"dropdown-menu\" >
									<li ><a href = \"#\" > Faire une recommendation </a ></li >
									<li ><a href = \"#\" > Signaler un problème </a ></li >
								</ul >
							</li >
						</ul >
						
						

					</div >
				</div >
                <div class=\"col-xs-6 col-sm-2\">
                    <a href=\"#\" class=\"btn btn-mvf btn-myacount-header\">
                        <span>Mon compte</span>
                    </a>
                </div>";
                

        }
        else
        {


                echo"
                <div class=\"hidden-xs cols-sm-2 col-md-2 col-lg-2 myacount-header-disconnected\" >
                   <div class=\"collapse navbar-collapse\" role =\"navigation\" >
					<a href =\"#\" id =\"imgInscription\" class=\"btn btn-mvf btn-myacount-header\" >
                     <span>Inscription</span>
                    </a >
                    <a href = \"#\" id = \"imgConnection\" class=\"btn btn-mvf btn-myacount-header-connexion\" >
                     <span>Connexion</span>
                    </a >
                    </div>
				</div >";

        }
            ?>
				<!--//Navigation on LARGE and MEDIUM screens-->

			<!--</div>-->
		<!--</div>-->
	</div>

	<!--<div class="container">-->
		<!-- <div class="padd-content"></div> -->

		<div class="row">
			<!-- sidebar -->
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
			<!--	</div>-->
			</div>
			<!-- // sidebar -->

			<div class="col-sm-9 col-lg-9 inner-page ">
				<div class="row-menu-onglet hidden-xs">
					<center>
					<!--<div class="menu-onglet selected">Ventes</div>
					<div class="menu-onglet"> favoris</div>
					<div class="menu-onglet">tendance</div>-->
						<ul class="">
							<li class="li-menu-onglet selected"> > Ventes</li>
							<li class="li-menu-onglet">favoris</li>
							<li class="li-menu-onglet">tendance</li>
						</ul>
					</center>

				</div>
				<div class="row col-xs-12">
					<center>
						LES VENTES ACTUELLEMENT EN COURS
					</center>
					<br>
					<ul class="ul-menu-onglet">
						<li class="li-menu-onglet selected "> > Toutes les ventes</li>
						<li class="li-menu-onglet  ">Les  ventes privées</li>
					</ul>
						<button class="btn btn-default btn-filter hidden-xs">
                            <img src="img/Rond-Filtre.png">
                        </button>
					<br>
					<br>

				</div>

					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img  alt="rr" src="img/img.png">
							<div class="caption">
								<h3>Thumbnail label</h3>
								<p>...</p>
								<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							</div>
						</div>
					</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img  alt="rr" src="img/img.png">
							<div class="caption">
								<h3>Thumbnail label</h3>
								<p>...</p>
								<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							</div>
						</div>
					</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img  alt="rr" src="img/img.png">
							<div class="caption">
								<h3>Thumbnail label</h3>
								<p>...</p>
								<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							</div>
						</div>
					</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img  alt="rr" src="img/img.png">
							<div class="caption">
								<h3>Thumbnail label</h3>
								<p>...</p>
								<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							</div>
						</div>
					</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img  alt="rr" src="img/img.png">
							<div class="caption">
								<h3>Thumbnail label</h3>
								<p>...</p>
								<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							</div>
						</div>
					</div>

				</div>

				<div class="text-center">
					<ul class="pagination">
						<li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">&raquo;</a></li>
					</ul>
				</div>

			</div>
		</div>

		<footer>
			<p>&copy; 2016 Company, Inc.</p>
		</footer>
	</div>

	<!-- Left Navigation on SMALL screens (mmenu) -->
	<nav id="menu-left" class="padd-menu">
		<ul>
			<li>
				<a href="#">Blank link</a>
				<ul>
					<li><a href="#">First sub-item</a></li>
					<li><a href="#">Second sub-item</a></li>
					<li><a href="#">Third sub-item</a></li>
				</ul>
			</li>
			<li><a href="index.php">Fixed header</a></li>
			<li><a href="horizontal-submenus.html">Horizontal submenus</a></li>
			<li><a href="left-right-mmenu.html">Left/Right menu</a></li>
		</ul>
	</nav>
	<!-- // Left Navigation on SMALL screens (mmenu) -->


	<!-- Right Navigation on SMALL screens (mmenu) -->
	<!-- <nav id="menu-right" class="padd-menu">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Link 1</a></li>
			<li><a href="#">Link 2</a></li>
			<li><a href="#">Link 3</a></li>
		</ul>
	</nav> -->
	<!-- // Right Navigation on SMALL screens (mmenu) -->
<!--</div>-->


<!-- *
	 *
	 modal conf cat
-->

<div class="modal fade" id="confCatModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">BIENVENUE SUR MVF !</h3>
                <span class="modal-subtitle">Ne manquez plus les ventes et les promos sur les marques et produits qui vous intéressent.</span>
            </div>
            <div class="modal-body">
                <h4>Choisissez les produits qui vous intéressent pour une expérience personnalisée</h4>
                <br>
                <table class="table" border="0" align="center" style="width:90%">
                    <tbody>
                    <tr style="background-color: #fbfbfb;">
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('1')" class="img-responsive img-thumbnail img-modal-cat" id="modalImgCat" data-cat="1" src="img/Cat1.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat1"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('2')" class="img-responsive img-thumbnail img-modal-cat" id="modalImgCat" data-cat="2" src="img/Cat2.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat2"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('3')" class="img-responsive img-thumbnail img-modal-cat" id="modalImgCat" data-cat="3" src="img/Cat3.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat3"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('4')" class="img-responsive img-thumbnail img-modal-cat" id="modalImgCat" data-cat="4" src="img/Cat4.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat4"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('5')" class="img-responsive img-thumbnail img-modal-cat"  id="modalImgCat" data-cat="5" src="img/Cat5.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat5"  src="img/RondValider.png"/>
                            </div>
                        </td>
                    </tr>
                    <tr style="background-color: #fbfbfb;">
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('6')" class="img-responsive img-thumbnail img-modal-cat"  id="modalImgCat" data-cat="6" src="img/Cat6.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat6"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('7')" class="img-responsive img-thumbnail img-modal-cat"  id="modalImgCat" data-cat="7" src="img/Cat7.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat7"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('8')" class="img-responsive img-thumbnail img-modal-cat" id="modalImgCat" data-cat="8"  src="img/Cat8.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat8"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('9')" class="img-responsive img-thumbnail img-modal-cat" id="modalImgCat" data-cat="9" src="img/Cat9.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat9"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('10')" class="img-responsive img-thumbnail img-modal-cat"  id="modalImgCat" data-cat="10" src="img/Cat10.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat10"  src="img/RondValider.png"/>
                            </div>
                        </td>
                    </tr>
                    <tr style="background-color: #fbfbfb;">
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('11')" class="img-responsive img-thumbnail img-modal-cat"  id="modalImgCat" data-cat="11" src="img/Cat11.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat11"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('12')" class="img-responsive img-thumbnail img-modal-cat"  id="modalImgCat" data-cat="12" src="img/Cat12.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat12"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('13')" class="img-responsive img-thumbnail img-modal-cat" id="modalImgCat" data-cat="13" src="img/Cat13.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat13"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('14')" class="img-responsive img-thumbnail img-modal-cat"  id="modalImgCat" data-cat="14" src="img/Cat14.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat14"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectCatFav('15')" class="img-responsive img-thumbnail img-modal-cat"  id="modalImgCat" data-cat="15" src="img/Cat15.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-selected" hidden id="imgCheckedCat15"  src="img/RondValider.png"/>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <img src="img/Validation.png" id="img-cat-disabled" class="img-cat-disabled">
                <img src="img/Valider.png" hidden  id="img-cat-enabled" class="img-cat-enabled">
            </div>
        </div>

    </div>
</div>



<!-- *
	 *
	 modal conf brand
-->

<div class="modal fade" id="confBrandModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">BIENVENUE SUR MVF !</h3>
                <span class="modal-subtitle">Ne manquez plus les ventes et les promos sur les marques et produits qui vous intéressent.</span>
            </div>
            <div class="modal-body">
                <h4>Choisissez désormais les marques qui vous intéressent</h4>
                <br>
                <table class="table" border="0" align="center" style="width:90%">
                    <tbody>
                    <tr style="background-color: #fbfbfb;">
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectBrandFav('1')" class="img-responsive img-thumbnail img-modal-brand" id="modalImgBrand" data-brand="1" src="img/Cat1.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-brand-selected" hidden id="imgCheckedBrand1"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectBrandFav('2')" class="img-responsive img-thumbnail img-modal-brand" id="modalImgBrand" data-brand="2" src="img/Cat2.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-brand-selected" hidden id="imgCheckedBrand2"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectBrandFav('3')" class="img-responsive img-thumbnail img-modal-brand" id="modalImgBrand" data-brand="3" src="img/Cat3.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-brand-selected" hidden id="imgCheckedBrand3"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectBrandFav('4')" class="img-responsive img-thumbnail img-modal-brand" id="modalImgBrand" data-brand="4" src="img/Cat4.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-brand-selected" hidden id="imgCheckedBrand4"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectBrandFav('5')" class="img-responsive img-thumbnail img-modal-brand"  id="modalImgBrand" data-brand="5" src="img/Cat5.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-brand-selected" hidden id="imgCheckedBrand5"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectBrandFav('5')" class="img-responsive img-thumbnail img-modal-brand"  id="modalImgBrand" data-brand="5" src="img/Cat5.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-brand-selected" hidden id="imgCheckedBrand5"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectBrandFav('5')" class="img-responsive img-thumbnail img-modal-brand"  id="modalImgBrand" data-brand="5" src="img/Cat5.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-brand-selected" hidden id="imgCheckedBrand5"  src="img/RondValider.png"/>
                            </div>
                        </td>
                        <td align="center">
                            <div class="modal-bloc-img-cat">
                                <img title="Accademia d'Archi" onclick="selectBrandFav('5')" class="img-responsive img-thumbnail img-modal-brand"  id="modalImgBrand" data-brand="5" src="img/Cat5.svg" alt="Accademia d'Archi" />
                                <img class="img-modal-brand-selected" hidden id="imgCheckedBrand5"  src="img/RondValider.png"/>
                            </div>
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default modal-conf-brand-back" id="btnBrandConfBack">< retour </button>
                <img src="img/Validation.png" id="img-brand-disabled" class="img-brand-disabled">
                <img src="img/Valider.png"  hidden  id="img-brand-enabled" class="img-brand-enabled">
            </div>
        </div>

    </div>
</div>


<!-- *
	 *
	 modal subscription
-->

<div class="modal fade" id="confSubscriptionModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Inscrivez-vous pour suivres les marques sélectionnées</h3>
                <span class="modal-subtitle"></span>
            </div>
            <div class="modal-body modal-body-center">
                <br>

                <input class="form-control login " placeholder="Email" type="text">
                <br>
                <input class="form-control password " placeholder="Mot de passe"  type="password">
                <br>
                <br>
                <div class="checkbox">
                    <input id="checkboxRememberMe"  type="checkbox">
                    <label for="checkboxRememberMe"> Se souvenir de moi
                </div>
                <input type="button" class="btn btn-default" value="Je m'inscris">
            </div>
            <div class="modal-footer">
                Vous avez déjà un compte? <a href="">Se connecter</a>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="./dist/jquery/jquery.min.js"></script>
<script type="text/javascript" src="./dist/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">

    var catFav="";
    var brandFav="";


    function selectCatFav(idCat)
    {

        if (catFav.indexOf(","+idCat+";") <0 )
        {
            //add
            catFav= catFav + "," + idCat+";"
        }
        else
        {
            //remove
            catFav = catFav.replace("," + idCat+";", '');
        }

        if(catFav !='')
        {
            $("#img-cat-disabled").hide();
            $("#img-cat-enabled").show();
        }
        else
        {
            $("#img-cat-disabled").show();
            $("#img-cat-enabled").hide();
        }
		
		alert(catFav);
    }

    function selectBrandFav(idBrand)
    {

        if (brandFav.indexOf(","+idBrand+";") <0 )
        {
            //add
            brandFav= brandFav + "," + idBrand+";"
        }
        else
        {
            //remove
            brandFav = brandFav.replace("," + idBrand+";", '');
        }

        if(brandFav !='')
        {
            $("#img-brand-disabled").hide();
            $("#img-brand-enabled").show();
        }
        else
        {
            $("#img-cat-disabled").show();
            $("#img-cat-enabled").hide();
        }
    }

    $(document).ready(function()
    {
        $('.dropdown-toggle').dropdown()

        $("#imgInscription").click(function(){

            $("#confCatModal").modal('show');

        });

        $("#img-cat-enabled").click(function(){

            $("#confCatModal").modal('hide');
            $("#confBrandModal").modal('show');

        });


        $("#btnBrandConfBack").click(function(){
            $("#confCatModal").modal('show');
            $("#confBrandModal").modal('hide');
        });

        $("#img-brand-enabled").click(function(){
            $("#confSubscriptionModal").modal('show');
            $("#confBrandModal").modal('hide');
        });



        $('.img-modal-cat').click(function()
        {
            var numCat = $(this).attr('data-cat');
            $("#imgCheckedCat"+numCat).toggle();
        });


        $('.img-modal-brand').click(function()
        {
            var numBrand = $(this).attr('data-brand');
            $("#imgCheckedBrand"+numBrand).toggle();
           
        });





    });


</script>

<script type="text/javascript" src="./dist/mmenu/dist/js/jquery.mmenu.all.min.js"></script>
<script type="text/javascript">
    //	The menu on the left
    $(function() {
        $('nav#menu-left').mmenu({});

    });
    </body>
    </html>