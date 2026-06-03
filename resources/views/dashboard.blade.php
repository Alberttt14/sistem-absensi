<x-app-layout>

<div class="min-h-screen bg-gray-100">

    <div class="max-w-7xl mx-auto py-8 px-4">

        <h1 class="text-3xl font-bold mb-6">
            Dashboard Absensi
        </h1>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-gray-500">
                    Total Karyawan
                </h2>

                <p class="text-4xl font-bold mt-2">
                    {{ $totalUsers }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-gray-500">
                    Hadir Hari Ini
                </h2>

                <p class="text-4xl font-bold mt-2">
                    {{ $todayAttendance }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-gray-500">
                    Aksi Cepat
                </h2>

                <div class="mt-4 flex gap-2">

                    <form action="{{ route('checkin') }}" method="POST">
                        @csrf

                        <button
                            class="bg-green-600 text-white px-4 py-2 rounded-lg">
                            Check In
                        </button>
                    </form>

                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf

                        <button
                            class="bg-red-600 text-white px-4 py-2 rounded-lg">
                            Check Out
                        </button>
                    </form>

                </div>
            </div>

        </div>

        <div class="mt-8">

            <a href="{{ route('attendance.history') }}"
               class="bg-blue-600 text-white px-5 py-3 rounded-lg">
                Lihat Riwayat Absensi
            </a>

        </div>

    </div>

</div>

</x-app-layout>