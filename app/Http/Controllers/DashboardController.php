<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $students = Student::all();
        $courses = Course::all();

        // Query history pendaftaran (Join Table)
        $enrollments = DB::table('enrollments')
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->select('enrollments.id', 'students.name as s_name', 'courses.name as c_name', 'courses.instructor')
            ->get();

        return view('skillhub', compact('students', 'courses', 'enrollments'));
    }
}
