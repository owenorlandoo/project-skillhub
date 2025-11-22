<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillHub Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-4 md:p-8 text-gray-800">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200">
        <div class="flex justify-between items-center mb-6 border-b-2 border-black pb-4">
            <div>
                <h1 class="text-3xl font-extrabold">SKILLHUB</h1>
                <p class="text-gray-500 text-sm">Sistem Manajemen Pelatihan</p>
            </div>
        </div>
        <!--NOTIF -->
        @if(session('success')) <div class="bg-green-100 text-green-800 p-3 rounded mb-4 border-l-4 border-green-600 font-bold">{{ session('success') }}</div> @endif
        @if(session('error')) <div class="bg-red-100 text-red-800 p-3 rounded mb-4 border-l-4 border-red-600 font-bold">{{ session('error') }}</div> @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="space-y-8">

                <!--DATA PESERTA -->
                <div class="bg-gray-50 p-4 rounded border">
                    <h2 class="font-bold text-lg mb-3 flex items-center gap-2">
                        <span class="bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">1</span> Data Peserta
                    </h2>
                    <form action="{{ route('store.student') }}" method="POST" class="flex gap-2 mb-4">
                        @csrf
                        <div class="flex-1 space-y-2">
                            <input type="text" name="name" placeholder="Nama Lengkap" required class="w-full border p-2 rounded text-sm">
                            <input type="email" name="email" placeholder="Email" required class="w-full border p-2 rounded text-sm">
                        </div>
                        <button class="bg-black text-white px-4 rounded font-bold hover:bg-gray-800">+</button>
                    </form>

                    <!-- Tabel Peserta -->
                    <div class="overflow-auto h-48 bg-white border rounded">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-200 sticky top-0"><tr><th class="p-2">Nama</th><th class="p-2 text-center">Aksi</th></tr></thead>
                            <tbody>
                                @foreach($students as $s)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-2">{{ $s->name }}</td>
                                    <td class="p-2 text-center flex justify-center gap-1">
                                        <a href="{{ route('show.student', $s->id) }}" class="text-green-600 font-bold text-xs border border-green-200 px-2 py-1 rounded">Detail</a>
                                        <a href="{{ route('edit.student', $s->id) }}" class="text-blue-600 font-bold text-xs border border-blue-200 px-2 py-1 rounded">Edit</a>
                                        <a href="{{ route('delete', ['type'=>'student', 'id'=>$s->id]) }}" onclick="return confirm('Hapus?')" class="text-red-600 font-bold text-xs border border-red-200 px-2 py-1 rounded">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- DATA KELAS -->
                <div class="bg-gray-50 p-4 rounded border">
                    <h2 class="font-bold text-lg mb-3 flex items-center gap-2">
                        <span class="bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">2</span> Data Kelas
                    </h2>
                    <form action="{{ route('store.course') }}" method="POST" class="flex flex-col gap-2 mb-4">
                        @csrf
                        <div class="flex gap-2">
                            <input type="text" name="name" placeholder="Nama Kelas" required class="flex-1 border p-2 rounded text-sm">
                            <input type="text" name="instructor" placeholder="Instruktur" required class="flex-1 border p-2 rounded text-sm">
                        </div>
                        <textarea name="description" placeholder="Deskripsi Singkat" class="w-full border p-2 rounded text-sm" rows="2"></textarea>
                        <button class="bg-black text-white py-2 rounded font-bold hover:bg-gray-800 w-full">TAMBAH KELAS</button>
                    </form>

                    <!-- Tabel Kelas -->
                    <div class="overflow-auto h-48 bg-white border rounded">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-200 sticky top-0"><tr><th class="p-2">Kelas</th><th class="p-2 text-center">Aksi</th></tr></thead>
                            <tbody>
                                @foreach($courses as $c)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-2 font-bold">{{ $c->name }}</td>
                                    <td class="p-2 text-center flex justify-center gap-1">
                                        <a href="{{ route('show.course', $c->id) }}" class="text-green-600 font-bold text-xs border border-green-200 px-2 py-1 rounded">Detail</a>
                                        <a href="{{ route('edit.course', $c->id) }}" class="text-blue-600 font-bold text-xs border border-blue-200 px-2 py-1 rounded">Edit</a>
                                        <a href="{{ route('delete', ['type'=>'course', 'id'=>$c->id]) }}" onclick="return confirm('Hapus?')" class="text-red-600 font-bold text-xs border border-red-200 px-2 py-1 rounded">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- PENDAFTARAN -->
            <div class="space-y-8">
                <div class="bg-gray-900 text-white p-6 rounded-lg shadow-lg">
                    <h2 class="font-bold text-xl mb-4 flex items-center gap-2">
                        <span class="bg-white text-black w-6 h-6 rounded-full flex items-center justify-center text-xs">3</span> Pendaftaran
                    </h2>
                    <form action="{{ route('enroll') }}" method="POST" class="space-y-4">
                        @csrf
                        <select name="student_id" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white">
                            <option value="">-- Pilih Peserta --</option>
                            @foreach($students as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
                        </select>
                        <select name="course_id" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($courses as $c) <option value="{{ $c->id }}">{{ $c->name }}</option> @endforeach
                        </select>
                        <button class="w-full bg-white text-black font-bold py-2 rounded hover:bg-gray-200">DAFTARKAN</button>
                    </form>
                </div>

                <div class="bg-white border p-4 rounded shadow-sm">
                    <h3 class="font-bold mb-2">Riwayat Pendaftaran</h3>
                    <div class="overflow-auto h-64 border rounded">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-100 sticky top-0"><tr><th class="p-2">Nama</th><th class="p-2">Kelas</th><th class="p-2">Opsi</th></tr></thead>
                            <tbody>
                                @foreach($enrollments as $e)
                                <tr class="border-b">
                                    <td class="p-2">{{ $e->s_name }}</td>
                                    <td class="p-2 font-bold">{{ $e->c_name }}</td>
                                    <td class="p-2 text-center"><a href="{{ route('delete', ['type'=>'enrollment', 'id'=>$e->id]) }}" onclick="return confirm('Batal?')" class="text-red-500 font-bold">X</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
