<x-app-layout>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session("success") }}'
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: '{{ session("error") }}'
});
</script>
@endif

<div class="min-h-screen bg-gray-100">

    <div class="max-w-7xl mx-auto py-8 px-4">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold">
                    Dashboard Admin
                </h1>

                <p class="text-gray-500">
                    Selamat datang,
                    {{ auth()->user()->name }}
                </p>

            </div>

            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-lg">
                Administrator
            </span>

        </div>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-gray-500">
                    Total Karyawan
                </h2>

                <p class="text-4xl font-bold text-blue-600 mt-2">
                    {{ $totalUsers }}
                </p>

            </div>

            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-gray-500">
                    Hadir Hari Ini
                </h2>

                <p class="text-4xl font-bold text-green-600 mt-2">
                    {{ $todayAttendance }}
                </p>

            </div>

            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-gray-500 mb-4">
                    Aksi Cepat
                </h2>

                <div class="flex flex-wrap gap-2">

                    <form action="{{ route('checkin') }}" method="POST">
                        @csrf
                        <button class="bg-green-600 text-white px-4 py-2 rounded-lg">
                            Check In
                        </button>
                    </form>

                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button class="bg-red-600 text-white px-4 py-2 rounded-lg">
                            Check Out
                        </button>
                    </form>

                </div>

            </div>

        </div>

        <div class="flex flex-wrap gap-3 mt-8">

            <a href="{{ route('attendance.history') }}"
               class="bg-blue-600 text-white px-5 py-3 rounded-lg">

                Riwayat Absensi

            </a>

            <a href="{{ route('attendance.export') }}"
               class="bg-green-600 text-white px-5 py-3 rounded-lg">

                Export Excel

            </a>

            <a href="{{ route('employees.index') }}"
               class="bg-purple-600 text-white px-5 py-3 rounded-lg">

                Data Karyawan

            </a>

        </div>

        <div class="mt-8 bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold mb-4">
                Semua Absensi Hari Ini
            </h2>

            <table class="w-full">

                <thead>

                    <tr class="bg-gray-50 border-b">

                        <th class="text-left p-3">Nama</th>
                        <th class="text-left p-3">Masuk</th>
                        <th class="text-left p-3">Pulang</th>
                        <th class="text-left p-3">Status</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($todayAttendances as $attendance)

                    <tr class="border-b">

                        <td class="p-3">
                            {{ $attendance->user->name }}
                        </td>

                        <td class="p-3">
                            {{ $attendance->check_in }}
                        </td>

                        <td class="p-3">
                            {{ $attendance->check_out ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $attendance->status }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>