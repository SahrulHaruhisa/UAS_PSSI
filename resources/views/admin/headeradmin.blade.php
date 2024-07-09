<header class="header">
                
                <nav class="nav2">
                    
                <div class="login">
                    <p>{{Auth::user()->usertype}}</p>
                    <i class="fa-solid fa-user"></i>
                    <i class="fas fa-caret-down arrow raul"></i>
                    <ul class="sub-menu rawr">
                        <li><a href="">Yusa</a></li>
                        <li><a href="">
                        <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                        </x-responsive-nav-link>
                        </form>
                        </a></li>
                    </ul>
                </div>
                <i class="fa-solid fa-xmark toggle"></i>
                <figure class="mode">
                    <div class="moon-sun">
                        <i class="fa-regular fa-moon icon moon"></i>
                        <i class="fa-regular fa-sun icon sun"></i>
                        
                    </div>
                    <span class="mode-text text">Dark Mode</span>
                    <div class="toogle-switch">
                        <span class="switch"></span>
                    </div>
                </figure>
            </nav>
            </header>