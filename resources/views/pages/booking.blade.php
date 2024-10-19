<x-master-layouts title="Let's go! Form Booking Sky Games">




    <div class="container px-3 py-3">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 px-3 py-3">
                <img src="{{ asset('') }}media/hero-card3.avif" style="width: 100%; border-radius:25px;" alt="">
            </div>
            <div class="col-lg-6 px-5 py-5">
                <h2 class="text-center mb-4">Form Booking</h2>
                <form>
                    <!-- Paket Booking -->
                    <div class="mb-3">
                        <label for="paketBooking" class="form-label">Paket Booking</label>
                        <select class="form-select" id="paketBooking" required>
                            <option selected disabled value="">Pilih Paket</option>
                            <option value="paket1">Paket 1 - 09:00 - 12:00</option>
                            <option value="paket2">Paket 2 - 12:00 - 15:00</option>
                            <option value="paket3">Paket 3 - 15:00 - 18:00</option>
                        </select>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan nama lengkap"
                            required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="mb-3">
                        <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="nomorTelepon"
                            placeholder="Masukkan nomor telepon" required>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="mb-3">
                        <label for="metodePembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="metodePembayaran" required>
                            <option selected disabled value="">Pilih Metode Pembayaran</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="ovo">OVO</option>
                            <option value="gopay">GoPay</option>
                            <option value="credit_card">Kartu Kredit</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit Booking</button>
                </form>
            </div>
        </div>
    </div>
</x-master-layouts>
