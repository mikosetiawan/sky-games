 {{-- NAVBAR --}}
 <nav class="navbar navbar-expand-lg bg-white shadows sticky-top">
     <div class="container">
         <a class="navbar-brand fw-bold" href="#">Sky <span class="text-primary">Games</span></a>
         <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
             data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <div class="navbar-nav mx-auto">
                 <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                 <a class="nav-link {{ Request::is('jadwal-booking') ? 'active' : '' }}" href="/jadwal-booking">Jadwal Booking</a>
                 <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
             </div>
             @if (Route::has('login'))
                 <div class="ms-auto">
                     @auth
                         <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                     @else
                         <a href="{{ route('login') }}" class="btn btn-primary">Log
                             in</a>

                         {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 btn btn-primary">Register</a>
                    @endif --}}
                     @endauth
                 </div>
             @endif
         </div>
     </div>
 </nav>
 {{-- END NAVBAR --}}
