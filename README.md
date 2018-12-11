[![Build Status](https://travis-ci.org/SebastianKotljarevski/weathermodule.svg?branch=master)](https://travis-ci.org/SebastianKotljarevski/weathermodule)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/SebastianKotljarevski/weathermodule/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/SebastianKotljarevski/weathermodule/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/SebastianKotljarevski/weathermodule/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/SebastianKotljarevski/weathermodule/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/SebastianKotljarevski/weathermodule/badges/build.png?b=master)](https://scrutinizer-ci.com/g/SebastianKotljarevski/weathermodule/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/SebastianKotljarevski/weathermodule/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Installationsguide till serbseb/weathermodule via composer

$composer require serbseb/weathermodule

rsync -av vendor/serbseb/weathermodule/config/di/keys.php config/di/
rsync -av vendor/serbseb/weathermodule/config/apikeys.php config/
rsync -av vendor/serbseb/weathermodule/src/Controller/* src/Controller/
rsync -av vendor/serbseb/weathermodule/src/Keys/Keys.php src/Keys/
rsync -av vendor/serbseb/weathermodule/view/anax/controllerWeather/* view/anax/controllerWeather
