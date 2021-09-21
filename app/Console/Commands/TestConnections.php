<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
//use App\http\Controllers\ApodController;
use App\Resources\NASA\Apod;

class TestConnections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:testconnections';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realizar pruebas de conectividad a NASA Apod';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		$apods = new Apod;
		//dd($apods->apiTest());
		dd($apods->getByDateRange('2021-09-12','2021-09-20'));
		
		//$getApodDemo = new ApodController();
		//dd($getApodDemo->getByDateRange('2021-09-12','2021-09-20'));
		//$getApodDemo->index();
    }
}
