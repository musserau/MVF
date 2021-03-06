<?php
include_once("./checkCookie.php");

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

    <?php include("header.php"); ?>

    <div class="row">
        <!-- sidebar -->
        <?php include("side.php"); ?>

        <!-- // sidebar -->

        <div class="col-sm-9 col-lg-9 inner-page ">
            <h3 class="text-center titleConf">CONFIGURATION NOTIFICATIONS</h3>
            <br>
            <!-- look for brand -->
            <div class=" col-sm-5 col-lg-6 brandNotif" id="brandNotif">

                <div class="headerNotification">
                    MARQUE
                    <div class="headerBlock" id="updateBrand" onclick="showAddBrand()">Modifier</div>
                    <div class="headerBlock" hidden id="optBrand" onclick="quitAddBrand()">Retour</div>
                </div>

                <div id="searchBrandBlock" hidden>
                    <div class="input-group searchBrandGroup">

                        <input class="form-control searchBrand" placeholder="Rechercher vos marques préférées" name="searchBrand" id="searchBrand" type="text">
                        <span class="input-group-btn">
                                 <button class="btn btn-default btn-search searchBtn" type="button"></button>
						</span>
                    </div>
                    <div class="match" id="match">
                    </div>
                </div>
                <div class="favBrandSaved" id="favBrandSaved">
                    


                    <?php



                    $sql = "SELECT DISTINCT (m.id_marque) as mid , m.nom, m.logo, u.id_utilisateur ";
                    $sql .= "FROM tb_utilisateur_marque as um ";
                    $sql .= "LEFT JOIN tb_utilisateur as u on um.id_utilisateur =u.id_utilisateur ";
                    $sql .= "LEFT JOIN tb_marque as m on um.id_marque = m.id_marque ";
                    $sql .= "WHERE u.id_user = :user ";
                    $dbh = getConnection();
                    $stmt = $dbh->prepare($sql);

                    $stmt->bindParam(':user', $_SESSION["user"], PDO::PARAM_STR);

                    if ($stmt->execute())
                    {
                        $resultFav = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($resultFav as $rowB)
                        {
                            $idUser= $rowB["id_utilisateur"];
                            ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blockBrand" id="brand<?php echo $rowB["mid"];?>">
                                <div class="boxNotifBrand ">
									<div>
										<img src="../private/marchand/logo/<?php echo $rowB["logo"];?>"  class="imgBrandFav">
										<span style="white-space:nowrap;padding-left: 5px"> <b><?php echo$rowB["nom"]; ?></b></span>
										<img class="img-delete" id="imgCheckedCat2" src="img/del.png" onclick="removeFavBrand(<?php echo $rowB["mid"];?>)" style="display: inline;">
									<div class="optionNotifBrand" id="optionNotifBrand<?php echo $rowB["mid"];?>" >
									<div onclick="showAddKeywordBrand(<?php echo $rowB["mid"];?>)" class="blockProduit" id="blockProduit<?php echo $rowB["mid"];?>">Produits</div>


                                        <?php
                                        $sql = " SELECT keyword_marque ";
                                        $sql .= " FROM tb_utilisateur_marque ";
										$sql .= " LEFT JOIN tb_utilisateur on tb_utilisateur_marque.id_utilisateur = tb_utilisateur.id_utilisateur ";
										$sql .= " WHERE tb_utilisateur.id_user = :user ";
                                        $sql .= " AND  id_marque= :brand ";
                                        $dbh = getConnection();
                                        $stmtKey = $dbh->prepare($sql);

                                        $stmtKey->bindParam(':user', $_SESSION["user"], PDO::PARAM_INT);
                                        $stmtKey->bindParam(':brand', $rowB["mid"], PDO::PARAM_INT);

                                        if ($stmtKey->execute())
                                        {
                                            $resultKey = $stmtKey->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($resultKey as $rowKey)
                                            {
                                                if($rowKey['keyword_marque'] != "parent")
                                                {
                                        ?>

                                                <div class="keywordBrand" id="keyword_marque<?php echo $rowKey["keyword_marque"];?>">

                                                   <span> <?php echo $rowKey["keyword_marque"];?></span>
													
                                                    <img class="img-delete-keyword" src="img/del.png"  onclick="delKeywordBrand('<?php echo $rowKey["keyword_marque"];?>',<?php echo $rowB["mid"];?>)">
                                                </div>


                                        <?php
                                                }
                                            }
                                        }
                                            ?>
									</div>
									
									<div class="addKeywordBrand" id="addKeywordBrand<?php echo $rowB["mid"];?>" hidden>
										<div class="input-group searchBrandGroupNotif">
											<input class="form-control searchBrand" placeholder="soins, chaussure, IPhone 6s" id="keywordBrand<?php echo $rowB["mid"];?>" type="text">
											<span class="input-group-btn">
                                                     <button class="btn btn-default btn-add searchBtn" onclick="addKeywordBrand(<?php echo $rowB["mid"];?>)" type="button"></button>
													 <button class="btn btn-default btn-close searchBtn" onclick="closeKeywordBrand(<?php echo $rowB["mid"];?>)" type="button"></button>
											</span>
										</div>

                                        <span class="spanAddKeyword" >Vous pouvez indiquer plusieur produits en les séparant d'une virgule</span>
									</div>
									
									</div>
                                </div>
                            </div>
                            <?php
                        }
                    }





                    ?>





                </div>

            </div>



            <!-- conf-->
            <div class=" col-sm-5 col-lg-6 " >

                <div class="headerNotification">
                    PRODUIT
					<div class="headerBlock" id="updateProduit" onclick="showAddKeyword()">Modifier</div>	
					<div class="headerBlock" hidden id="optProduit" onclick="quitAddKeyword()">Retour</div>
                </div>
				
				
                <div class="keywordBlock" id="keywordBlock">
				<?php

                    $sql = "SELECT k.id_keyword_produit, k.libelle ";
                    $sql .= "FROM tb_keyword_produit as k ";
                    $sql .= "LEFT JOIN tb_utilisateur as u on k.id_utilisateur =u.id_utilisateur ";
                    $sql .= "WHERE u.id_user = :user ";
                    $dbh = getConnection();
                    $stmt = $dbh->prepare($sql);

                    $stmt->bindParam(':user', $_SESSION["user"], PDO::PARAM_STR);

                    if ($stmt->execute())
                    {
						$count = $stmt->rowCount();
						if($count>0)
						{
							$resultFav = $stmt->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultFav as $rowB)
							{

								?>
								<div class="keywordBrandWhite" id="keyword_produit<?php echo $rowB["id_keyword_produit"];?>">

                                                   <span> <?php echo $rowB["libelle"];?></span>
													
                                                    <img class="img-delete-keyword" src="img/del.png"  onclick="delKeyword(<?php echo $rowB["id_keyword_produit"];?>)">
								</div>
								<?php
							}
						}
						else
						{
							echo "<span class=\"noData\" id=\"noKeywordProduct\">Aucun produit suivi</span>";
						}
                    }





                    ?>
                </div>
				
				<div class="addKeyword" id="addKeyword" hidden>
					<div class="input-group searchBrandGroup">
						<input class="form-control searchBrand" placeholder="soins, chaussure, IPhone 6s" id="keyword" type="text">
						<span class="input-group-btn">
								 <button class="btn btn-default btn-add searchBtn" onclick="addKeyword()" type="button"></button>
						</span>
					</div>
                    <span class="spanAddKeyword" > Vous pouvez indiquer plusieur produits en les séparant d'une virgule</span>
				</div>



                <div class="headerNotification">
                    FREQUENCE
					<div class="headerBlock" id="updateFrequence" onclick="showAddFrequence()">Modifier</div>
					<div class="headerBlock" hidden id="optFrequence" onclick="quitAddFrequence()">Retour</div>
				</div>


                <div class="frequenceBlock" id="frequenceBlock" >

                    <?php
                    $sql  = " SELECT frequence.id,frequence.libelle ";
                    $sql .= " FROM frequence  ";
                    $sql .="  LEFT JOIN tb_utilisateur on frequence.id = tb_utilisateur.id_frequence  ";
                    $sql .= " WHERE tb_utilisateur.id_user = :user";
                    $dbh = getConnection();
                    $stmtKey = $dbh->prepare($sql);

                    $stmtKey->bindParam(':user', $_SESSION["user"], PDO::PARAM_INT);
                    $notification = array();

                    if ($stmtKey->execute())
                    {
                        $count = $stmtKey->rowCount();

                        if($count>0) {
                            $resultKey = $stmtKey->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <?php

                                ?>
                                <div class="selectedFrequence" id="selectedFrequence">
                                    <span id="selectedFrequenceSpan"><?php echo $resultKey["libelle"]; ?></span>

                                </div>

                                <?php


                            ?>

                            <?php
                        }
                        else
                        {
                            ?>
                            <span class="noData" id="NotificationNoData">
                            Contrôlez le nombre de vos notifications par jours
                            </span>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="addFrequence" id="addFrequence" hidden>

                    <?php
                    $sql  = " SELECT * ";
                    $sql .= " FROM frequence  ";
                    $dbh = getConnection();
                    $stmtKey = $dbh->prepare($sql);

                    if ($stmtKey->execute())
                    {
                        $resultKeyFrequence = $stmtKey->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($resultKeyFrequence as $rowKey) {

                            $notifcheck="";
                            if ($rowKey["id"]==$resultKey["id"])
                            {
                                $notifcheck="checked";
                            }
                            ?>


                            <div class="blockFrequence<?php echo $rowKey["id"];?>" >
                                <div class="radio" onclick="changeFrequence(<?php echo $rowKey["id"];?>,'<?php echo $rowKey["libelle"];?>')" >
                                    <input name="frequenceRadio" id = "checkboxFrequence<?php echo $rowKey["id"];?>" <?php echo $notifcheck;?>  type = "radio" >
                                    <label for="checkboxFrequence<?php echo $rowKey["id"];?>" > <?php echo $rowKey["libelle"];?> </label >
                                </div >
                            </div >

                            <?php
                        }}
                    ?>

                </div>






               

			
					
                <div class="headerNotification">
                    RAPPEL
					<div class="headerBlock" id="updateNotification" onclick="showAddNotif()">Modifier</div>
					<div class="headerBlock" hidden id="optNotification" onclick="quitAddNotif()">Retour</div>
                </div>

                <div class="notificationBlock" id="notificationBlock" >

                    <?php
                    $sql  = "  SELECT tb_notification_delais.libelle, tb_notification_delais.id_notification_delais ";
                    $sql .= " FROM tb_utilisateur_notification  ";
                    $sql .="  LEFT JOIN tb_utilisateur on tb_utilisateur_notification.id_utilisateur = tb_utilisateur.id_utilisateur  ";
                    $sql .= " LEFT JOIN tb_notification_delais on tb_utilisateur_notification.id_notification_delais = tb_notification_delais.id_notification_delais  ";
                    $sql .= " WHERE tb_utilisateur.id_user = :user";
                    $dbh = getConnection();
                    $stmtKey = $dbh->prepare($sql);

                    $stmtKey->bindParam(':user', $_SESSION["user"], PDO::PARAM_INT);
                    $notification = array();

                    if ($stmtKey->execute())
                    {
                        $count = $stmtKey->rowCount();
                        if($count>0) {
                            $resultKey = $stmtKey->fetchAll(PDO::FETCH_ASSOC);
                            ?>

                            <?php
                            foreach ($resultKey as $rowKey)
                            {
                                $notification[]=$rowKey["id_notification_delais"];
                                ?>



                                <div class="selectedNotification" id="selectedNotification<?php echo $rowKey["id_notification_delais"];?>">
                                    <?php echo $rowKey["libelle"]; ?>
                                    <img class="img-delete-keyword-notification" src="img/del.png" onclick="delNotification(<?php echo $rowKey["id_notification_delais"];?>)">
                                </div>

                                <?php

                            }
                            ?>

                            <?php
                        }
                        else
                        {
                            ?>
                            <span class="noData" id="NotificationNoData">
                        Choisissez le moment de réception de vos notifications
                        </span>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="addNotification" id="addNotification" hidden>

                    <?php
                    $sql  = " SELECT * ";
                    $sql .= " FROM tb_notification_delais  ";
                    $dbh = getConnection();
                    $stmtKey = $dbh->prepare($sql);

                    if ($stmtKey->execute())
                    {
                        $resultKey = $stmtKey->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($resultKey as $rowKey) {

                            $notifcheck="";
                            if (in_array($rowKey["id_notification_delais"],$notification))
                            {
                                $notifcheck="checked";

                            }
                            ?>


                            <div class="blockNotification<?php echo $rowKey["id_notification_delais"];?>" >
                            <div class="checkbox" onclick="changeNotif(<?php echo $rowKey["id_notification_delais"];?>,'<?php echo $rowKey["libelle"];?>')" >
                                <input id = "checkboxNotification<?php echo $rowKey["id_notification_delais"];?>" <?php echo $notifcheck;?>  type = "checkbox" >
                                <label for="checkboxNotification<?php echo $rowKey["id_notification_delais"];?>" > <?php echo $rowKey["libelle"];?> </label >
                            </div >
                        </div >

                        <?php
                    }}
                    ?>

                </div>


                <div class="headerNotification">
                    ALERT MAIL
                </div>
                <?php

                $baseRequest = "select notif_mail  FROM tb_utilisateur WHERE id_user = :user";

                $stmt = $dbh->prepare($baseRequest);
                $stmt->bindValue('user', $_SESSION["user"], PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetch();
                $notif_mail=$result["notif_mail"];
                $checked="";

                if($notif_mail==1) {
                    $checked="checked";
                }
                ?>
                <div class="checkbox" onclick="changeAlertMail()">
                    <input id="checkboxAlertMailOption" <?php echo $checked; ?>  type="checkbox" >
                    <label for="checkboxAlertMailOption"> Je souhaite être alerté par mail</label>
                </div>

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


    function showAddBrand()
    {


        $("#searchBrandBlock").show();
        $("#favBrandSaved").hide();


        $("#updateBrand").hide();
        $("#optBrand").show();
    }

    function quitAddBrand()
    {
        $("#searchBrandBlock").hide();
        $("#favBrandSaved").show();

        $("#optBrand").hide();
        $("#updateBrand").show();
    }




	function showAddKeywordBrand(brand)
	{
            $("#optionNotifBrand"+brand).hide();
            $("#addKeywordBrand"+brand).show();
    }
	function showAddKeyword()
	{
            $("#keywordBlock").hide();
            $("#addKeyword").show();
			$("#updateProduit").hide();
			$("#optProduit").show();
			
    }
	function quitAddKeyword()
	{
            $("#keywordBlock").show();
            $("#addKeyword").hide();
			$("#updateProduit").show();
			$("#optProduit").hide();
			
    }

    function showAddNotif()
    {
        $("#notificationBlock").hide();
        $("#addNotification").show();
        $("#updateNotification").hide();
        $("#optNotification").show();

    }
    function quitAddNotif()
    {
        $("#notificationBlock").show();
        $("#addNotification").hide();
        $("#updateNotification").show();
        $("#optNotification").hide();

    }


    function showAddFrequence()
    {
        $("#frequenceBlock").hide();
        $("#addFrequence").show();
        $("#updateFrequence").hide();
        $("#optFrequence").show();

    }
    function quitAddFrequence()
    {
        $("#frequenceBlock").show();
        $("#addFrequence").hide();
        $("#updateFrequence").show();
        $("#optFrequence").hide();

    }



    function delKeywordBrand(keyword_marque,brand)
    {

			 $.ajax({
                url: './script/delKeywordBrand.php',
                data: {
                    brand: brand,
                    keyword: keyword_marque
                },
                type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
                dataType: 'json', //return data in json format
                success: function (data) {
                    $.map(data, function (item) {

                        if (item.ok == "true") {
                            // remove div
                            $("#keyword_marque"+keyword_marque).remove();

                        }
                        else {
                            alert("Erreur, merci de contacter l'administrateur");
                        }
                    })
                },
                error: function (e) {

                    alert("Error contact the administrator" + e.responseText);
                }
            });
    }
	
	function delKeyword(keyword)
    {
		 $.ajax({
			url: './script/delKeyword.php',
			data: {
				keyword: keyword
			},
			type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
			dataType: 'json', //return data in json format
			success: function (data) {
				$.map(data, function (item) {

					if (item.ok == "true") {
						// remove div
						$("#keyword_produit"+keyword).remove();

					}
					else {
						alert("Erreur, merci de contacter l'administrateur");
					}
				})
			},
			error: function (e) {

				alert("Error contact the administrator" + e.responseText);
			}
		});
    }

    function closeKeywordBrand(brand)
    {
        $("#optionNotifBrand" + brand).show();
        $("#addKeywordBrand" + brand).hide();
        $("#keywordBrand" + brand).val('');
    }

    function changeFrequence(frequence,val)
    {

        $.ajax({
            url: './script/updateFrequence.php',
            data: {
                frequence: frequence,
            },
            type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
            dataType: 'json', //return data in json format
            success: function (data) {
                $.map(data, function (item) {

                    if (item.update == "true")
                    {
                    }
                    else
                    {
                        alert("Erreur, merci de contacter l'administrateur");
                    }
                })
            },
            error: function (e) {
                alert("Error contact the administrator" + e.responseText);
            }
        });
        $("#selectedFrequenceSpan").html(val);
    }

    function changeNotif(notification,val)
    {
        var isCheck=0;
        if( $('#checkboxNotification'+notification).is(':checked') )
        {
            isCheck = 1;
        }
        $.ajax({
            url: './script/updateNotification.php',
            data: {
                isCheck: isCheck,
                notification:notification
            },
            type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
            dataType: 'json', //return data in json format
            success: function (data) {
                $.map(data, function (item) {

                    if (item.update == "true")
                    {

                        if(isCheck==0)
                        {
                            $("#selectedNotification"+notification).remove();
                        }
                        else
                        {
                            $("#notificationBlock").append($('<div class="selectedNotification" id="selectedNotification'+notification+'">'+ val+'<img class="img-delete-keyword-notification" src="img/del.png" onclick="delNotification('+notification+')">'));
                        }

                    }
                    else
                    {
                        alert("Erreur, merci de contacter l'administrateur");
                    }
                })
            },
            error: function (e) {

                alert("Error contact the administrator" + e.responseText);
            }
        });
    }
    function changeAlertMail()
    {
        var alertMail=0;
        if( $('#checkboxAlertMailOption').is(':checked') )
        {
            alertMail = 1;
        }
        $.ajax({
            url: './script/updateAlertMail.php',
            data: {
                alertMail: alertMail
            },
            type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
            dataType: 'json', //return data in json format
            success: function (data) {
                $.map(data, function (item) {

                    if (item.update == "true") {
                    }
                    else {
                        alert("Erreur, merci de contacter l'administrateur");
                    }
                })
            },
            error: function (e) {

                alert("Error contact the administrator" + e.responseText);
            }
        });
    }


    function delNotification(notification)
    {
        $.ajax({
            url: './script/delNotification.php',
            data: {
                notification: notification
            },
            type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
            dataType: 'json', //return data in json format
            success: function (data) {
                $.map(data, function (item) {

                    if (item.ok == "true") {

                        // remove div
                        $("#selectedNotification" + notification).remove();
                        $("#checkboxNotification" + notification).prop('checked', false);
                    }
                    else {
                        alert("Erreur, merci de contacter l'administrateur");
                    }
                })
            },
            error: function (e) {

                alert("Error contact the administrator" + e.responseText);
            }
        });
    }


	function addKeywordBrand(brand)
	{
				
		var keyword=$("#keywordBrand"+brand).val();
        if(keyword !="") {
            $.ajax({
                url: './script/addKeywordBrand.php',
                data: {
                    brand: brand,
                    keyword: keyword

                },
                type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
                dataType: 'json', //return data in json format
                success: function (data) {
                    $.map(data, function (item) {

                        if (item.ok == "true") {


                            if(item.nbItem == "1")
                            {
                               $("#optionNotifBrand"+brand).append($('<div class="keywordBrand" id="keyword_marque'+keyword+'">')
                                    .append($('<span>'+keyword+'</span><img class="img-delete-keyword" src="img/del.png" onclick="delKeywordBrand(\''+keyword+'\','+brand+')">')));

                            }
                            else if(item.nbItem > "1")
                            {
                                for(var x=1;x<= item.nbItem;x++ )
                                {
                                    var val="item"+x+"Val";

                                 $("#optionNotifBrand"+brand).append($('<div class="keywordBrand" id="keyword_marque'+item[val]+'">')
                                        .append($('<span>'+item[val]+'</span><img class="img-delete-keyword" src="img/del.png" onclick="delKeywordBrand(\''+item[val]+'\','+brand+')">')));

                                }

                            }






                            // apend span
                            $("#optionNotifBrand" + brand).show();
                            $("#addKeywordBrand" + brand).hide();

							$("#keywordBrand"+brand).val('');
                        }
                        else {
                            alert("Erreur, merci de contacter l'administrateur");
                        }
                    })
                },
                error: function (e) {

                    alert("Error contact the administrator" + e.responseText);
                }
            });
        }
        else
        {
            alert("le champs est vide");
        }
			
	}
	
	function addKeyword()
	{
				
		var keyword=$("#keyword").val();
        if(keyword !="") {
            $.ajax({
                url: './script/addKeyword.php',
                data: {
                    keyword: keyword
                },
                type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
                dataType: 'json', //return data in json format
                success: function (data) {
                    $.map(data, function (item) {

                        if (item.ok == "true") {
							
							if(item.nbItem == "1")
							{
								// append 
								$("#keywordBlock").append($('<div class="keywordBrandWhite" id="keyword_produit'+item.itemId+'">')
                                                   .append($('<span>'+keyword+'</span><img class="img-delete-keyword" src="img/del.png" onclick="delKeyword(\''+item.itemId+'\')">')));
							}
							else if(item.nbItem > "1")
							{
								for(var x=1;x<= item.nbItem;x++ )
								{
									var id="item"+x+"Id";
									var val="item"+x+"Val";
									
								// append item1Id
								$("#keywordBlock").append($('<div class="keywordBrandWhite" id="keyword_produit'+item[id]+'">')
                                                   .append($('<span>'+item[val]+'</span><img class="img-delete-keyword" src="img/del.png" onclick="delKeyword(\''+item[id]+'\')">')));
							
								}
								
							}
							$("#keyword").val('');
							$("#keywordBlock").show();
							$("#addKeyword").hide();
							$("#updateProduit").show();
							$("#optProduit").hide();
							$("#noKeywordProduct").hide();
							
                        }
                        else {
                            alert("Erreur, merci de contacter l'administrateur"+item.itemId);
                        }
                    })
                },
                error: function (e) {

                    alert("Error contact the administrator" + e.responseText);
                }
            });
        }
        else
        {
            alert("le champs est vide");
        }
			
	}
	

    function addFavBrand(brand)
    {


        if($("#checkboxItem"+brand).is(':checked')  )
        {
            $.ajax({
                url: './script/addFavBrand.php',
                data: {
                    brand: brand
                },
                type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
                dataType: 'json', //return data in json format
                success: function(data)
                {
                    $.map( data, function(item)
                    {

                        if(item.ok =="true")
                        {
                            $(".favBrandSaved:last").append($('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blockBrand" id="brand'+brand+'">')
                                                        .append($('<div class="boxNotifBrand">')
                                                            .append($('<div>')
                                                                   .append($('<img src="../private/marchand/logo/'+item.logo+'" class="imgBrandFav">'))
                                                                   .append($('<span style="white-space:nowrap;padding-left: 5px">'+item.nom+'</span>'))
                                                                   .append($('<img class="img-delete" id="imgCheckedCat2" src="img/del.png" onclick="removeFavBrand('+brand+')" style="display: inline;">'))
                                                            .append($('<div class="optionNotifBrand" id="optionNotifBrand'+brand+'" >')
                                                               .append($('<div onclick="showAddKeywordBrand('+brand+')" class="blockProduit" id="blockProduit'+brand+'">Produits</div>')))
                                                            .append($('<div class="addKeywordBrand" id="addKeywordBrand'+brand+'" hidden="" >')
                                                                .append($(' <div class="input-group searchBrandGroupNotif">')
                                                                   .append($('<input class="form-control searchBrand" placeholder="soins, chaussure, IPhone 6s" id="keywordBrand'+brand+'" type="text">'))
                                                                   .append($('<span class="input-group-btn">')
                                                                       .append($('<button class="btn btn-default btn-add searchBtn" onclick="addKeywordBrand('+brand+')" type="button"></button>'))
                                                                       .append($('<button class="btn btn-default btn-close searchBtn" onclick="closeKeywordBrand('+brand+')" type="button"></button>'))))
                                                                 .append($('<span class="spanAddKeyword">Vous pouvez indiquer plusieur produits en les séparant d\'une virgule</span>'))))

                            ));



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
            removeFavBrand(brand);
        }


    }



    function removeFavBrand(brand)
    {
        $.ajax({
            url: './script/removeFavBrand.php',
            data: {
                brand: brand
            },
            type: 'POST', // a jQuery ajax POST transmits in querystring format (key=value&key1=value1) in utf-8
            dataType: 'json', //return data in json format
            success: function(data)
            {
                $.map( data, function(item)
                {

                    if(item.ok =="true")
                    {
                        $("#brand"+brand ).remove();
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




        $("#searchBrand").on('keyup', function() { // everytime keyup event
            var input = $(this).val();
            if ( input.length >= 3 ) {
                //   $('#match').html('<img src="design/loader-small.gif" />'); // Loader icon apprears in the <div id="match"></div>
                $('#match').html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
                var dataFields = {'input': input}; // We pass input argument in Ajax
                $.ajax({
                    type: "POST",
                    url: "script/searchBrand.php", // call the php file ajax/tuto-autocomplete.php
                    data: dataFields, // Send dataFields var
                    timeout: 3000,
                    success: function(dataBack){ // If success
                        $('#match').html(dataBack); // Return data (UL list) and insert it in the <div id="match"></div>
                        $('#matchList li').on('click', function() { // When click on an element in the list
                            // $('#searchBrand').val($(this).text()); // Update the field with the new element
                            // $('#match').text(''); // Clear the <div id="match"></div>
                        });
                    },
                    error: function() { // if error
                        $('#match').text('Problem!');
                    }
                });
            } else {
                $('#match').text(''); // If less than 2 characters, clear the <div id="match"></div>
            }
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
                            else if(item.ok =="false")
                            {
                                alert("Mot de passe incorrect");
                                $('#coPass').attr('style', " border:red 1px solid;");
                            }
                            else {
                                alert("Error contact the administrator");
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