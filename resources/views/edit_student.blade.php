<!DOCTYPE html>
<html>
<head><title>Edit Peserta</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-100 p-8 flex justify-center">
    <div class="bg-white p-8 rounded shadow w-full max-w-md">
        <h1 class="text-xl font-bold mb-4">Edit Peserta</h1>
        <!-- UPDATE: route('student.update') -->
        <form action="{{ route('student.update', $student->id) }}" method="POST" class="space-y-4">
            @csrf
            <div><label>Nama</label><input type="text" name="name" value="{{ $student->name }}" class="w-full border p-2 rounded" required></div>
            <div><label>Email</label><input type="email" name="email" value="{{ $student->email }}" class="w-full border p-2 rounded" required></div>
            <div class="flex gap-2">
                <button class="bg-black text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('home') }}" class="bg-gray-200 px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
