<nav>
        <div class="nav-bar">
            
            <span class="logo navLogo"><img src="{{asset('blogtemplate/img/Cuplikan_layar_2024-06-19_184939-removebg-preview.png')}}" alt="" srcset=""></span>
           
            <p>Menu</p>
            <div class="menu">
                <div class="grid">
                
                <div class="logo-toggle">
                    
                    <img src="img/Cuplikan_layar_2024-06-19_184939-removebg-preview.png" alt="" srcset="">
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
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




