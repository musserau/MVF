
<?php
include_once("./checkCookie.php");
var_dump($_SESSION);
var_dump($_COOKIE);
?>
    <div class="navbar" role="navigation">


        <div class="navbar-header col-sm-3 col-md-3 col-lg-3">
            <a href="#" class="navbar-brand  hidden-xs brand-logo">
                <img src="img/logo-mvf.png" alt="logo-mvf" />
            </a>

            <!--Button -->
            <div id="header" class="visible-xs">
                <a class="toggle-menu" href="#menu-left"></a>
                <img src="img/logo-mvf.png" alt="logo-mvf" />
                <ul class="nav navbar-nav navbar-right sub-menu">
                    <?php
                    if(isset($_SESSION["user"])) {
                        ?>
                        }
                        <li>
                            <!--<img src="css/img/toggle-menu.png" height="50" width="50"/>-->
                            <a href="#">
                                <img src="img/menu-alertes-small.png">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="img/header-account-small-connected.png">
                            </a>
                        </li>

                        <?php
                    }else
                    {
                        ?>
                        <li>
                            <a href="#">
                                <img id="goToConnection" src="img/header-account-small-disconnected.png">
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- //Button -->
        </div>

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
        if(isset($_SESSION["user"]))
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
                <div class=\" hidden-xs col-xs-6 col-sm-2\">
                    <a href=\"#\" class=\"btn btn-mvf btn-myacount-header\">
                        <span>Mon compte</span>
                    </a>
                </div>";


        }
        else
        {


            echo"
                <div class=\"hidden-xs cols-sm-2 col-md-4 col-lg-3 myacount-header-disconnected\" >
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

    </div>

