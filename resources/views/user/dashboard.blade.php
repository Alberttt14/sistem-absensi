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
                    Dashboard User
                </h1>

                <p class="text-gray-500">
                    Selamat datang,
                    {{ auth()->user()->name }}
                </p>

            </div>

            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg">
                User
            </span>

        </div>

        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-gray-500 mb-4">
                    Absensi
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

            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-gray-500">
                    Status Hari Ini
                </h2>

                <p class="text-2xl font-bold text-green-600 mt-2">
                    Aktif
                </p>

            </div>

        </div>

        <div class="mt-8">

            <a href="{{ route('attendance.history') }}"
               class="bg-blue-600 text-white px-5 py-3 rounded-lg">

                Riwayat Absensi Saya

            </a>

        </div>

    </div>

</div>

</x-app-layout>