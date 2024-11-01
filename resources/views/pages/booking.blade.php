<x-master-layouts title="Let's go! Form Booking Sky Games">




    <div class="container px-3 py-3">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 px-3 py-3">
                <img src="{{ asset('') }}media/hero-card3.avif" style="width: 100%; border-radius:25px;"
                    alt="">
            </div>
            <div class="col-lg-6 px-5 py-5">
                <h2 class="text-center mb-4">Form Booking</h2>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    
                    <!-- Paket Booking -->
                    <div class="mb-3">
                        <label for="paketBooking" class="form-label">Paket Booking</label>
                        <input type="text" class="form-control" value="{{ $produk->nama }} | Rp {{ number_format($produk->harga, 0, ',', '.') }}" readonly>
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                    </div>

                    <!-- Waktu Main (mulai) & (selesai) -->
                    <div class="mb-3">
                        <label for="paketBooking" class="form-label">Waktu Main (mulai) & (selesai)</label>
                        <div class="input-group">
                            <select name="jadwals_in" class="form-control" required>
                                <option value="" disabled selected>- Waktu masuk -</option>
                                @foreach ($jadwals as $item)
                                    <option value="{{ $item->id }}">{{ $item->jam_in }}</option>
                                @endforeach
                            </select>
                            <select name="jadwals_out" class="form-control" required>
                                <option value="" disabled selected>- Waktu selesai -</option>
                                @foreach ($jadwals as $item)
                                    <option value="{{ $item->id }}">{{ $item->jam_out }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="mb-3">
                        <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" name="nomor_telepon"
                            placeholder="Masukkan nomor telepon" required>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="mb-3">
                        <label for="metodePembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" name="metode_pembayaran" required>
                            <option selected disabled value="">Pilih Metode Pembayaran</option>
                            <option value="bank_transfer" disabled>Cash</option>
                            <option value="bank_transfer">Transfers (wajib dp Rp. {{ $produk->harga / 2 }})</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit Booking</button>
                </form>

            </div>
        </div>
    </div>
</x-master-layouts>
