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
                            <div class="col-lg-3 my-3">
                                <a href="#" x-data @click="$dispatch('open-modal', 'addPenjualanModal')"
                                    class="justify-content-center d-flex">
                                    <div class="box-menu justify-content-center d-flex">
                                        <img class="icon-menu" src="{{ asset('media/jual.png') }}" alt="">
                                    </div>
                                    <div class="mb-3 my-3 mx-3">
                                        <h5>Form Tambah Penjualan</h5>
                                    </div>
                                </a>
                            </div>
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
                                    <select
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        id="jenis_ps" name="jenis_ps">
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
                        </x-modal>

                        <!-- Modal Penjualan -->
                        <x-modal name="addPenjualanModal" :show="false" maxWidth="lg">
                            <h2 class="text-lg font-semibold mb-3 px-3 py-3">Tambah Penjualan</h2>
                            <form action="" method="POST" class="px-3 py-3">
                                @csrf <!-- Don't forget to include CSRF token -->
                                <div class="mb-4">
                                    <label for="penjualan-product-name"
                                        class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                    <input type="text" id="penjualan-product-name" name="penjualan_product_name"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="penjualan-amount"
                                        class="block text-sm font-medium text-gray-700">Jumlah
                                        Penjualan</label>
                                    <input type="number" id="penjualan-amount" name="penjualan_amount"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                        required>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button type="button" @click="$dispatch('close-modal', 'addPenjualanModal')"
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Intercept form submission for addProductModal
        const productForm = document.querySelector('form[action="{{ route('dashboard.store_produk') }}"]');
        productForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Show SweetAlert for confirmation
            swal({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menyimpan ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willSubmit) => {
                if (willSubmit) {
                    this.submit(); // Submit the form if confirmed
                }
            });
        });

        // Trigger SweetAlert for success message after submission
        @if (session('success'))
            swal({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        @elseif (session('error'))
            swal({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif

    });
</script> --}}


<!-- Include SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Intercept form submission for addProductModal
        const productForm = document.querySelector('form[action="{{ route('dashboard.store_produk') }}"]');
        if (productForm) {
            productForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Show SweetAlert for confirmation
                swal({
                    title: "Konfirmasi",
                    text: "Apakah Anda yakin ingin menyimpan ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willSubmit) => {
                    if (willSubmit) {
                        this.submit(); // Submit the form if confirmed
                    }
                });
            });
        }

        // SweetAlert for success message
        @if (session('success'))
            swal({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif

        // SweetAlert for error message
        @if (session('error'))
            swal({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif
    });
</script>
