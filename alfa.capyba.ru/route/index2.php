<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Маршрут");
?>
<pre>
<?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()){ 
 //$arFields = $ob->GetFields();  
print_r($arFields);
 $arProps = $ob->GetProperties();
//var_dump($arProps);
var_dump($arProps['COORDINATE']['VALUE']);
}
?> 
</pre>





 <script src="http://js.api.here.com/v3/3.0/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
  <script src="http://js.api.here.com/v3/3.0/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>

   <div style="width: 640px; height: 480px" id="mapContainer"></div>

<script type="text/javascript">
	// Instantiate a map and platform object:
var platform = new H.service.Platform({
    'app_id': 'zdZd1GHEuwhLoa6my0x1',
    'app_code': 'p2U4QF6ef2W32ngF3mFeQQ'
});

var routingParameters = {
  // The routing mode:
  'mode': 'fastest;car',
  'waypoint0': 'geo!53.269080649966,50.475419674652',
  'waypoint1': 'geo!53.311714397477,50.249023869141',
  'waypoint2': 'geo!53.227300814833,50.255890324219',
  'waypoint3': 'geo!53.213443460737,50.182247593506',
  'waypoint4': 'geo!53.134076268877,50.069122746094',

  'representation': 'display'
};




</script>

    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css" />
    <link rel="stylesheet" type="text/css" href="demo.css" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" type="text/css" href="../template.css" />
    <script type="text/javascript" src='../test-credentials.js'></script>

    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
    <style type="text/css">
      .directions li span.arrow {
        display:inline-block;
        min-width:28px;
        min-height:28px;
        background-position:0px;
        background-image: url("./img/arrows.png");
        position:relative;
        top:8px;
      }
      .directions li span.depart  {
        background-position:-28px;
      }
      .directions li span.rightUTurn  {
        background-position:-56px;
      }
      .directions li span.leftUTurn  {
        background-position:-84px;
      }
      .directions li span.rightFork  {
        background-position:-112px;
      }
      .directions li span.leftFork  {
        background-position:-140px;
      }
      .directions li span.rightMerge  {
        background-position:-112px;
      }
      .directions li span.leftMerge  {
        background-position:-140px;
      }
      .directions li span.slightRightTurn  {
        background-position:-168px;
      }
      .directions li span.slightLeftTurn{
        background-position:-196px;
      }
      .directions li span.rightTurn  {
        background-position:-224px;
      }
      .directions li span.leftTurn{
        background-position:-252px;
      }
      .directions li span.sharpRightTurn  {
        background-position:-280px;
      }
      .directions li span.sharpLeftTurn{
        background-position:-308px;
      }
      .directions li span.rightRoundaboutExit1 {
        background-position:-616px;
      }
      .directions li span.rightRoundaboutExit2 {
        background-position:-644px;
      }
      
      .directions li span.rightRoundaboutExit3 {
        background-position:-672px;
      }
      
      .directions li span.rightRoundaboutExit4 {
        background-position:-700px;
      }
      
      .directions li span.rightRoundaboutPass {
        background-position:-700px;
      }
      
      .directions li span.rightRoundaboutExit5 {
        background-position:-728px;
      }
      .directions li span.rightRoundaboutExit6 {
        background-position:-756px;
      }
      .directions li span.rightRoundaboutExit7 {
        background-position:-784px;
      }
      .directions li span.rightRoundaboutExit8 {
        background-position:-812px;
      }
      .directions li span.rightRoundaboutExit9 {
        background-position:-840px;
      }
      .directions li span.rightRoundaboutExit10 {
        background-position:-868px;
      }
      .directions li span.rightRoundaboutExit11 {
        background-position:896px;
      }
      .directions li span.rightRoundaboutExit12 {
        background-position:924px;
      }
      .directions li span.leftRoundaboutExit1  {
        background-position:-952px;
      }
      .directions li span.leftRoundaboutExit2  {
        background-position:-980px;
      }
      .directions li span.leftRoundaboutExit3  {
        background-position:-1008px;
      }
      .directions li span.leftRoundaboutExit4  {
        background-position:-1036px;
      }
      .directions li span.leftRoundaboutPass {
        background-position:1036px;
      }
      .directions li span.leftRoundaboutExit5  {
        background-position:-1064px;
      }
      .directions li span.leftRoundaboutExit6  {
        background-position:-1092px;
      }
      .directions li span.leftRoundaboutExit7  {
        background-position:-1120px;
      }
      .directions li span.leftRoundaboutExit8  {
        background-position:-1148px;
      }
      .directions li span.leftRoundaboutExit9  {
        background-position:-1176px;
      }
      .directions li span.leftRoundaboutExit10  {
        background-position:-1204px;
      }
      .directions li span.leftRoundaboutExit11  {
        background-position:-1232px;
      }
      .directions li span.leftRoundaboutExit12  {
        background-position:-1260px;
      }
      .directions li span.arrive  {
        background-position:-1288px;
      }
      .directions li span.leftRamp  {
        background-position:-392px;
      }
      .directions li span.rightRamp  {
        background-position:-420px;
      }
      .directions li span.leftExit  {
        background-position:-448px;
      }
      .directions li span.rightExit  {
        background-position:-476px;
      }
      .directions li span.ferry  {
        background-position:-1316px;
      }
      </style>
  <script type="text/javascript" src='../js-examples-rendering-helpers/iframe-height.js'></script></head>
  <body id="markers-on-the-map">

    <div class="page-header">
        <h1>Map with Pedestrian Route from A to B</h1>
        <p>Request a walking route from A to B and display it on the map.</p>
    </div>
    <p>This example calculates a walking route from <b>St Paul's Cathedral</b> in London <i>(51.5141°N, 0.0999°W)</i> to the <b>Tate Modern</b>
      <i>(51.5081°N, 0.0985°W)</i> on the south bank of the River Thames using pedestrian routing and displays it on the map. The 
      calculation finds the shortest available walking route, which in this case directs the user to use the pedestrian only Millennium Footbridge.</p>
    <div id="map"></div>
    <div id="panel"></div>
    <h3>Code</h3>
    <p>Access to the routing service is obtained from the <code>H.service.Platform</code> by calling 
      <code>getRoutingService()</code>. The <code>calculateRoute()</code> method is used to calculate the shortest  
      pedestrian (<code>mode:shortest;pedestrian</code>) route by passing in the relevant parameters as defined in 
      <a href="http://developer.here.com/rest-apis/documentation/routing/topics/resource-calculate-route.html" target="_blank">Routing API</a>. 
      The styling and display of the response is under the control of the developer.</p>
    <script type="text/javascript" src='demo.js'></script>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>