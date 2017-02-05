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

            <!-- look for fav -->
            <div class=" col-sm-4 col-lg-4 favSearch ">
                <div class="input-group searchBrandGroup">

                    <input class="form-control searchBrand" placeholder="Rechercher vos marques préférées" name="searchBrand" id="searchBrand" type="text">
                    <span class="input-group-btn">
                             <button class="btn btn-default btn-search searchBtn" type="button"></button>
                        </span>
                </div>
                <div class="match" id="match">
                </div>

            </div>
            <!-- fave saved-->
            <div class=" col-sm-7 col-lg-8 favSaved" id="favSaved">
                <h4 class="text-center titleConf">CONFIGURATION FAVORIS</h4>
                <div class="favBrandSaved" id="favBrandSaved">
                    <p class="text-center">Retrouvez içi vos favoris</p>


                    <?php



                    $sql = "SELECT DISTINCT (m.id_marque) as mid , m.nom, m.logo ";
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

                            ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 blockBrand" id="brand<?php echo $rowB["mid"];?>">
                                <div class="boxFavBrand ">
                                    <img src="../private/marchand/logo/<?php echo $rowB["logo"];?>"  class="imgBrandFav">

                                    <span style="white-space:nowrap;"><?php echo$rowB["nom"]; ?></span>
                                    <img class="img-delete" id="imgCheckedCat2" src="img/del.png" onclick="removeFavBrand(<?php echo $rowB["mid"];?>)" style="display: inline;">

                                </div>
                            </div>
                            <?php
                        }
                    }





                    ?>





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
                            $(".favBrandSaved:last").after($('<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 blockBrand" id="brand'+brand+'">')
                                                   .append($('<div class="boxFavBrand">')
                                                   .append($('<img src="../private/marchand/logo/'+item.logo+'" class="imgBrandFav">'))
                                                   .append($('<span style="white-space:nowrap;">'+item.nom+'</span>')))
                                                   .append($('<img class="img-delete" id="imgCheckedCat2" src="img/del.png" onclick="removeFavBrand('+brand+')" style="display: inline;">'))
                                                   );



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