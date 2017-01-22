<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1.0, width=device-width">
<link href="./style.css" rel="stylesheet" type="text/css">



<?php

		$whereCat = '';

		if(isset($_GET['cat']) && $_GET['cat']!='')
		{
		
			
			
			if(strpos($_GET['cat'], ",")!==false)
			{
				$allmarque = explode(",", $_GET['cat']);
				$whereCat .= ' AND m.categorie=-256 ';
				
				foreach($allmarque as $value)
				{
					$whereCat .= ' OR m.categorie='.$value.' ';
				}
				
			}
			else
			{
				$whereCat = ' AND m.categorie='.$_GET['cat'].' ';
			}
			
		}
		
		if(isset($_GET['scat']))
		{
			$whereCat = " AND m.souscategorie = ".$_GET['scat']." " ;
		}
		
		if(isset($_GET['marque']))
		{
			$whereMrq = " AND m.id != ".$_GET['marque']." " ;
		}
		
	

	
		include("../conectDB.php");

		
		
		$baseRequest = "
		select m.id as id, m.nom as nom , m.logo as logo, v.id as vid 
		FROM marchand as m 
		left join vente as v on m.id=v.marchand 
		WHERE 1 ";
		
		
		
		
		
		//echo $baseRequest.$whereCat.$whereMrq.' ORDER BY m.point DESC LIMIT 10;';
		$sth = mysql_query($baseRequest.$whereCat.$whereMrq.' GROUP BY m.id  ORDER BY m.point DESC LIMIT 100;');
		
		//$rows = array();
		
		
		
	
		
		
?>



<div class="choise" style="margin-top:5%" >Choisissez les marques qui vous intéressent</div>




<table width="96%"  style="margin-left:2%;margin-top:4%;margin-bottom:30%">
	<?php 
	
		$i=1;
		while($r = mysql_fetch_assoc($sth))
		{
			
			//$rows[] = $r;
			
			
			 if ($i%4 == 1)
			 {
				echo('<tr>');
			 }

			
			echo '
				<td id="'.$r['id'].'" class="cadreMR" style="background-image:url(\'../private/Marchand/Logo/'.$r['logo'].'\');" onclick="addCoche(this)" >
					<img width="100%" src="./images/cadreMR.png" />
				</td>
			
			
			';
			
			if ($i%4 ==0)
			{
				echo '</tr>';
			}
			
			 
			
			$i++;
		}
	
	
	?>
</table>

<div class="baseBand">
	<table width="100%" style="margin-top:7%;">
		<tr>
			<td onClick="document.location.href='./selCat.php'" valign="middle" width="25%">
				<img src="./images/rtrnO.png" style="padding-left:30%;width:35%"  />
			</td>
			<td onClick="goValid()" align="left" >
				<img  id="valid"  width="66.66%"  src="./images/Valid.png" /> 
			</td>
		</tr>
	</table>
	
	<!--<div onClick="pass()" class="pass" >Passer</div>-->
</div>

<script>
	
	seled=[];
	
	function addCoche(el)
	{
		if(el.innerHTML.indexOf("coche.png")==-1)
		{
			el.innerHTML+='<img id="coche'+el.id+'" src="./images/coche.png" class="cocheMR" />';
			seled.push(el.id);
		}
		else
		{
			var element = document.getElementById("coche"+el.id);
			element.parentNode.removeChild(element);
			seled.splice(seled.indexOf(el.id), 1);
		}
		
		
		
	}
	
	function goValid()
	{
		if(seled.length>0)
		{
			document.location.href="././blank.php?a=validate"+seled.join(",");
		}
		else
		{
			pass();
		}
	}
	
	function pass()
	{
		document.location.href="././blank.php?a=pass";
	}
	

</script>


<?php

	include("../conectDB.php");

	$rq = "
	INSERT INTO firststart (date, cat, marque, already, pass) VALUES(CURDATE(), 0, 1, 0, 0) ON DUPLICATE KEY UPDATE cat=cat, marque=marque+1 , already=already, pass=pass;
	";
	
	$resultat = mysql_query($rq); 

?>
