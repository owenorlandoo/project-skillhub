<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function store(Request $request) {
        // Validasi Duplikasi
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

    public function destroy($id) {
        DB::table('enrollments')->where('id', $id)->delete();
        return back()->with('success', 'Pendaftaran dibatalkan');
    }
}
