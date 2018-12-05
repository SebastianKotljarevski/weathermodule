<?php
namespace Anax\View;

?>

<style>
      #map {
        width: 100%;
        height: 400px;
        background-color: gray;
      }
</style>

<form>
    Inmatning:<br>
    <input type="text" name="location"></input><br>
    <input type="submit" name="submit" value="location"></input>
</form>
<?php
echo($res);
?>


<h3>Karta</h3>
<!--The div element for the map -->
<div id="map"></div>

<?php
if ($bool == 1) {
    echo("Country: " . $location->{'country_name'} . " Region: " . $location->{'region_name'});
    for ($i=0; $i < 8; $i++) {
        $timestamp = $weatherForecast->{'daily'}->{'data'}[$i]->{'time'};
        ?>
        <div class="forecast">
        <h3><?= gmdate("Y-m-d", $timestamp); ?></h3>
        <?php

        echo($weatherForecast->{'daily'}->{'data'}[$i]->{'summary'});
        echo("Highest temperature: " . $weatherForecast->{'daily'}->{'data'}[$i]->{'apparentTemperatureHigh'} . "\n");
        echo("Lowest temperature: " . $weatherForecast->{'daily'}->{'data'}[$i]->{'apparentTemperatureLow'} . "\n")
        ?>
        </div>
    <br><br>
    <?php
    }
}?>

<script>
// Initialize and add the map
function initMap() {
    <?php
    if ($bool == 1) {
        ?>
        var user = {lat: <?= $weatherForecast->{'latitude'}; ?>,
                    lng: <?= $weatherForecast->{'longitude'}; ?>};
        <?php
    }
    ?>

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: user
    });

    var marker = new google.maps.Marker({
        position: user,
        map: map
    });
}
    </script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqYdCWvOY642luryNqSK8FI_9nStRiIuI&callback=initMap">
</script>

<a href="<?= url("jsonweathercontroller?location=193.11.185.121") ?>">Testa API med adressen 193.11.185.121</a></br>

<h1>API</h1>
<p>Kolla upp vädret med en IP-adress:</p>
<p>GET: htdocs/jsoncontroller?location=193.11.185.121</p>
<p>inmatning: IP adresser(ipv4 och ipv6)</p>
