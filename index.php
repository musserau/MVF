
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
            <div class="modal-body modal-body-brand">
                <h4>Choisissez désormais les marques qui vous intéressent</h4>
                <br>
                <table class="table" id="tableBrandConf" border="0" align="center" style="width:90%">
                    <tbody>

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
                <form id="subscriptionForm" >
                    <br>

                    <input class="form-control login " placeholder="Email" class="form-control" name="email" id="confMail" type="text">
                    <br>
                    <input class="form-control password " placeholder="Mot de passe"  id="confPass" type="password">
                    <br>
                    <br>
                    <div class="checkbox">
                        <input id="checkboxRememberMe"  type="checkbox" >
                        <label for="checkboxRememberMe"> Se souvenir de moi</label>
                    </div>
                    <br>
                    <input type="button" class="btn btn-default" id="submitConf" value="Je m'inscris">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default " id="goToConnection">Vous avez déjà un compte? Se connecter</button>
            </div>
        </div>

    </div>
</div>

<!-- *
	 *
	 modal notif
-->

<div class="modal fade" id="confNotifModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Vos marques ont été mises en favoris</h3>
                <span class="modal-subtitle"></span>
            </div>
            <div class="modal-body modal-body-center">

                <br>
                <div class="checkbox">
                    <input id="checkboxMailNotif"  type="checkbox" >
                    <label for="checkboxMailNotif"> Je souhaite recevoir mes alertes par mail</label>
                </div>
                <br>

            </div>
            <div class="modal-footer labelMailNotif">
                MVF est aussi sur mobile, téléchargez l'application
                <br>
                <br>
                <img src="img/download_google_play.png" hidden="" id="img-cat-enabled" class="img-cat-enabled" style="display: inline; margin-right: 10px;">
                <img src="img/download_apple_store.png" hidden="" id="img-cat-enabled" class="img-cat-enabled" style="display: inline;">
                <br>
                <br>
                <img src="img/Valider.png" hidden=""  id="submitNotif" class="img-cat-enabled" style="display: inline;">
            </div>
        </div>

    </div>
</div>


<!-- *
	 *
	 modal Connexion
-->

<div class="modal fade" id="connectionModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Se connecter à MVF</h3>
                <span class="modal-subtitle"></span>
            </div>
            <div class="modal-body modal-body-center">

                <input class="form-control login " placeholder="Email" class="form-control" name="email" id="coMail" type="text">
                <br>
                <input class="form-control password " placeholder="Mot de passe"  id="coPass" type="password">

                <br>
                <div class="checkbox">
                    <input id="checkboxRememberMeCo"  type="checkbox" >
                    <label for="checkboxRememberMeCo"> Se souvenir de moi</label>
                </div>

                <input type="button" class="btn btn-mvf submit-btn" style="font-size: 16px;" id="submitConnection" value="Connexion">
            </div>
            <div class="modal-footer">
                 <button class="btn btn-default" id="goToSubscribe">Vous n'avez pas de compte? S'inscrire</button>


            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="./dist/jquery/jquery.min.js"></script>

<!--[if IE 8]>
    <script type="text/javascript" src="./dist/respond/respond.js"></script>
<![endif]-->




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
		$("#img-brand-disabled").show();
		$("#img-brand-enabled").hide();
	}
}

$(document).ready(function()
{

    if(
        <?php
            if (isset($_SESSION["firstConnexion"]))
            {
                echo "'".$_SESSION["firstConnexion"]."'";
            }
            else
            {
                echo "''";
            }
        ?>
         == "1")
    {
        $("#confNotifModal").modal('show');
    }


	$('.dropdown-toggle').dropdown()

	$("#imgInscription").click(function(){

		$("#confCatModal").modal('show');

	});



	$("#img-cat-enabled").click(function()
	{

		$("#confCatModal").modal('hide');
		
		$("#tableBrandConf > tbody").html("");

		 $.ajax({
			url: './script/getBrandByCat.php',
			data: {
						  cat: catFav 
				   },
			type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
			dataType: 'json', //return data in json format
			success: function(data)
			{
				var cpt=0;
				
				$.map( data, function(item)
						 {
							 if(cpt==8)
							 {
								 
								 $("#tableBrandConf tbody").append($('<tr>')
																.append($('<td>')
																   .attr("align","center")));
								 $("#tableBrandConf tbody tr:last td:last").append($('<div>')
																	  .attr("class","modal-bloc-img-cat"));
																	  
								 $("#tableBrandConf tbody tr:last td:last div:last").append($('<img>')
																			.attr('src', "../private/Marchand/logo/"+item.logo)
																			.attr('data-brand',item.id)
																			.attr('class',"img-responsive img-thumbnail img-modal-brand")
																			.attr('id',"modalImgBrand")
																			.attr('onclick',"selectBrandFav('"+item.id+"')")
																			);
								 $("#tableBrandConf tbody tr:last td:last div:last ").append($('<img>')
																			.attr('src', "img/RondValider.png")
																			.attr('id',"imgCheckedBrand"+item.id)
																			.attr('class',"img-modal-brand-selected")
																			.attr('hidden',"true")
																			);

								cpt=0;
							 }
							 else
							 {
								
								  $("#tableBrandConf tbody tr:last").append($('<td>')
																			.attr("align","center"));
								  $("#tableBrandConf tbody tr:last td:last").append($('<div>')
																	  .attr("class","modal-bloc-img-cat"));										
								  $("#tableBrandConf tbody tr:last td:last div:last").append($('<img>')
																			.attr('src', "../private/Marchand/logo/"+item.logo)
																			.attr('data-brand',item.id)
																			.attr('class',"img-responsive img-thumbnail img-modal-brand")
																			.attr('id',"modalImgBrand")
																			.attr('onclick',"selectBrandFav('"+item.id+"')")
																			);
								  $("#tableBrandConf tbody tr:last td:last div:last ").append($('<img>')
																			.attr('src', "img/RondValider.png")
																			.attr('id',"imgCheckedBrand"+item.id)
																			.attr('class',"img-modal-brand-selected")
																			.attr('hidden',"true")
																			);
								
							 }
							 
							
							 
							 
							 
							 
							 
							//alert('id'+item.id+" logo:"+item.logo)

							cpt++;
						 }
				     )
				
			},  
			error: function(e) { 
			 alert("Error contact the administrator");
			}
		});
		
		
		$("#confBrandModal").modal('show');

	});


	$("#btnBrandConfBack").click(function(){
		$("#confCatModal").modal('show');
		$("#confBrandModal").modal('hide');
		//reset to default
        $("#img-brand-disabled").show();
        $("#img-brand-enabled").hide();


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



// delegate on dynamicli create element
	$(document).delegate('.img-modal-brand', 'click', function()
	{

	var numBrand = $(this).attr('data-brand');
	$("#imgCheckedBrand"+numBrand).toggle();
	
	});


    $("#confMail").keyup(function () {
        var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        var mail=$("#confMail").val()
        var emailFormat = re.test(mail);
        if( emailFormat)
        {
            //check if already exist
            $.ajax({
                    url: './script/checkMailIsUnique.php',
                    data: {
                        mail: mail
                    },
                    type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
                    dataType: 'json', //return data in json format
                    success: function(data)
                    {
                        $.map( data, function(item)
                            {
                                if(item.mailUnique =="true")
                                {
                                    $('#confMail').attr('style', " border:green 1px solid;");
                                }
                                else
                                {
                                    alert("Ce mail est déjà utilisé");
                                    $('#confMail').attr('style', " border:#FF0000 1px solid;");
                                    $('#confMail').val('');
                                }

                            })


                    },
                    error: function(e) {

                        alert("Error contact the administrator"+e.responseText);
                    }
                });


        }
        else
        {
            $('#confMail').attr('style', " border:#FF0000 1px solid;");
        }
    });

    $("#submitConf").click(function () {

        var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        var emailFormat = re.test($("#confMail").val());
        if(emailFormat && ($("#submitConf").val() !=""))
        {

            var mail=$("#confMail").val();
            var password=$("#confPass").val();
            var rememberMe=0;
            if( $('#checkboxRememberMe').is(':checked') )
            {
                rememberMe = 1;
            }
            $.ajax({
                url: './recUser.php',
                data: {
                    mail: mail,
                    password: password,
                    cat:catFav,
                    brand:brandFav,
                    rememberMe:rememberMe
                },
                type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
                dataType: 'json', //return data in json format
                success: function(data)
                {
                    $.map( data, function(item)
                    {
                        if(item.ok =="true")
                        {

                            //modal hide

                           // $("#confNotifModal").modal('show');
                           //  $("#confSubscriptionModal").modal('hide');
                           // refresh page index
                            location.reload();

                        }
                        else
                        {
                            alert("Erreur, merci de contacter l'administrateur");
                        }

                    })


                },
                error: function(e) {

                    alert("Error contact the administrator"+e.responseText);
                }
            });


        }
        else
        {
            alert("Erreur, merci de contacter l'administrateur");

            $('#confMail').attr('style', " border:#FF0000 1px solid;");
            $('#confPass').attr('style', " border:#FF0000 1px solid;");
        }

    });


    $("#submitConnection").click(function () {


        if(($("#coPass").val() !="")&& ($("#coMail").val() !=""))
        {

            var mail=$("#coMail").val();
            var password=$("#coPass").val();
            var rememberMe=0;
            if( $('#checkboxRememberMeCo').is(':checked') )
            {
                rememberMe = 1;
            }
            $.ajax({
                url: './coUser.php',
                data: {
                    mail: mail,
                    password: password,
                    rememberMe:rememberMe
                },
                type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
                dataType: 'json', //return data in json format
                success: function(data)
                {
                    $.map( data, function(item)
                    {
                        if(item.ok =="true")
                        {
                            // refresh page index
                            location.reload();
                        }
                        else
                        {
                            alert("Erreur, merci de contacter l'administrateur");
                        }

                    })


                },
                error: function(e) {

                    alert("Error contact the administrator"+e.responseText);
                }
            });


        }
        else
        {
            if($("#coPass").val() =="")
            {
                $('#coPass').attr('style', " border:#FF0000 1px solid;");
            }
            if($("#coMail").val() =="")
            {
                $('#coMail').attr('style', " border:#FF0000 1px solid;");
            }
            alert("Merci de renseigner les champs obligatoire");
        }

    });


    $("#submitNotif").click(function () {

            var notif=0;
            if( $('#checkboxMailNotif').is(':checked') )
            {
                notif = 1;
            }
            $.ajax({
                url: './script/updateNotif.php',
                data: {
                    notif: notif
                },
                type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
                dataType: 'json', //return data in json format
                success: function(data)
                {
                    $.map( data, function(item)
                    {
                        if(item.update =="true")
                        {
                            //modal hide
                            $("#confNotifModal").modal('hide');
                        }
                        else
                        {
                            alert("Erreur, merci de contacter l'administrateur");
                        }
                    })
                },
                error: function(e) {

                    alert("Error contact the administrator"+e.responseText);
                }
            });
    });

    $("#imgConnection").click(function () {
        $("#connectionModal").modal('show');
    });

    $("#goToSubscribe").click(function () {
        $("#confCatModal").modal('show');
        $("#connectionModal").modal('hide');
    });
    $("#goToConnection").click(function () {
        $("#confSubscriptionModal").modal('hide');
        $("#connectionModal").modal('show');
    });


});






</script>

<script type="text/javascript" src="./dist/mmenu/dist/js/jquery.mmenu.all.min.js"></script>
<script type="text/javascript">
    //	The menu on the left

    $(function() {
        $('nav#menu-left').mmenu({});

    });

</script>
    </body>
    </html>