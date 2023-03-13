<div x-data={openSidebar:false} class="flex min-h-screen">
    <!-- Narrow sidebar -->
    <div class="hidden overflow-y-auto bg-gray-300 w-28 md:block">
      <div class="flex flex-col items-center w-full py-6">
        <div class="flex items-center flex-shrink-0">
          <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt="Logo">
        </div>
        <div class="flex-1 w-full px-2 mt-6 space-y-1">
          <!-- Current: "bg-indigo-800 text-white", Default:  hover:bg-blue-500 hover:text-white" -->
          <a href="#" class="flex flex-col items-center w-full p-3 text-xs font-medium rounded-md hover:bg-blue-500 hover:text-white group">
            <!--
              Heroicon name: outline/home

              Current: "text-white", Default:  group-hover:text-white"
            -->
            <svg class="w-6 h-6 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="mt-2">Home</span>
          </a>

          <a href="#" class="flex flex-col items-center w-full p-3 text-xs font-medium text-white bg-blue-500 rounded-md hover:text-white group">
            <!-- Heroicon name: outline/view-grid -->
            <svg class="w-6 h-6 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <span class="mt-2">RPT</span>
          </a>

          <a href="#" class="flex flex-col items-center w-full p-3 text-xs font-medium text-white rounded-md hover:bg-blue-500 group" aria-current="page">
            <!-- Heroicon name: outline/photograph -->
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="mt-2">Photos</span>
          </a>

          <a href="#" class="flex flex-col items-center w-full p-3 text-xs font-medium rounded-md hover:bg-blue-500 hover:text-white group">
            <!-- Heroicon name: outline/user-group -->
            <svg class="w-6 h-6 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="mt-2">Shared</span>
          </a>

          <a href="#" class="flex flex-col items-center w-full p-3 text-xs font-medium rounded-md hover:bg-blue-500 hover:text-white group">
            <!-- Heroicon name: outline/collection -->
            <svg class="w-6 h-6 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <span class="mt-2">Albums</span>
          </a>

          <a href="#" class="flex flex-col items-center w-full p-3 text-xs font-medium rounded-md hover:bg-blue-500 hover:text-white group">
            <!-- Heroicon name: outline/cog -->
            <svg class="w-6 h-6 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="mt-2">Settings</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="openSidebar" x-transition class="text-white md:hidden bg-gray-50" role="dialog" aria-modal="true">
      <div class="fixed inset-0 z-40 flex">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
        <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-gray-300">

          <div class="absolute right-0 p-1 top-1 -mr-14">
            <button x-on:click="openSidebar = false" type="button" class="flex items-center justify-center w-12 h-12 bg-gray-600 rounded-full focus:outline-none focus:ring-2 focus:ring-white">
              <!-- Heroicon name: outline/x -->
              <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
              <span class="sr-only">Close sidebar</span>
            </button>
          </div>

          <div class="flex items-center flex-shrink-0 px-4">
            <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt="Workflow">
          </div>
          <div class="flex-1 h-0 px-2 mt-5 overflow-y-auto text-gray-800 bg-gray-100">
            <nav class="flex flex-col">
              <div class="space-y-1">
                <!-- Current: "bg-indigo-800 text-white", Default:  hover:bg-blue-500 hover:text-white" -->
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-blue-500 hover:text-white group">
                  <!--
                    Heroicon name: outline/home

                    Current: "text-white", Default:  group-hover:text-white"
                  -->
                  <svg class="w-6 h-6 mr-3 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                  <span>Home</span>
                </a>

                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-500 rounded-md group" aria-current="page">
                  <!-- Heroicon name: outline/photograph -->
                  <svg class="w-6 h-6 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                    RPT
                </a>

                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-blue-500 hover:text-white group">
                  <!-- Heroicon name: outline/view-grid -->
                  <svg class="w-6 h-6 mr-3 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                  </svg>
                  <span>All Files</span>
                </a>


                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-blue-500 hover:text-white group">
                  <!-- Heroicon name: outline/user-group -->
                  <svg class="w-6 h-6 mr-3 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <span>Shared</span>
                </a>

                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-blue-500 hover:text-white group">
                  <!-- Heroicon name: outline/collection -->
                  <svg class="w-6 h-6 mr-3 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                  </svg>
                  <span>Albums</span>
                </a>

                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-blue-500 hover:text-white group">
                  <!-- Heroicon name: outline/cog -->
                  <svg class="w-6 h-6 mr-3 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <span>Settings</span>
                </a>
              </div>
            </nav>
          </div>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
          <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
      </div>
    </div>

    <!-- Content area -->
    <div class="flex flex-col flex-1 overflow-hidden">
      <header class="w-full">
        <div class="relative z-10 flex flex-shrink-0 h-16 bg-white border-b border-gray-200 shadow-sm">
          <button x-on:click="openSidebar = true" type="button" class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
            <span class="sr-only">Open sidebar</span>
            <!-- Heroicon name: outline/menu-alt-2 -->
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </button>
          <div class="flex justify-between flex-1 px-4 sm:px-6">
            <div class="flex flex-1">
              <form class="flex w-full md:ml-0" action="#" method="GET">
                <label for="search-field" class="sr-only">Search all files</label>
                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                  <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <!-- Heroicon name: solid/search -->
                    <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input name="search-field" id="search-field" class="w-full h-full py-2 pl-8 pr-3 text-base text-gray-900 placeholder-gray-500 border-transparent focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400" placeholder="Search" type="search">
                </div>
              </form>
            </div>
            <div class="flex items-center ml-2 space-x-4 sm:ml-6 sm:space-x-6">
              <!-- Profile dropdown -->
              <div x-data="{openDropdown:false}" class="relative flex-shrink-0">
                <div>
                  <button x-on:click="openDropdown =! openDropdown" type="button" class="flex text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">
                  </button>
                </div>
                {{-- User Profile Dropdown --}}
                <div x-show="openDropdown" x-transition class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Sign out</a>
                </div>
              </div>

              <button type="button" class="flex items-center justify-center p-1 text-white bg-indigo-600 rounded-full hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <!-- Heroicon name: outline/plus-sm -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="sr-only">Add file</span>
              </button>
            </div>
          </div>
        </div>
      </header>

      <!-- Main content -->
      <div class="flex items-stretch flex-1 overflow-hidden">
        <main class="flex-1 overflow-y-auto">
          <!-- Primary column -->
          <section aria-labelledby="primary-heading" class="flex flex-col flex-1 h-full min-w-0 lg:order-last">
            <h1 id="primary-heading" class="pl-2 text-lg italic font-semibold">ACCOUNT VERIFICATION</h1>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="overflow-hidden bg-white shadow">
                <ul role="list" class="divide-y divide-gray-200">
                <li>
                    <a href="#" class="block hover:bg-gray-50">
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium truncate">PIN:
                                <span class="text-indigo-600"> 0015-0025-22545-1444</span></p>
                            <div class="flex flex-shrink-0 ml-2">
                                <p class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    Verified</p>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                        <div class="space-y-2 sm:space-y-0 sm:space-x-2 sm:flex">
                            <span class="flex items-center text-sm text-gray-500">
                                <x-icon.square3-stack class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"/>
                                <span>Land</span>
                            </span>
                            <span class="flex items-center text-sm text-gray-500">
                                <x-icon.square3-stack class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"/>
                                <span>RESIDENTIAL</span>
                            </span>
                            <span class="flex items-center text-sm text-gray-500 truncate">
                                <x-icon.square3-stack class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"/>
                                <span>JUAN DELACS SADAS ASDASD ASDASD sadsadsa asdasdas sadas</span>
                            </span>
                        </div>
                        <div class="flex items-center mt-2 text-sm text-gray-500 sm:mt-0">
                            <!-- Heroicon name: solid/calendar -->
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <p>
                            Closing on
                            <time datetime="2020-01-07">January 7, 2020</time>
                            </p>
                        </div>
                        </div>
                    </div>
                    </a>
                </li>


                </ul>
            </div>

          </section>
        </main>

        <!-- Secondary column (hidden on smaller screens) -->
        <aside class="hidden overflow-y-auto bg-white border-l border-gray-200 w-96 lg:block">
          <!-- Your content -->
        </aside>
      </div>
    </div>
  </div>
