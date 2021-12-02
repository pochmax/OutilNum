<?php
require('./vendor/autoload.php');
$client = new \GuzzleHttp\Client(['verify'=>false]);
$response = $client->request('GET', 'https://api-adresse.data.gouv.fr/search/', [
    'query'=>['q'=> 'iut de calais']
]);

echo $response->getStatusCode();
$test = "\n";
echo $test;// 200
//echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
$data = json_decode($response->getBody(), true); // '{"id": 1420053, "name": "guzzle", ...}'
foreach($data['features'] as $addr){
    echo sprintf(
        '%s(Lat: %s, Lng: %s)- score: %s',
        $addr['properties']['label'],
        $addr['properties']['x'],
        $addr['properties']['y'],
        $addr['properties']['score'],
    ).PHP_EOL;
}



