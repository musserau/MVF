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
				<div class="col-sm-4 col-md-4 col-lg-2">
					<div class="collapse navbar-collapse" role="navigation">
						<ul class="nav navbar-nav navbar-right hidden-xs">
							<li>
								<button class="btn btn-default btn-header dropdown-toggle" type="button" data-toggle="dropdown">
									<img src="img/menu-alertes.png">
								</button>
								<ul class="dropdown-menu">
										<li><a href="#">HTML</a></li>
										<li><a href="#">CSS</a></li>
										<li><a href="#">JavaScript</a></li>
								</ul>
							</li>
							<li>
								<button class="btn btn-default btn-header dropdown-toggle" type="button" data-toggle="dropdown">
									<img src="img/menu-favoris-config.png">
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Favoris</a></li>
									<li><a href="#">Notification</a></li>
								</ul>
							</li>
							<li>
								<button class="btn btn-default btn-header dropdown-toggle" type="button" data-toggle="dropdown">
									<img src="img/menu-partage.png">
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Faire une recommendation</a></li>
									<li><a href="#">Signaler un problème</a></li>
								</ul>
							</li>
						</ul>

					</div>
				</div>
				<div class="hidden-xs cols-sm-2 col-md-2 col-lg-2">
					<a href="#" class="btn btn-mvf btn-myacount-header">
						<span>Mon compte</span>
					</a>
				</div>
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
						<div class="panel-heading " role="tab" data-toggle="collapse"  data-target="#collapseCategory"  aria-expanded="true" aria-controls="collapseCategory" id="headingCategory">
							<h4 class="panel-title">
									<span>Catégories</span>
							</h4>
						</div>
						<div id="collapseCategory" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingCategory">
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
                                            if(isset($_GET["cat"]) && ($_GET["cat"] == $id))
                                            {
                                                echo "<li class='selected'><a href='./categorie.php?cat=".$id."'>".$categorie."</a></li>";
                                            }
                                            else
                                            {
                                                echo "<li><a href='./categorie.php?cat=".$id."'>".$categorie."</a></li>";
                                            }
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
<?php include("sideSmall.php"); ?>
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

<script type="text/javascript" src="dist/jquery/jquery.min.js"></script>
<script type="text/javascript" src="dist/mmenu/dist/js/jquery.mmenu.all.min.js"></script>
<script type="text/javascript" src="dist/bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript">
    //	The menu on the left
    $(function() {
        $('nav#menu-left').mmenu({});

    });
    $(document).ready(function(){
        $('.dropdown-toggle').dropdown()
	
    });

    //	The menu on the right
    /*$(function() {
        $('nav#menu-right').mmenu({
            'offCanvas': {
                'position': 'right'
            }
        });
    });*/
</script>
</body>
</html>
