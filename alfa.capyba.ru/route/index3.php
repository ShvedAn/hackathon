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


<script type="text/javascript">
if(navigator.geolocation) {
navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
		//	alert(latitude+' '+longitude);
});
 
} else {
    alert("Geolocation API не поддерживается в вашем браузере");
}
</script>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<div id="map" style="width:450px;height:300px"></div>

<script type="text/javascript">
ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
        center: [53.22076683693211, 50.21076855293934],
                // center: [],
        zoom: 9,
        controls: []
    });
 
    // Создание экземпляра маршрута.
    var multiRoute = new ymaps.multiRouter.MultiRoute({   
        // Точки маршрута.
        // Обязательное поле. 
        referencePoints: [
            // 'Москва, метро Смоленская',
            // 'Москва, метро Арбатская',
[53.269080649966,50.475419674652],
[53.311714397477,50.249023869141],
[53.227300814833,50.255890324219],
[53.213443460737,50.182247593506],
[53.134076268877,50.069122746094],


// 53.269080649966,50.475419674652],
// 53.311714397477,50.249023869141],
// 53.227300814833,50.255890324219],
// 53.213443460737,50.182247593506],
// 53.134076268877,50.069122746094],
            // [55.734876, 37.59308], // улица Льва Толстого.
        ]
    }, {
      // Автоматически устанавливать границы карты так,
      // чтобы маршрут был виден целиком.
      boundsAutoApply: true
});

    // Добавление маршрута на карту.
    myMap.geoObjects.add(multiRoute);
});
</script>

<script type="text/javascript">







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

// оптимальный
 // [0]=>
 //  string(31) "53.269080649966,50.475419674652"
 //  [1]=>
 //  string(31) "53.311714397477,50.249023869141"
 //  [2]=>
 //  string(31) "53.227300814833,50.255890324219"
 //  [3]=>
 //  string(31) "53.213443460737,50.182247593506"
 //  [4]=>
 //  string(31) "53.134076268877,50.069122746094"

// тестовый
// string(31) "53.213443460737,50.182247593506"
// string(31) "53.134076268877,50.069122746094"
// string(31) "53.311714397477,50.249023869141"
// string(31) "53.227300814833,50.255890324219"



</script>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>