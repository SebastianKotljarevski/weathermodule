Installationsguide till serbseb/weathermodule via composer

$composer require serbseb/weathermodule

rsync -av vendor/serbseb/weathermodule/config/di/keys.php config/di/
rsync -av vendor/serbseb/weathermodule/config/apikeys.php config/
rsync -av vendor/serbseb/weathermodule/src/Controller/* src/Controller/
rsync -av vendor/serbseb/weathermodule/src/Keys/Keys.php src/Keys/
rsync -av vendor/serbseb/weathermodule/view/anax/controllerWeather/* view/anax/controllerWeather
