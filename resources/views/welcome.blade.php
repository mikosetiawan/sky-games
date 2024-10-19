<x-master-layouts title="Home Sky Games">
    {{-- CONTENT GAMES SHOW --}}
    <div class="container px-3 py-3">
        <div class="my-3 text-center">
            <h1 class="fs-title">Daftar PlayStation</h1>
        </div>
        <div class="row">
            @foreach ($produk as $item)
                <div class="col-lg-4 my-3">
                    <div class="card border-0 shadow" style="width: 18rem;">
                        {{-- <img src="{{ asset('') }}media/hero-card1.avif" class="card-img-top" alt="..."> --}}
                        <img src="{{ Storage::url($item->foto) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">Rp. {{ $item->harga }}/jam <span class="badge text-bg-success">{{ $item->jenis_ps }}</span></p>
                            <a href="#" class="btn btn-primary bi bi-cart-plus-fill"> Booking</a>
                            <a class="btn btn-warning bi bi-calendar-heart-fill" data-bs-toggle="collapse"
                                href="#collapseExample" role="button" aria-expanded="false"
                                aria-controls="collapseExample"> Jadwal
                            </a>
                            <div class="collapse my-3" id="collapseExample">
                                <div class="card card-body">
                                    <p><b>Jadwal Hari ini :</b></p>
                                    <ul>
                                        <li>Senin : 08.00 - 16.00 WIB</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>
    {{-- END CONTENT GAMES SHOW --}}

</x-master-layouts>
