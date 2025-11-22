<!DOCTYPE html>
<html>
<head><title>Edit Kelas</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-100 p-8 flex justify-center">
    <div class="bg-white p-8 rounded shadow w-full max-w-md">
        <h1 class="text-xl font-bold mb-4">Edit Kelas</h1>
        <form action="{{ route('update.course', $course->id) }}" method="POST" class="space-y-4">
            @csrf
            <div><label>Nama Kelas</label><input type="text" name="name" value="{{ $course->name }}" class="w-full border p-2 rounded" required></div>
            <div><label>Instruktur</label><input type="text" name="instructor" value="{{ $course->instructor }}" class="w-full border p-2 rounded" required></div>
            <div><label>Deskripsi</label><textarea name="description" class="w-full border p-2 rounded" rows="3">{{ $course->description }}</textarea></div>
            <div class="flex gap-2">
                <button class="bg-black text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('home') }}" class="bg-gray-200 px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
