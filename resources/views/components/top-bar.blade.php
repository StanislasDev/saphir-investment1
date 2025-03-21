<div class="app-header-inner">
    <div class="py-2 container-fluid">
        <div class="app-header-content">
            <div class="row justify-content-between align-items-center">

                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            viewBox="0 0 30 30" role="img">
                            <title>Menu</title>
                            <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                        </svg>
                    </a>
                </div><!--//col-->
                <div class="search-mobile-trigger d-sm-none col">
                    <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
                </div><!--//col-->
                <div class="app-search-box col">
                    <form class="app-search-form">
                        <input type="text" placeholder="Search..." name="search"
                            class="form-control search-input">
                        <button type="submit" class="btn search-btn btn-primary" value="Search"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div><!--//app-search-box-->

                <div class="col-auto app-utilities">
                    <div class="app-utility-item app-notifications-dropdown dropdown">

                        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                            <!-- Primary Navigation Menu -->
                            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                <div class="flex justify-between h-10">
                                    {{-- <div class="flex">
                                        <!-- Logo -->
                                        <div class="flex items-center shrink-0">
                                            <a href="{{ route('dashboard') }}">
                                                <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                                            </a>
                                        </div>
                        
                                        <!-- Navigation Links -->
                                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                                {{ __('Dashboard') }}
                                            </x-nav-link>
                                        </div>
                                    </div> --}}
                        
                                    <!-- Settings Dropdown -->
                                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                                    <div>{{ Auth::user()->name }}</div>
                        
                                                    <div class="ms-1">
                                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                                    </div>
                        
                                    <!-- Hamburger -->
                                    <div class="flex items-center -me-2 sm:hidden">
                                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Responsive Navigation Menu -->
                            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                                {{-- <div class="pt-2 pb-3 space-y-1">
                                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-responsive-nav-link>
                                </div> --}}
                        
                                <!-- Responsive Settings Options -->
                                <div class="pt-4 pb-1 border-t border-gray-200">
                                    <div class="px-4">
                                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                                    </div>
                        
                                    <div class="mt-3 space-y-1">
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
                                    </div>
                                </div>
                            </div>
                        </nav><!--//app-user-dropdown-->
                </div><!--//app-utilities-->
            </div><!--//row-->
        </div><!--//app-header-content-->
    </div><!--//container-fluid-->
</div>