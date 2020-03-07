<? include_once("bd.php"); 
if($_COOKIE["log"] == null || $_COOKIE["pas"] == null) {
		header("Location: log.php");
	}
	if($nick != null){
			$arr = $mysqli->query("SELECT * FROM `base` WHERE `log`='".$nick."' AND `stat`='".$stat."'");
				$arr = $arr->fetch_assoc();
			if(count($arr) > 0){  
				if($password == $arr[`pas`]){
					SetCookie("log", $nick);
					SetCookie("pas", $arr[`pas`]);
					header("Location: game.php");
				}else
				echo "<div id='eror'>Пароль не правельний";
 					
		}else
		echo "<div id='eror'>Даний логін не існує</div>";
	}

$nick = $_COOKIE['log'];
$pass = $_COOKIE['pas'];
$arr = $mysqli->query("SELECT * FROM `base` WHERE `log`='".$nick."'");
$arr = $arr->fetch_assoc();

$ar = $mysqli->query("SELECT * FROM `base` ORDER BY 'level' DESC");
?>
<? include_once 'h1.php'; ?>
<table style="width: 100%;">

	<caption style="font-size: 150%;background: gray; font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; ">
		Найкращі гравці
	</caption>
	<tr>
		<td>
		Ім'я
		</td>
		<td>
		Рівень
		</td>
		<td>
		Cрібло
		</td>
	</tr>
	<?
	$i=0;
	while ($arr = $ar->fetch_assoc()) 
	{
		if($i<3){
			if($i==0){
   	echo "<tr bgcolor='#FFCC00' ><td>".$arr['log']."</td>
		<td>".$arr['level']."</td>
		<td>".$arr['silver']."</td></tr>";
	}
	else if($i==1)
	{
	echo "<tr bgcolor='#999999'><td>".$arr['log']."</td>
		<td>".$arr['level']."</td>
		<td>".$arr['silver']."</td></tr>";
	}
	else if($i==2)
	{
			echo "<tr bgcolor='#993300'><td>".$arr['log']."</td>
		<td>".$arr['level']."</td>
		<td>".$arr['silver']."</td></tr>";
	}
	}
	$i++;
	}	
	?>
</table>
<? include_once 'footer.php'; ?>
