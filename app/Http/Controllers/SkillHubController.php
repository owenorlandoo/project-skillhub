<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillHubController extends Controller
{
    // --- HALAMAN UTAMA (DASHBOARD) ---
    public function index() {
        $students = Student::all();
        $courses = Course::all();

        // Query manual untuk mengambil data pendaftaran (History)
        $enrollments = DB::table('enrollments')
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->select('enrollments.id', 'students.name as s_name', 'courses.name as c_name', 'courses.instructor')
            ->get();

        return view('skillhub', compact('students', 'courses', 'enrollments'));
    }

    // --- LOGIC PESERTA ---
    public function storeStudent(Request $request) {
        Student::create($request->all());
        return back()->with('success', 'Peserta berhasil ditambahkan');
    }

    public function editStudent($id) {
        $student = Student::find($id);
        return view('edit_student', compact('student'));
    }

    public function updateStudent(Request $request, $id) {
        Student::find($id)->update($request->all());
        return redirect()->route('home')->with('success', 'Data Peserta diperbarui!');
    }

    public function showStudent($id) {
        $student = Student::with('courses')->find($id); // Eager load relasi
        return view('show_student', compact('student'));
    }

    // --- LOGIC KELAS (COURSE) ---
    public function storeCourse(Request $request) {
        Course::create($request->all()); // Otomatis simpan description juga
        return back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function editCourse($id) {
        $course = Course::find($id);
        return view('edit_course', compact('course'));
    }

    public function updateCourse(Request $request, $id) {
        Course::find($id)->update($request->all());
        return redirect()->route('home')->with('success', 'Data Kelas diperbarui!');
    }

    public function showCourse($id) {
        $course = Course::with('students')->find($id);
        return view('show_course', compact('course'));
    }

    // --- LOGIC PENDAFTARAN (ENROLL) ---
    public function enroll(Request $request) {
        // Cek Duplikasi
        $exists = DB::table('enrollments')
            ->where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->exists();

        if ($exists) return back()->with('error', 'Peserta sudah terdaftar di kelas ini!');

        DB::table('enrollments')->insert([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'created_at' => now(), 'updated_at' => now()
        ]);

        return back()->with('success', 'Pendaftaran Berhasil!');
    }

    // --- LOGIC HAPUS (UNIVERSAL) ---
    public function destroy($type, $id) {
        if ($type == 'student') Student::destroy($id);
        elseif ($type == 'course') Course::destroy($id);
        elseif ($type == 'enrollment') DB::table('enrollments')->where('id', $id)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
