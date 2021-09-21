<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\NASA\Apod;

class ApodController extends Controller
{
    public function index()
    {
        $startDate = date('Y-m-d', strtotime(env('NASA_APOD_DAYS').' days'));
		$endDate = date('Y-m-d');
		$apods = new Apod;
		$apodsList = $apods->getByDateRange($startDate, $endDate);

		return response()->json($apodsList);

    }
}
