
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


    <?php include("header.php"); ?>



		<div class="row">
			<!-- sidebar -->
            <?php include("side.php"); ?>
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




    </body>
    </html>