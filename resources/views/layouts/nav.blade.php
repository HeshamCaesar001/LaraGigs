<nav class="flex justify-between items-center mb-4">
    <a href="{{route('index')}}"
    ><img class="w-24" src="images/logo.png" alt="" class="logo"
        /></a>
    <ul class="flex space-x-6 mr-2 text-lg">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" class="hover:text-laravel" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i>{{ __('Register') }}</a>
                </li>
            @endif
        @else



         <li class="nav-item ">
             <a id="navbarDropdown" class="nav-link d-inline" href="{{route('user.posts')}}" role="button" d aria-haspopup="true" aria-expanded="false" v-pre>
                 {{ Auth::user()->name }}
             </a>
             <a class=" inline btn btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>

         </li>

        @endguest
    </ul>
</nav>
