<?
// $array = array( 
// 	"53.213443460737,50.182247593506",
// 	"53.134076268877,50.069122746094",
// 	"53.311714397477,50.249023869141",
// 	"53.227300814833,50.255890324219"
// );

function routing($array){
foreach($array as $i => $value){
	// var_dump($i+1);
	// var_dump($value);
	$str .= '&destination'.($i+1).'='.($i+1).';'.$value;

}
$str .= '&mode=fastest;car&app_id=mY6PqAei96b7jBX5RRkD&app_code=54bazARtArlw11ZZi62Gog';
$str = 'https://wse.api.here.com/2/findsequence.json?start=sklad;53.269080649966,50.475419674652'.$str;
// var_dump($str);
// $ch = curl_init('https://wse.api.here.com/2/findsequence.json?start=sklad;53.269080649966,50.475419674652&destination1=1;53.213443460737,50.182247593506&destination2=2;53.134076268877,50.069122746094&destination3=3;53.311714397477,50.249023869141&destination4=4;53.227300814833,50.255890324219&mode=fastest;car&app_id=zdZd1GHEuwhLoa6my0x1&app_code=p2U4QF6ef2W32ngF3mFeQQ');
$ch = curl_init($str);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);

//  var_dump(json_decode($html)->results[0]->waypoints) ; 

$rout = json_decode($html)->results[0]->waypoints;
foreach ($rout as $value) {
	// var_dump($value->lat);
	$result[] = $value->lat.','.$value->lng;
}
// var_dump($result);
return($result);

}



  // [0]=>
  // string(31) "53.269080649966,50.475419674652"
  // [1]=>
  // string(31) "53.311714397477,50.249023869141"
  // [2]=>
  // string(31) "53.227300814833,50.255890324219"
  // [3]=>
  // string(31) "53.213443460737,50.182247593506"
  // [4]=>
  // string(31) "53.134076268877,50.069122746094"


// https://wse.api.here.com/2/findsequence.json
// ?start=sklad;53.269080649966,50.475419674652
// &destination1=1;53.213443460737,50.182247593506
// &destination2=2;53.134076268877,50.069122746094
// &destination3=3;53.311714397477,50.249023869141
// &destination4=4;53.227300814833,50.255890324219
// &mode=fastest;car
// &app_id=zdZd1GHEuwhLoa6my0x1
// &app_code=p2U4QF6ef2W32ngF3mFeQQ


?>