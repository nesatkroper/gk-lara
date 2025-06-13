<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalStudents = 6;  //Student::count();
        $activeClasses =  4; //SchoolClass::count();
        $attendanceAlerts = 5; 
        $recentActivities = [
            ['description' => 'Added new student to Grade 10', 'time' => '2 hours ago'],
            ['description' => 'Scheduled Math class for Room 101', 'time' => 'Yesterday'],
            ['description' => 'Updated attendance for Grade 9', 'time' => '2 days ago'],
        ];

        return view('dashboard.index', compact('totalStudents', 'activeClasses', 'attendanceAlerts', 'recentActivities'));
    }
}
