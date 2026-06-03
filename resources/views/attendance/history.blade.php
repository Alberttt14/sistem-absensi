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

                    @forelse($attendances as $attendance)

                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4">
                            {{ $attendance->date }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $attendance->check_in }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $attendance->check_out ?? '-' }}
                        </td>

                        <td class="px-6 py-4">

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                {{ $attendance->status }}
                            </span>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="text-center py-8 text-gray-500">

                            Belum ada data absensi

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $attendances->links() }}

        </div>

    </div>

</div>

</x-app-layout>