<?php
namespace Anax\View;

?>

<form>
    IP-adress:<br>
    <input type="text" name="ipadress" value="<?= $userip ?>"><br>
    <input type="submit" name="submit" value="ipadress">
</form>
<p><?= $res ?></p>
<p>
<?php
if ($boolean == 1) {
    echo(gethostbyaddr($ipadress));
    ?>
<br>
    <?php
    echo("Typ: " . $result->{'type'} . " Land: " . $result->{'country_name'} . " Region: " . $result->{'region_name'});
    echo(" Latitud: " . $result->{'latitude'} . " Longitud:" . $result->{'longitude'});
}
?>

<br>
<a href="<?= url("jsoncontroller?ipadress=193.11.185.46") ?>">Testa adressen 193.11.185.46</a></br>
<a href="<?= url("jsoncontroller?ipadress=3ffe:1900:4545:3:200:f8ff:fe21:67cf") ?>">Testa adressen 3ffe:1900:4545:3:200:f8ff:fe21:67cf</a></br>

<h1>API</h1>
<p>Kontrollera IP-adress:</p>
<p>GET: htdocs/jsoncontroller?ipadress=255.255.255.255</p>
<p>inmatning: IP adresser(ipv4 och ipv6)</p>
