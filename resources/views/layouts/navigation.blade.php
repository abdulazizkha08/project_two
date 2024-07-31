<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-5 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
        <!-- Nav links -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('market') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Page Heading -->
                @isset($header)
                    <header class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <div class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (Route::has('login'))
                        <x-nav-link :href="route('market')" :active="request()->routeIs('market')">
                            {{ __('Main') }}
                        </x-nav-link>
                        @auth
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            @if(auth()->user()->is_admin)

                                <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                                    {{ __('Categories') }}
                                </x-nav-link>

                                <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                                    {{ __('Posts') }}
                                </x-nav-link>

                                <x-nav-link :href="route('shops.index')" :active="request()->routeIs('shops.index')">
                                    {{ __('Shops') }}
                                </x-nav-link>

                            @endif

                        @endauth
                    @endif
                </div>
            </div>

        <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Search bar -->
                    <div class="input-group">
                        <button type="button" class="btn btn-outline-dark inline-flex items-center btn-market dropdown-toggle" data-bs-toggle="dropdown">
                            Go to Bazar
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($bazars as $bazar)
                                <li><a class="dropdown-item" href="{{ route('bazar.products', $bazar) }}">{{ $bazar->name }}</a></li>
                            @endforeach
                        </ul>
                        <input type="text" class="" placeholder="Search items here">
                        <button class="btn btn-outline-dark btn-search" type="button"><i class="fa fa-search"></i></button>
                    </div>
                <!-- Cart -->
{{--                @if(Route::has('login'))--}}
{{--                    @auth()--}}
{{--                        @if(auth()->user()->is_admin)--}}
                            <div class="hidden sm:flex sm:items-center sm:ms-6" id="navbarSupportedContent">
                                @csrf
                                <form class="d-flex">
                                    <a class="btn btn-outline-dark" type="button" id="cart-button" href="{{ route('cart.index') }}">
                                        <i class="bi-cart-fill me-1"></i>
                                        Cart
                                        <span class="badge bg-dark text-white ms-1 rounded-pill" id="cart-count">0</span>
                                    </a>
                                </form>
                            </div>
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                @endif--}}
                <!-- Auth Dropdown -->
                <div class="sm:ms-6">
                    @if (Route::has('login'))
                        @auth
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="btn btn-outline-dark inline-flex items-center">
                                                <div>{{ Auth::user()->name }}</div>

                                                <div class="ms-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                        @else
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="btn btn-outline-dark inline-flex items-center">
        {{--                                        class="px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150" -->--}}

                                                Authorization

                                                <div class="ms-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('login')">
                                                {{ __('Log in') }}
                                            </x-dropdown-link>

                                            @if (Route::has('register'))

                                                <x-dropdown-link :href="route('register')" :active="request()->routeIs('register')">
                                                    {{ __('Register') }}
                                                </x-dropdown-link>
                                            @endif
                                        </x-slot>
                                    </x-dropdown>
                        @endauth


                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @if (Route::has('login'))
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                @auth()
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                @endauth
            </div>
        </div>
        @endif
    </div>
</nav>
