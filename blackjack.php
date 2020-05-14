<?php
$jugar=true;
function comprobarsaldo(){
	// se comprueba que todos los jugadores tienen al menos 100€ sino no se juega 
}


if($jugar==true){
$apuestas=array();
$baraja=array("1P","1D","1T","1C","2P","2D","2T","2C","3P","3D","3T","3C","4P","4D","4T","4C","5P","5D","5T","5C","6P","6D","6T","6C","7P","7D","7T","7C","8P","8D","8T","8C","9P","9D","9T","9C","10P","10D","10T","10C","JP","JD","JT","JC","QP","QD","QT","QC","KP","KD","KT","KC");
array_push($apuestas,$POST['apuesta1']);
array_push($apuestas,$POST['apuesta2']);
array_push($apuestas,$POST['apuesta3']);
array_push($apuestas,$POST['apuesta4']);

$mesa=array("J1"=>,"J2"=>,"J3"=>,"J4"=>,"banca"=>);
function generarmesa($baraja){
shuffle($baraja);

$contpuntos=0;
do{
$carta=array_pop ( $baraja ) ;
$contpuntos=calcularpuntos($carta,$contpuntos);
}while($contpuntos==15);
}
function calcularpuntos($carta,$contpuntos){
	if ($carta= 14){
	
		if (($contpuntos +11) => 15){
			$contpuntos+11;
			
		}else {
			$contpuntos+1;}
	}else if($carta=>11||$carta<=13){
		$contpuntos+10;
	}else{$carta+$contpuntos;}
	
	return $contpuntos;
}

function modificarsaldos(){
	
	se busca en el archivo saldo.txt y se mete en un array el cual contendra el saldo de cada uno y modificara segun lo que han ganado o apostado
	fopen("saldo.txt");
	feof
	fwrite();
	}

function mostrarcartas($mesa){
foreach ($mesa as $carta) {
	$ruta="images/$carta.png";
echo "<img src='$ruta'>"; 
}echo "</br>";
}


array_push($mesa,generarmesa($baraja,$mesa));
$puntuaciones=array();
mostrarcartas($mesa["Mesa"]);



}else { echo "No todos los jugadores tienen el dinero suficiente para jugar";}

?>