<?
include"system/config.inc.php";
include"system/web_config.php";
$sql_title="select  *  from  tb_job where job_id=$_GET[id]";
$result_title = mysql_query($sql_title) or die (mysql_error());
$row_la= mysql_fetch_array($result_title);
$latitude=$row_la[latitude];
$longitude=$row_la[longitude];
$zoom=$row_la[zoom];
$place_tutor=$row_la[place_tutor];
$subject_name=$row_la[subject_name];

?>
<!DOCTYPE html>
<html>
  <head>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=true&language=th&region=TH"></script>

    <script>
      function initWithMapStart() {
        var latlng = new google.maps.LatLng(<?=$latitude;?>, <?=$longitude;?>);
        var mapOptions = {
                            zoom: <?=$zoom;?>,
                            center: latlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
        var maps = new google.maps.Map( 
                         document.getElementById('map-canvas'), 
                         mapOptions
                   );

        var marker = new google.maps.Marker({
                            position: latlng,
                            map: maps,
                            animation: google.maps.Animation.DROP,
                            title: "<?=$subject_name;?>"
                        });

		var info = new google.maps.InfoWindow({
							content: '<?=$place_tutor;?>'
						});
		google.maps.event.addListener(marker, 'click', function(){
			info.open(maps, marker);
		})
      }
    </script>

    <style>
      header,
      footer {
        text-align: center;
      }
      #map-canvas {
        display: block;
        margin: 20px auto;
        height: 400px;
        width: 640px;
        background-color: #ccc;
      }
    </style>
  </head>
  <body onload="initWithMapStart()">
    <article>
      <div id="map-canvas"></div>
    </article>
  </body>
</html>
