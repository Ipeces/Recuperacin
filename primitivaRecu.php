<?php
$Fecha=$_POST['fechasorteo'];
$rec=$_POST['recaudacion'];
$combinacion=$_POST['combinacion'];
$combinacionganadora = array();
function generarprimi($combinacionganadora){
for ($i = 0; $i <= 6; $i++){
$num=rand (  1 , 49 ) ;
$esta=true;
//comprobamos si el número ya está en el array
do{
if(in_array($num,$combinacionganadora)){
//el número se ha repetido
$num=rand (  1 , 49 ) ;
}else{
$esta=false;
}
}while($esta==true);
array_push($combinacionganadora,$num);
}
//metemos el reintegro
$rei=rand (  0 , 9 ) ;
array_push($combinacionganadora,$rei);

return $combinacionganadora;

}
//mostramos las imagenes de las bolas que han salido 
function Mostbola($combinacionganadora){

foreach ($combinacionganadora as $comb) {
	$ruta="imgbolas/$comb.png";
echo "<img src='$ruta'>"; 
}
}

//creamos el fichero con el premio
function recaudar($rec,$Fecha,$combinacionganadora){
$seAciertos= ($rec*40)/100;// 6 aciertos
$ccAciertos= ($rec*30)/100; //5 aciertos + complementario
 $cinAciertos=($rec*15)/100; //5 aciertos
$cuaAciertos= ($rec*5)/100; //4 aciertos
 $treAciertos=($rec*8)/100;//3 aciertos
 $reintegro= ($rec*2)/100;//reintegro 
$sorteo=fopen("premio/premiosorteo_$Fecha.txt","a");
  fwrite($sorteo,"Combinacion :");
foreach ($combinacionganadora as $comb) {
  fwrite($sorteo,$comb." ");
}
  fwrite($sorteo," ".PHP_EOL);
  fwrite($sorteo,"--------------------".PHP_EOL);
  fwrite($sorteo,"C6 # ".$seAciertos.PHP_EOL);
  fwrite($sorteo,"C5+ # ".$ccAciertos.PHP_EOL);
  fwrite($sorteo,"C5 # ".$cinAciertos.PHP_EOL);
  fwrite($sorteo,"C4 # ".$cuaAciertos.PHP_EOL);
  fwrite($sorteo,"C3 # ".$treAciertos.PHP_EOL);
 fwrite($sorteo,"CR # ".$reintegro.PHP_EOL);
fclose($sorteo);
}






function ganadores($combinacionganadora){

$fich="primitivaRecu.txt";
if (file_exists("$fich")){
	

$file = fopen("primitivaRecu.txt", "r");
//Lee línea a línea y escribela hasta el fin de fichero
$reintegro=0;
$seisaciertos=0;
$cincoaciertos=0;
$cincoaciertoscom=0;
$cuatroaciertos=0;
$tresaciertos=0;
$dosaciertos=0;
$unacierto=0;

$noaciertos=0;

while($linea = fgets($file)) {
    if (feof($file)) break;
   // echo $linea . "<br />";
$rein=0;
   $acum=0;
	$combinacionj=array();
for ($i = 0; $i <= 7;) {
	
	$pos = strpos($linea, "-",$acum);
	$pos2 = strpos($linea, "-",$pos+1);
	$cant = $pos2 -$pos;
	$num =substr($linea,$pos+1 ,$cant-1);
	if($i==7){
		if($combinacionganadora==$num){
			$com=true;
		}
	}else{
	array_push($combinacionj,$num);
	$acum=$pos+1;}
	if($i==7){
	//Meter el reintegro en el array del jugador
	/*$num =substr($linea,$acum,2);
		array_push($combinacionj,$num);
	*/
	$rein=substr($linea,$acum,2);
	}

$i++;

}
$result_array = array_intersect_assoc($combinacionganadora, $combinacionj);
	
	$p=sizeof($result_array);
	switch ($p) {
    case 0:
	if($rein==$combinacionganadora[7]){$reintegro++;}else{
	$noaciertos++;}
        break; 
	case 1:
	if($rein==$combinacionganadora[7]){$reintegro++;}else{
	$unacierto++;}
        break; 
	case 2:
	if($rein==$combinacionganadora[7]){$reintegro++;}else{
	$dosaciertos++;}
        break;		
	case 3:
       $tresaciertos++;
        break;
    case 4:
        $cuatroaciertos++;
        break;
    case 5:
	if($com==false){
        $cincoaciertos++;
	}else{		
		$cincoaciertoscom++;
	}break;
	case 6:
        $seisaciertos++;
        break;
}

}
fclose($file);
echo "premio seis aciertos: ".$seisaciertos."<br />";
echo "premio cinco aciertos y complementario: ".$cincoaciertoscom."<br />";
echo "premio cinco aciertos: ".$cincoaciertos."<br />";
echo "premio cuatro aciertos: ".$cuatroaciertos."<br />";
echo "premio tres aciertos: ".$tresaciertos."<br />";
echo "premio reintegro: ".$reintegro."<br />";
echo "sin premio dos aciertos: ".$dosaciertos."<br />";
echo "sin premio un acierto: ".$unacierto."<br />";
echo "sin premio ningun acierto: ".$noaciertos."<br />";

}else{
echo "No existe el archivo";
}
}
//cambiamos la fechas de aaddmm a ddmmaa
function cambiofecha($Fecha){
$fechafinal=0;
$posicion=0;

$posicion=strpos("$Fecha","-",$posicion);
$fechafinal =substr($Fecha,0,$posicion).$fechafinal;

$posicion=strpos("$Fecha","-",$posicion+1);

$fechafinal =substr($Fecha,$posicion,2).$fechafinal;
$posicion=strpos("$Fecha","-",$posicion+1);
$fechafinal =substr($Fecha,$posicion,2).$fechafinal;

echo $fechafinal."</br>";
}
//ejecutamos las funciones
$combinacionganadora=generarprimi($combinacionganadora);
Mostbola($combinacionganadora);
$fdma=$Fecha;
cambiofecha($Fecha);
recaudar($rec,$fdma,$combinacionganadora);
ganadores($combinacionganadora);
?>