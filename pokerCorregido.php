<?php
$baraja=array("1P","1D","1T","1C","2P","2D","2T","2C","3P","3D","3T","3C","4P","4D","4T","4C","5P","5D","5T","5C","6P","6D","6T","6C","7P","7D","7T","7C","8P","8D","8T","8C","9P","9D","9T","9C","10P","10D","10T","10C","JP","JD","JT","JC","QP","QD","QT","QC","KP","KD","KT","KC");
$mesa=array();
function generarmesa($baraja){
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
$mesa=array("J1"=>$jugador1,"J2"=>$jugador2,"J3"=>$jugador3,"J4"=>$jugador4,"Mesa"=>$cartasmesa);
return $mesa;
}
/* anterior codigo

function buscarjugadas($jugador,$cartasmesa){
	//usamos dos variables porque no  puede tener más de dos parejas
	$acum=0;
	$cont=0; 
	$acum2=0;
	$cont2=0; 
	$puntuacion=0;
	$contjug=0;
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
			
	$cont2=$cont;
	$acum2=$acum;
			
	if($cont>=2||$cantcarta==5){

		if($cont2==11){
			$cont2="Sotas";
		}
		if($cont2==12){
			$cont2="Reinas";
		}
		if($cont2==13){
			$cont2="Reyes";
		}
		if($cont2==14){
			$cont2="ases";
		}
	if($acum2==4){
		echo "MejorJugada poker de".$cont2;
	

	}
	else if($acum2==3){
		echo "MejorJugada trio de ".$cont2;

	}
	else if($acum2==2){
		echo "MejorJugada pareja de".$cont2;
  
	}
	else if($acum2==1){
	echo "MejorJugada ".$mayor;

	}

	}
$acum=0;

}
//diferenciar numero y valor 


//return $puntuacion;
}*/
function buscarjugadas($jugador,$cartasmesa){
	//usamos dos variables porque no  puede tener más de dos parejas
	$acum=0;
	$cont=0;
	$puntuacion=0;
	$contjug=array();
	$arrayjugada=array();
	for($i=0;$i<2;$i++){
		
		array_push($arrayjugada,$jugador[$i]);		
		array_push($arrayjugada,$cartasmesa[$i]);
		if($i==1){
					array_push($arrayjugada,$cartasmesa[2]);
		}
		
		
	}
	

		
	foreach($arrayjugada as $carta){
		
	
	
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
	array_push($contjug,$num);
	}
	sort($contjug);
	$arraycont=array();
	foreach($contjug as $numero){
		for($i=0;$i<=4;$i++){
			
		if($contjug[$i]==$numero){
			$acum++;
		}
			
		
		}
	 $arraycont += [ $numero => $acum ];
	 $acum=0;
		}
			
	
	print_r($arraycont);
	
	

			
	/*if($cont>=2||$cantcarta==5){

		if($cont2==11){
			$cont2="Sotas";
		}
		if($cont2==12){
			$cont2="Reinas";
		}
		if($cont2==13){
			$cont2="Reyes";
		}
		if($cont2==14){
			$cont2="ases";
		}
		
	if($acum2==4){
		echo "MejorJugada poker de".$cont2;
	

	}
	else if($acum2==3){
		echo "MejorJugada trio de ".$cont2;

	}
	else if($acum2==2){
		echo "MejorJugada pareja de".$cont2;
  
	}
	else if($acum2==1){
	echo "MejorJugada ".$mayor;

	}*/

	}






function mostrarcartas($mesa){
foreach ($mesa as $carta) {
	$ruta="images/$carta.png";
echo "<img src='$ruta'>"; 
}echo "</br>";
}


function ganador($puntuaciones){
	$solo1=true;
	$solo2=true;
	$solo3=true;
	$solo4=true;
$puntjug1=$puntuaciones[0];
$puntjug2=$puntuaciones[1];
$puntjug3=$puntuaciones[2];
$puntjug4=$puntuaciones[3];

if($puntjug1>=15){
	$solo1=false;
}
if($puntjug2>=15){
	$solo2=false;
}
if($puntjug3>=15){
	$solo3=false;
}
if($puntjug4>=15){
	$solo4=false;
}
	

/*
	15pareja
	16trio
	17poker
	18full*/
}

$mesa=generarmesa($baraja,$mesa);
$puntuaciones=array();
mostrarcartas($mesa["Mesa"]);
for($i=1;$i<5;$i++){
//array_push(buscarjugadas($mesa[$i],$mesa[4]),$puntuaciones);
buscarjugadas($mesa["J$i"],$mesa["Mesa"]);
mostrarcartas($mesa["J$i"]);
}
//ganador($puntuaciones);
?>