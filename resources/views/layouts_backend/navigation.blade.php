
@push('csss')
<link rel="stylesheet" href="{{asset('blogtemplate/css/coba.css')}}">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
@endpush
<nav>
        <div class="nav-bar">
            
            <span class="logo navLogo"><img src="{{asset('blogtemplate/img/Cuplikan_layar_2024-06-19_184939-removebg-preview.png')}}" alt="" srcset=""></span>
           
            <p>Menu</p>
            <div class="menu">
                <div class="grid">
                
                <div class="flex">
                <div class="logo-toggle">
                    
                <img src="{{asset('blogtemplate/img/Cuplikan_layar_2024-06-19_184939-removebg-preview.png')}}" alt="" srcset="">
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                
                <ul class="nav-links">
                    <li><a href="dashboard">Home</a></li>
                    <li><a href="/semuaberita">Berita</a></li>
                    <li><a href="/semuapertandingan">pertandingan</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            </div>
            </div>
            
            <div class="darkLight-searchBox">
                <i class='bx bx-menu sidebarOpen' ></i>
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>

                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                   </div>

                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                    
                </div>
                <div class="logout">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                    </div>
            </div>
        </div>
    </nav>




