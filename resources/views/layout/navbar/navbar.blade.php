    <nav class="bg-box border-gray-200 dark:bg-gray-900 fixed w-full z-999999">
        <div class="max-w-screen-xl flex flex-row gap-20 items-center justify-between py-4 px-10 ">
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <div class="w-full flex flex-row gap-5 items-center">
                        <div class="flex flex-col gap-0">
                            <span class="text-nowrap text-bodydark1 text-end text-sm">{{ Auth::user()->username }}</span>
                            <span class="text-nowrap text-bodydark2 text-end text-xs">{{ Auth::user()->email }}</span>
                        </div>
                        <div
                            class="w-12 h-12 flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-12 h-12 rounded-full" src="{{ asset('images/profile.jpg') }}"
                                alt="user photo">
                        </div>
                    </div>
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-box dark:text-box font-bold">{{ Auth::user()->username }}</span>
                        <span
                            class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black-2">Logout</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

            {{-- Search --}}
            <form action="https://formbold.com/s/unique_form_id" method="POST" class="w-full">
                <div class="relative w-full">
                    <button class="absolute left-0 top-1/2 -translate-y-1/2">
                        <svg class="fill-body hover:fill-primary dark:fill-bodydark dark:hover:fill-primary"
                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.16666 3.33332C5.945 3.33332 3.33332 5.945 3.33332 9.16666C3.33332 12.3883 5.945 15 9.16666 15C12.3883 15 15 12.3883 15 9.16666C15 5.945 12.3883 3.33332 9.16666 3.33332ZM1.66666 9.16666C1.66666 5.02452 5.02452 1.66666 9.16666 1.66666C13.3088 1.66666 16.6667 5.02452 16.6667 9.16666C16.6667 13.3088 13.3088 16.6667 9.16666 16.6667C5.02452 16.6667 1.66666 13.3088 1.66666 9.16666Z"
                                fill="" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4642 13.2857L18.0892 16.9107C18.4147 17.2362 18.4147 17.7638 18.0892 18.0892C17.7638 18.4147 17.2362 18.4147 16.9107 18.0892L13.2857 14.4642C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z"
                                fill="" />
                        </svg>
                    </button>

                    <input type="text" placeholder="Type to search..."
                        class="w-full bg-transparent !pl-9 pr-4 focus:outline-none border-none focus:ring-0" />
                </div>
            </form>
        </div>
    </nav>
