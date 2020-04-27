<?php
$baraja=array("1P","1D","1T","1C","2P","2D","2T","2C","3P","3D","3T","3C","4P","4D","4T","4C","5P","5D","5T","5C","6P","6D","6T","6C","7P","7D","7T","7C","8P","8D","8T","8C","9P","9D","9T","9C","10P","10D","10T","10C","JP","JD","JT","JC","QP","QD","QT","QC","KP","KD","KT","KC");
$mesa=array();
function generarmesa($baraja,$mesa){
$jugador1=array();
$jugador2=array();
$jugador3=array();
$jugador4=array();
$cartasmesa=array();
shuffle($baraja);
//creamos los jugadores y la mesa y le asignamos las cartas correspondientes
array_push($jugador1,array_pop ( $baraja )) ;
array_push($jugador1,array_pop ( $baraja )) ;
array_push($jugador2,array_pop ( $baraja )) ;
array_push($jugador2,array_pop ( $baraja )) ;
array_push($jugador3,array_pop ( $baraja )) ;
array_push($jugador3,array_pop ( $baraja )) ;
array_push($jugador4,array_pop ( $baraja )) ;
array_push($jugador4,array_pop ( $baraja )) ;
array_push($cartasmesa,array_pop ( $baraja )) ;
array_push($cartasmesa,array_pop ( $baraja )) ;
array_push($cartasmesa,array_pop ( $baraja )) ;
array_push($mesa,$jugador1);
array_push($mesa,$jugador2);
array_push($mesa,$jugador3);
array_push($mesa,$jugador4);
array_push($mesa,$cartasmesa);
return $mesa;
}

function buscarjugadas($jugador,$cartasmesa){
	//usamos dos variables para cada carta
	$acum=0;
	$cont=0; 
	$acum2=0;
	$cont2=0; 
	$acum3=0;
	$cont3=0; 
	$acum4=0;
	$cont4=0; 
	$acum5=0;
	$cont5=0; 
	
	$arrayjugada=array();
	for($i=0;$i<2;$i++){
		
		array_push($arrayjugada,$jugador[$i]);		
		array_push($arrayjugada,$cartasmesa[$i]);
		if($i==1){
					array_push($arrayjugada,$cartasmesa[2]);
		}
		
		
	}
	
	$mayor=0;
	$cantcarta=0;
		$X=0;
	foreach($arrayjugada as $carta){
	
	
		$cantcarta++;
		$num = substr($carta, 0, -1); 
		
	
		if($num=="J"){
			$num=11;
		}
		if($num=="Q"){
			$num=12;
		}
		if($num=="K"){
			$num=13;
		}
		if($num==1){
			$num=14;
		}
		if($num>$mayor){
			$mayor=$num;
		}
	
	
	
	
	
			$cont=$num;
	
	
	for($i=0;$i<=4;$i++){
		//	echo $arrayjugada[$i]."- -";
			//	echo " ".$cont."--";
		if($cont==substr($arrayjugada[$i], 0, -1) ){
			$acum++;
			//echo $arrayjugada[$i]."-";
			
		
		}
		}
			
	if($X==3){
		
	$cont5=$cont;
	$acum5=$acum;
		$acum=0;

	}
	else if($X==2){
		
	$cont4=$cont;
	$acum4=$acum;
$acum=0;
	}
	else if($X==1){
	$cont3=$cont;
	$acum3=$acum;
$acum=0;
	}
	else if($X==0){
	$cont2=$cont;
	$acum2=$acum;
$acum=0;	}
$X++;	}
//diferenciar numero y valor 
	echo "hola".$acum;
	echo $acum2;
	echo$cont2;
	if($acum2==4){
		echo "MejorJugada poker de".$cont2;
		$acum=0;

	}
	else if($acum2==3){
		echo "MejorJugada trio de ".$cont2;
$acum=0;
	}
	else if($acum2==2){
		echo "MejorJugada pareja de".$cont2;
$acum=0;
	}
	else if($acum2==1){
	echo "MejorJugada ".$mayor;
	$acum=0;
	}
}
function mostrarcartas($mesa){
foreach ($mesa as $carta) {
	$ruta="images/$carta.png";
echo "<img src='$ruta'>"; 
}echo "</br>";
}

function mostrarjugada(){}
function ganador(){}

$mesa=generarmesa($baraja,$mesa);

mostrarcartas($mesa[4]);
for($i=0;$i<4;$i++){
buscarjugadas($mesa[$i],$mesa[4]);
mostrarcartas($mesa[$i]);
}

?>