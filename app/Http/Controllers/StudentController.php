<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request) {
        Student::create($request->all());
        return back()->with('success', 'Peserta berhasil ditambahkan');
    }

    public function edit($id) {
        $student = Student::find($id);
        return view('edit_student', compact('student'));
    }

    public function update(Request $request, $id) {
        Student::find($id)->update($request->all());
        return redirect()->route('home')->with('success', 'Data Peserta diperbarui!');
    }

    public function show($id) {
        $student = Student::with('courses')->find($id);
        return view('show_student', compact('student'));
    }

    public function destroy($id) {
        Student::destroy($id);
        return back()->with('success', 'Data Peserta dihapus');
    }
}
