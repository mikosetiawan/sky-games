<style>
    .icon-menu {
        width: 100px;
    }

    .box-menu {
        border-radius: 100px;
        width: 100px;
        box-shadow: 1px 2px 17px -7px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 1px 2px 17px -7px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 1px 2px 17px -7px rgba(0, 0, 0, 0.75);
    }
</style>

<x-app-layout title="dashboard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- {{ __("You're logged in!") }} --}
                    {{-- Form input mode --}}
                    <div class="container px-3 py-3">
                        <div class="text-center fw-bold my-4">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Menu</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">

                            {{-- Add produk/games --}}
                            <div class="col-lg-3 my-3">
                                <a href="#" x-data @click="$dispatch('open-modal', 'addProductModal')"
                                    class="justify-content-center d-flex">
                                    <div class="box-menu justify-content-center d-flex">
                                        <img class="icon-menu" src="{{ asset('media/produk.png') }}" alt="">
                                    </div>
                                    <div class="mb-3 my-3 mx-3">
                                        <h5>Form Tambah Produk</h5>
                                    </div>
                                </a>
                            </div>

                            {{-- Add jadwal-games --}}
                            <div class="col-lg-3 my-3">
                                <a href="#" x-data @click="$dispatch('open-modal', 'addJadwalModal')"
                                    class="justify-content-center d-flex">
                                    <div class="box-menu justify-content-center d-flex">
                                        <img class="icon-menu" src="{{ asset('media/jual.png') }}" alt="">
                                    </div>
                                    <div class="mb-3 my-3 mx-3">
                                        <h5>Form Tambah Jadwal</h5>
                                    </div>
                                </a>
                            </div>

                            {{-- Check riwata transaksi --}}
                            <div class="col-lg-3 my-3">
                                <a href="#" x-data @click="$dispatch('open-modal', 'addRiwayatModal')"
                                    class="justify-content-center d-flex">
                                    <div class="box-menu justify-content-center d-flex">
                                        <img class="icon-menu" src="{{ asset('media/riwayat.png') }}" alt="">
                                    </div>
                                    <div class="mb-3 my-3 mx-3">
                                        <h5>Riwayat Booking</h5>
                                    </div>
                                </a>
                            </div>

                        </div>

                        {{-- MODAL POP UP --}}
                        
                        <!-- Modal Produk -->
                        <x-modal name="addProductModal" :show="false" maxWidth="lg">
                            <h2 class="text-lg font-semibold mb-3 px-3 py-3">Tambah Produk</h2>
                            <form action="{{ route('dashboard.store_produk') }}" method="POST"
                                enctype="multipart/form-data" class="px-3 py-3">
                                @csrf <!-- Don't forget to include CSRF token -->
                                <div class="mb-4">
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama
                                        Produk</label>
                                    <input type="text" id="nama" name="nama"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        placeholder="Nama Games" required>
                                </div>
                                <div class="mb-4">
                                    <label for="jenis_ps" class="block text-sm font-medium text-gray-700">Jenis
                                        PS</label>
                                    <select id="jenis_ps" name="jenis_ps"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                        <option value="" selected disabled>- Pilih -</option>
                                        <option value="ps1">PS1</option>
                                        <option value="ps2">PS2</option>
                                        <option value="ps3">PS3</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga
                                        Produk</label>
                                    <input type="number" id="harga" name="harga"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        placeholder="Per/Sewa/jam" required>
                                </div>
                                <div class="mb-4">
                                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto
                                        Produk</label>
                                    <input type="file" id="foto" name="foto"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button type="button" @click="$dispatch('close-modal', 'addProductModal')"
                                        class="btn btn-secondary">Batal</button>
                                    <button type="submit" class="btn btn-primary ml-2 mx-2">Simpan</button>
                                </div>
                            </form>
                        </x-modal> {{-- Add produk --}}

                        <x-modal name="addJadwalModal" :show="false" maxWidth="lg">
                            <h2 class="text-lg font-semibold mb-3 px-3 py-3">Tambah Jadwal</h2>
                            <form action="{{ route('dashboard.store_jadwal') }}" method="POST" class="px-3 py-3"
                                id="jadwalForm">
                                @csrf <!-- Don't forget to include CSRF token -->

                                <div class="container my-3">
                                    <div id="tanggal-container">
                                        <label for="tanggal"
                                            class="block text-sm font-medium text-gray-700">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal[]"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                            required>
                                    </div>
                                    <button type="button" id="add-tanggal" class="btn btn-primary mt-2">Tambah
                                        Tanggal</button>
                                </div>

                                <div class="mb-4">
                                    <label for="jam_in" class="block text-sm font-medium text-gray-700">Jam
                                        In</label>
                                    <input type="time" id="jam_in" name="jam_in"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="jam_out" class="block text-sm font-medium text-gray-700">Jam
                                        Out</label>
                                    <input type="time" id="jam_out" name="jam_out"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="id_produks" class="block text-sm font-medium text-gray-700">Paket
                                        Games</label>
                                    <select name="id_produks" id="id_produks" class="form-control">
                                        <option value="" disabled selected>- Pilih -</option>
                                        @foreach ($produks as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }} -
                                                {{ $item->jenis_ps }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex justify-end mt-4">
                                    <button type="button" @click="$dispatch('close-modal', 'addJadwalModal')"
                                        class="btn btn-secondary">Batal</button>
                                    <button type="submit" class="btn btn-primary ml-2 mx-2">Simpan</button>
                                </div>
                            </form>
                        </x-modal>

                        <!-- Modal Riwayat Booking -->
                        <x-modal name="addRiwayatModal" :show="false" maxWidth="lg">
                            <h2 class="text-lg font-semibold mb-3 px-3 py-3">Riwayat Booking</h2>
                            <form action="" method="POST" class="px-3 py-3">
                                @csrf <!-- Don't forget to include CSRF token -->
                                <div class="mb-4">
                                    <label for="riwayat-booking-name"
                                        class="block text-sm font-medium text-gray-700">Nama Booking</label>
                                    <input type="text" id="riwayat-booking-name" name="riwayat_booking_name"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="riwayat-date" class="block text-sm font-medium text-gray-700">Tanggal
                                        Booking</label>
                                    <input type="date" id="riwayat-date" name="riwayat_date"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button type="button" @click="$dispatch('close-modal', 'addRiwayatModal')"
                                        class="btn btn-secondary">Batal</button>
                                    <button type="submit" class="btn btn-primary ml-2 mx-2">Simpan</button>
                                </div>
                            </form>
                        </x-modal>
                        {{-- END POP UP MODAL --}}

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>


<!-- Include SweetAlert -->
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



{{-- Add produk --}}
{{-- Add produk --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Intercept form submission for addProductModal
        const productForm = document.querySelector('form[action="{{ route('dashboard.store_produk') }}"]');
        if (productForm) {
            productForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Show SweetAlert for confirmation
                Swal.fire({
                    title: "Konfirmasi",
                    text: "Apakah Anda yakin ingin menyimpan ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, simpan!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit(); // Submit the form if confirmed
                    }
                });
            });
        }

        // SweetAlert for success message
        @if (session('success'))
            Swal.fire({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK",
            });
        @endif

        // SweetAlert for error message
        @if (session('error'))
            Swal.fire({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "OK",
            });
        @endif
    });
</script>


{{-- Add jadwal --}}
<script>
    $(document).ready(function() {
        $('#add-tanggal').click(function() {
            $('#tanggal-container').append(`
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal[]" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
                </div>
            `);
        });

        $('#jadwalForm').submit(function(e) {
            e.preventDefault(); // Mencegah form dari submit default
            const formData = $(this).serialize(); // Mengambil data form

            $.ajax({
                url: $(this).attr('action'), // Menggunakan action form
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Menampilkan pesan sukses dengan SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: response.message,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Menutup modal
                            $('#addJadwalModal').modal(
                                'hide'
                            ); // Ganti 'addJadwalModal' dengan ID modal yang sesuai
                            $('#jadwalForm')[0].reset(); // Mereset form
                        }
                    });
                },
                error: function(xhr) {
                    // Menangani error dengan SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        text: xhr.responseJSON.message || 'Silakan coba lagi.',
                        confirmButtonText: 'Ok'
                    });
                }
            });
        });
    });
</script>
