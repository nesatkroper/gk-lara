<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $attendanceSummary = Student::all()->map(function ($student) {
            return [
                'name' => $student->name,
                'grade' => $student->grade,
                'attendance_percentage' => rand(70, 100), 
            ];
        });

        // Class enrollment statistics
        $classEnrollments = SchoolClass::all()->map(function ($class) {
            return [
                'name' => $class->name,
                'room' => $class->room,
                'student_count' => rand(15, 30), 
            ];
        });

        return view('reports.index', compact('attendanceSummary', 'classEnrollments'));
    }
}
