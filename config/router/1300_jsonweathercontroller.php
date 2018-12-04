<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Json Weather controller.",
            "mount" => "jsonweathercontroller",
            "handler" => "\Anax\Controller\JsonWeatherController",
        ],
    ]
];
