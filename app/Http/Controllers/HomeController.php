<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Http\Repositories\HomeRepository;

class HomeController extends Controller
{
    private $homeRepository;

    public function __construct(HomeRepository $homeRepository) {
        $this->middleware('auth');
        $this->homeRepository = $homeRepository;
    }

    function index() {
        $date =  new \DateTime();
        $currentDate = $date->format('Y-m-d');

        return view('home.index');
    }

    public function renderCalendar($events){
        $array = [];
        foreach ( $events as $event){
            array_push($array, [
                'title'=> $event->name,
                'details'=> $event->description,
                'place'=> $event->location,
                'start'=> $event->start_date,
                'finish'=> $event->end_date
            ]);
        }
        return $array;
    }

}
