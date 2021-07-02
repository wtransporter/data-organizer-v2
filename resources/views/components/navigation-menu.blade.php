<nav class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-10 flex">
                    <x-nav-link href="{{ route('candidates.index') }}" :active="request()->routeIs('candidates.index')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex sm:items-center sm:ml-6">
                <!-- Right Side Of Navbar -->
                <ul class="flex">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                                    {{ __('Login') }}
                                </x-nav-link>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                    {{ __('Register') }}
                                </x-nav-link>
                            </li>
                        @endif
                    @else
                        <li class="flex space-x-2">
                            <span class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white">
                                {{ Auth::user()->name }}
                            </span>

                            <div class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white">
                                <x-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </x-nav-link>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>