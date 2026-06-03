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

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Dashboard Absensi
                </h1>

                <p class="text-gray-500 mt-2">
                    Selamat datang,
                    <strong>{{ auth()->user()->name }}</strong>
                </p>

            </div>

            <div class="mt-4 md:mt-0">

                @if(auth()->user()->role == 'admin')

                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-lg font-medium">
                        Admin
                    </span>

                @else

                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-medium">
                        User
                    </span>

                @endif

            </div>

        </div>

        <!-- Statistik -->
        <div class="grid md:grid-cols-3 gap-6">

            <!-- Total Karyawan -->
            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-gray-500">
                    Total Karyawan
                </h2>

                <p class="text-4xl font-bold mt-2 text-blue-600">
                    {{ $totalUsers }}
                </p>

            </div>

            <!-- Hadir Hari Ini -->
            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-gray-500">
                    Hadir Hari Ini
                </h2>

                <p class="text-4xl font-bold mt-2 text-green-600">
                    {{ $todayAttendance }}
                </p>

            </div>

            <!-- Aksi Cepat -->
            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-gray-500 mb-4">
                    Aksi Cepat
                </h2>

                <div class="flex flex-wrap gap-2">

                    <form action="{{ route('checkin') }}" method="POST">
                        @csrf

                        <button
                            type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                            Check In
                        </button>
                    </form>

                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf

                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                            Check Out
                        </button>
                    </form>

                </div>

            </div>

        </div>

        <!-- Menu -->
        <div class="flex flex-wrap gap-3 mt-8">

            <a href="{{ route('attendance.history') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow">
                Riwayat Absensi
            </a>

            @if(auth()->user()->role == 'admin')

            <a href="{{ route('attendance.export') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg shadow">
                Export Excel
            </a>

            @endif

        </div>

        <!-- Tabel Absensi Hari Ini -->
        <div class="mt-8 bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold text-gray-800 mb-4">
                Absensi Hari Ini
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b bg-gray-50">

                            <th class="text-left py-3 px-4">
                                Nama
                            </th>

                            <th class="text-left py-3 px-4">
                                Jam Masuk
                            </th>

                            <th class="text-left py-3 px-4">
                                Jam Pulang
                            </th>

                            <th class="text-left py-3 px-4">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($todayAttendances as $attendance)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="py-3 px-4">
                                {{ $attendance->user->name }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $attendance->check_in }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $attendance->check_out
                                    ? \Carbon\Carbon::parse($attendance->check_out)->format('H:i:s')
                                    : '-' }}
                            </td>

                            <td class="py-3 px-4">

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    {{ $attendance->status }}
                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="text-center py-6 text-gray-500">

                                Belum ada data absensi hari ini

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</x-app-layout>