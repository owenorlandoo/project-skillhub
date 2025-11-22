<!DOCTYPE html>
<html>
<head><title>Detail Peserta</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <div class="flex justify-between mb-6 border-b pb-4">
            <h1 class="text-2xl font-bold">Detail Peserta</h1>
            <a href="{{ route('home') }}" class="underline">Kembali</a>
        </div>
        <div class="mb-6 space-y-2">
            <p><strong>Nama:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
        </div>
        <h2 class="font-bold text-lg mb-2 bg-black text-white p-2 rounded">Kelas yang Diambil</h2>
        <table class="w-full border">
            <thead class="bg-gray-100"><tr><th class="p-2 text-left">Kelas</th><th class="p-2 text-left">Instruktur</th></tr></thead>
            <tbody>
                @foreach($student->courses as $c)
                <tr class="border-b"><td class="p-2">{{ $c->name }}</td><td class="p-2">{{ $c->instructor }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
