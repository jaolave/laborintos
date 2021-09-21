<?php

namespace App\Resources\NASA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Apod
{

    public function getByDateRange($start, $end)
    {
		$client = new Client();

		$queryParameters = [
            'api_key' => env('NASA_APOD_APIKEY'),
            'start_date' => $start,
            'end_date' => $end,
        ];

        $response = $client->request('GET', env('NASA_APOD_URL'), [
            'query' => $queryParameters,
            'verify'  => false,
        ]);

        return json_decode($response->getBody());

    }

    public function apiTest()
    {
        $client = new Client();
        $url = "https://api.nasa.gov/planetary/apod";

		$queryParameters = [
            'api_key' => 'DEMO_KEY',
            'start_date' => '2021-09-11',
            'end_date' => '2021-09-19',
        ];

        $response = $client->request('GET', $url, [
            'query' => $queryParameters,
            'verify'  => false,
        ]);

        return json_decode($response->getBody());
    }

}
