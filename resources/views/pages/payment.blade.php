{{-- <x-app-layout>
    <h3>Pembayaran untuk Booking ID: {{ $booking->id }}</h3>
    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}');
        });
    </script>
</x-app-layout> --}}

{{-- <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Header -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-800">Detail Pembayaran</h2>
                </div>

                <!-- Invoice Content -->
                <div class="p-6">
                    <!-- Booking Info -->
                    <div class="mb-8">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Booking ID</h3>
                                <p class="text-lg font-semibold text-gray-800">{{ $booking->id }}</p>
                            </div>
                            <div class="text-right">
                                <h3 class="text-sm font-medium text-gray-500">Tanggal</h3>
                                <p class="text-lg text-gray-800">{{ now()->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pembayaran</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">Rp {{ number_format($booking->amount, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between border-t pt-3">
                                <span class="font-semibold">Total</span>
                                <span class="font-bold text-lg">Rp
                                    {{ number_format($booking->amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Button -->
                    <div class="text-center">
                        <button id="pay-button"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Midtrans Scripts -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}');
        });
    </script>
</x-app-layout> --}}


<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Header -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-800">Detail Pembayaran</h2>
                </div>

                <!-- Invoice Content -->
                <div class="p-6">
                    <!-- Booking Info -->
                    <div class="mb-8">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Booking ID</h3>
                                <p class="text-lg font-semibold text-gray-800">{{ $booking->order_id }}</p>
                            </div>
                            <div class="text-right">
                                <h3 class="text-sm font-medium text-gray-500">Tanggal</h3>
                                <p class="text-lg text-gray-800">{{ now()->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Details -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pelanggan</h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <dl class="space-y-3">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $booking->nama_lengkap }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $booking->nomor_telepon }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <div>
                                <dl class="space-y-3">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $booking->alamat }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Metode Pembayaran</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ strtoupper($booking->metode_pembayaran) }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Detail Pemesanan</h3>
                        <div class="bg-gray-50 rounded-lg overflow-hidden">
                            <div class="px-6 py-4">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500">Jadwal Check-in</h4>
                                        <p class="text-sm text-gray-900">{{ $booking->jadwalIn->jam }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500">Jadwal Check-out</h4>
                                        <p class="text-sm text-gray-900">{{ $booking->jadwalOut->jam }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h4 class="text-sm font-medium text-gray-500 mb-2">Produk</h4>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $booking->produk->nama }}</p>
                                        <p class="text-sm text-gray-500">{{ $booking->produk->deskripsi }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">
                                        Rp {{ number_format($booking->produk->harga, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pembayaran</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">Rp.
                                    {{ number_format($booking->produk->harga, 0, ',', '.') }}</span>
                            </div>
                            @if ($booking->produk->pajak)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">DP</span>
                                    <span class="font-medium">Rp.
                                        {{ number_format($booking->produk->harga, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between border-t pt-3">
                                <span class="font-semibold">Total (DP Wajib)</span>
                                <span class="font-bold text-lg">Rp.
                                    {{ number_format($booking->produk->harga / 2, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Status Pembayaran -->
                    <div class="mb-8">
                        <div
                            class="rounded-md {{ $booking->status === 'pending' ? 'bg-yellow-50' : ($booking->status === 'paid' ? 'bg-green-50' : 'bg-red-50') }} p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    @if ($booking->status === 'pending')
                                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @elseif($booking->status === 'paid')
                                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="ml-3">
                                    <h3
                                        class="text-sm font-medium 
                                        {{ $booking->status === 'pending'
                                            ? 'text-yellow-800'
                                            : ($booking->status === 'paid'
                                                ? 'text-green-800'
                                                : 'text-red-800') }}">
                                        Status Pembayaran: {{ ucfirst($booking->status) }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Button -->
                    @if ($booking->status === 'pending')
                        <div class="text-center">
                            <button id="pay-button"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-black bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Bayar Sekarang
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Midtrans Scripts -->
    @if ($booking->status === 'pending')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
        </script>
        <script type="text/javascript">
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                window.snap.pay('{{ $snapToken }}');
            });
        </script>
    @endif
</x-app-layout>
