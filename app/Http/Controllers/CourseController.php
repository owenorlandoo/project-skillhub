<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function store(Request $request) {
        Course::create($request->all());
        return back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit($id) {
        $course = Course::find($id);
        return view('edit_course', compact('course'));
    }

    public function update(Request $request, $id) {
        Course::find($id)->update($request->all());
        return redirect()->route('home')->with('success', 'Data Kelas diperbarui!');
    }

    public function show($id) {
        $course = Course::with('students')->find($id);
        return view('show_course', compact('course'));
    }

    public function destroy($id) {
        Course::destroy($id);
        return back()->with('success', 'Data Kelas dihapus');
    }
}
