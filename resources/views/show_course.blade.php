<!DOCTYPE html>
<html>
<head><title>Detail Kelas</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <div class="flex justify-between mb-6 border-b pb-4">
            <h1 class="text-2xl font-bold">Detail Kelas</h1>
            <a href="{{ route('home') }}" class="underline">Kembali</a>
        </div>
        <div class="mb-6 space-y-2">
            <p><strong>Kelas:</strong> {{ $course->name }}</p>
            <p><strong>Instruktur:</strong> {{ $course->instructor }}</p>
            <p><strong>Deskripsi:</strong> {{ $course->description ?? '-' }}</p>
        </div>
        <h2 class="font-bold text-lg mb-2 bg-black text-white p-2 rounded">Daftar Peserta</h2>
        <table class="w-full border">
            <thead class="bg-gray-100"><tr><th class="p-2 text-left">Nama</th><th class="p-2 text-left">Email</th></tr></thead>
            <tbody>
                @foreach($course->students as $s)
                <tr class="border-b"><td class="p-2">{{ $s->name }}</td><td class="p-2">{{ $s->email }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
