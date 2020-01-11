<?php
$ip = $_SERVER['REMOTE_ADDR'];
$hostname=gethostname();
$inp = file_get_contents('accessi.json');
$tempArray = json_decode($inp,true);
if(isset($tempArray[$hostname])==true){
		$ceck=$tempArray[$hostname]['ip'];
			if ($ceck==$ip){
				$tempArray[$hostname]['counter']=$tempArray[$hostname]['counter']+1;
				$cont=$tempArray[$hostname]['counter'];
			}else{
			}
}else{$cont=1;
		$tempArray[$hostname]=$ip=array("ip"=>"$ip","counter"=>"$cont");
}
	
$x = json_encode($tempArray,true);
file_put_contents('accessi.json', $x);
    echo webHome($cont) ;    
	
function webHome ($cont) {
if($cont==1){
$head='Benvenuto,è la prima volta che visiti questo sito';
}else{$head=$cont;
}
$output =$head.'

<h1>DIZIONARIO</h1>
	<h1><p>Search a word:</p></h1>
	<form action="dizionario.php" method="get">
		<input type="text" name="word"><br>
		<input type="submit" name="cerca"><br>
	</form>
	<h1><p>Add word:</p></h1>
	<form action="dizionarioAdd.php" method="get">
		Parola:<input type="text" name="addword"><br>
		Sinonimi:<input type="text" name="sinonimi"><br>
		Contrario;<input type="text" name="contrario"><br>
					<input type="submit" name="add" ><br>
	</form>
	<h1><p>Erase word<p></h1>
	<form action="dizionarioErase.php" method="get">
		Parola:<input type="text" name="Erase"><br>
				<input type="submit" name="erase"><br>
	</form>';
	return $output;

}
?>