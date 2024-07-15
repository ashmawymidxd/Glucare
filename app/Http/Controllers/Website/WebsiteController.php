<?php
namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Monolog\Logger;
use Illuminate\Support\Facades\App;
use App\Models\PatientRatingDoctors;

class WebsiteController extends Controller
{
    private $logger;

    public function __construct()
    {
        $this->logger = App::make('customlogger');
    }

    public function index()
    {
        $doctorRatings = PatientRatingDoctors::get();
        $this->logger->info('Visited index page.');
        return view('Website.index',compact('doctorRatings'));
    }

    public function medicalInfo()
    {
        $this->logger->warning('Visited medical info page.');
        return view('Website.home.medicalinfo');
    }

    public function contact()
    {
        $this->logger->info('Visited contact page.');
        return view('Website.home.contact');
    }
}
