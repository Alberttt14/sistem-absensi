<x-app-layout>

<div class="min-h-screen bg-gray-100 p-6">

    <div class="max-w-7xl mx-auto">

        <div class="flex items-center justify-between mb-6">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Riwayat Absensi
                </h1>

                <p class="text-gray-500 mt-1">
                    Daftar absensi yang telah dilakukan
                </p>
            </div>

            <a href="{{ route('attendance.export') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
                Export Excel
            </a>

        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Nama
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Jam Masuk
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Jam Pulang
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">

                    @foreach($attendances as $attendance)

                        <tr>
                            <td>{{ $attendance->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                            <td>{{ $attendance->check_in }}</td>
                            <td>{{ $attendance->check_out ? \Carbon\Carbon::parse($attendance->check_out)->format('H:i:s') : '-' }}</td>
                            <td>{{ $attendance->status }}</td>
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $attendances->links() }}

        </div>

    </div>

</div>

</x-app-layout>