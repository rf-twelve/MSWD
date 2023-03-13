<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 snippet-html js-focus-visible">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_TITLE'); }}</title>
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles

</head>
<body class="flex flex-col min-h-full font-sans antialiased text-gray-600">
    {{-- <header class="relative z-50 flex-none py-5 text-sm font-medium leading-6 bg-white shadow-sm ring-1 ring-gray-900 ring-opacity-5">
        <nav aria-label="Global" class="px-4 mx-auto max-w-container sm:px-6 lg:px-8">
          <div class="flex items-center ">
            <a href="/components" class="flex-none text-gray-900 keychainify-checked">
              <span class="sr-only">Tailwind UI</span>
              <svg aria-hidden="true" viewBox="0 0 160 24" fill="none" class="w-auto h-6">
                <path d="M18.724 1.714c-4.538 0-7.376 2.286-8.51 6.857 1.702-2.285 3.687-3.143 5.957-2.57 1.296.325 2.22 1.271 3.245 2.318 1.668 1.706 3.6 3.681 7.819 3.681 4.539 0 7.376-2.286 8.51-6.857-1.701 2.286-3.687 3.143-5.957 2.571-1.294-.325-2.22-1.272-3.245-2.32-1.668-1.705-3.6-3.68-7.819-3.68zM10.214 12c-4.539 0-7.376 2.286-8.51 6.857 1.701-2.286 3.687-3.143 5.957-2.571 1.294.325 2.22 1.272 3.245 2.32 1.668 1.705 3.6 3.68 7.818 3.68 4.54 0 7.377-2.286 8.511-6.857-1.702 2.286-3.688 3.143-5.957 2.571-1.295-.326-2.22-1.272-3.245-2.32-1.669-1.705-3.6-3.68-7.82-3.68z" fill="#06B6D4"></path>
                <path d="M51.285 9.531V6.857h-3.166v-3.6l-2.758.823v2.777h-2.348v2.674h2.348v6.172c0 3.343 1.686 4.526 5.924 4.011V17.22c-2.094.103-3.166.129-3.166-1.517V9.53h3.166zm12.087-2.674v1.826c-.97-1.337-2.476-2.16-4.468-2.16-3.472 0-6.357 2.931-6.357 6.763 0 3.805 2.885 6.763 6.357 6.763 1.992 0 3.498-.823 4.468-2.186v1.851h2.758V6.857h-2.758zM59.338 17.4c-2.297 0-4.034-1.723-4.034-4.114 0-2.392 1.736-4.115 4.034-4.115s4.034 1.723 4.034 4.115c0 2.391-1.736 4.114-4.034 4.114zM70.723 4.929c.97 0 1.762-.823 1.762-1.775 0-.977-.792-1.774-1.762-1.774s-1.762.797-1.762 1.774c0 .952.792 1.775 1.762 1.775zm-1.379 14.785h2.758V6.857h-2.758v12.857zm5.96 0h2.757V.943h-2.758v18.771zM95.969 6.857l-2.502 8.872-2.655-8.872h-2.63L85.5 15.73l-2.477-8.872h-2.91l4.008 12.857h2.707l2.68-8.665 2.656 8.665h2.706L98.88 6.857h-2.911zm6.32-1.928c.97 0 1.762-.823 1.762-1.775 0-.977-.792-1.774-1.762-1.774s-1.762.797-1.762 1.774c0 .952.792 1.775 1.762 1.775zm-1.379 14.785h2.758V6.857h-2.758v12.857zm12.674-13.191c-1.736 0-3.115.643-3.957 1.98V6.857h-2.758v12.857h2.758v-6.891c0-2.623 1.43-3.703 3.242-3.703 1.737 0 2.86 1.029 2.86 2.983v7.611h2.757V11.82c0-3.343-2.042-5.297-4.902-5.297zm17.982-4.809v6.969c-.971-1.337-2.477-2.16-4.468-2.16-3.473 0-6.358 2.931-6.358 6.763 0 3.805 2.885 6.763 6.358 6.763 1.991 0 3.497-.823 4.468-2.186v1.851h2.757v-18h-2.757zM127.532 17.4c-2.298 0-4.034-1.723-4.034-4.114 0-2.392 1.736-4.115 4.034-4.115 2.297 0 4.034 1.723 4.034 4.115 0 2.391-1.737 4.114-4.034 4.114z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M145.532 3.429h8.511c.902 0 1.768.36 2.407 1.004.638.643.997 1.515.997 2.424v8.572c0 .909-.359 1.781-.997 2.424a3.394 3.394 0 01-2.407 1.004h-8.511a3.39 3.39 0 01-2.407-1.004 3.438 3.438 0 01-.997-2.424V6.857c0-.91.358-1.781.997-2.424a3.39 3.39 0 012.407-1.004zm-5.106 3.428c0-1.364.538-2.672 1.495-3.636a5.09 5.09 0 013.611-1.507h8.511c1.354 0 2.653.542 3.61 1.507a5.16 5.16 0 011.496 3.636v8.572a5.16 5.16 0 01-1.496 3.636 5.086 5.086 0 01-3.61 1.506h-8.511a5.09 5.09 0 01-3.611-1.506 5.164 5.164 0 01-1.495-3.636V6.857zm10.907 6.251c0 1.812-1.359 2.916-3.193 2.916-1.823 0-3.182-1.104-3.182-2.916v-5.65h1.633v5.52c0 .815.429 1.427 1.549 1.427 1.12 0 1.549-.612 1.549-1.428v-5.52h1.644v5.652zm1.72 2.748V7.457h1.644v8.4h-1.644z" fill="currentColor"></path>
              </svg>
            </a>
                          <p class="hidden pl-6 ml-6 text-sm border-l border-gray-200 lg:block">
                <a href="https://tailwindcss.com/blog/tailwindcss-v3" target="_blank" class="relative flex items-center hover:text-gray-900 keychainify-checked">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-teal-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path>
                  </svg>
                               Ready for Tailwind CSS v3.0
                  <svg aria-hidden="true" width="11" height="11" fill="currentColor" class="ml-1.5">
                    <path d="M5.593 10.139L10.232 5.5 5.593.862l-.895.89 3.107 3.102H0v1.292h7.805L4.698 9.254l.895.885z"></path>
                  </svg>
                </a>
              </p>
                              <div class="flex items-center ml-auto">
              <a href="/components" class="hidden sm:block hover:text-gray-900 keychainify-checked">Components</a>
              <a href="/documentation" class="hidden ml-6 mr-2 sm:block hover:text-gray-900 keychainify-checked">Documentation</a>

              <button type="button" x-data="" @click="$dispatch('open-command-palette')" class="-my-1 mr-3 sm:mx-2.5 w-8 h-8 rounded-lg flex items-center justify-center">
                <span class="sr-only">Search components</span>
                <svg aria-hidden="true" viewBox="0 0 20 20" fill="none" class="w-5 h-5 text-gray-900">
                  <circle cx="8.5" cy="8.5" r="5.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                  <path d="M17.25 17.25L13 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </button>

              <div x-data="{ open: false }" x-init="window.addEventListener('focus', event => { if (open &amp;&amp; !$el.contains(event.target)) open = false }, true)" @click.away="open = false" @keydown.escape="open = false;$refs.toggle.focus()" class="relative sm:border-l -mr-1.5 sm:ml-2 sm:mr-0 sm:pl-6 border-gray-200">
                <button type="button" x-ref="toggle" @click="open = !open" :aria-expanded="open" class="flex items-center font-medium">
                  <span class="items-center hidden sm:flex">
                    Account
                    <svg aria-hidden="true" width="8" height="6" fill="none" class="ml-2.5 text-gray-400">
                      <path d="M7 1.5l-3 3-3-3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </span>
                  <span class="flex items-center justify-center w-8 h-8 -my-1 rounded-lg sm:hidden">
                    <svg aria-hidden="true" width="20" height="20" fill="none" class="text-gray-900">
                      <path d="M3.75 4.75h12.5M3.75 9.75h12.5M3.75 14.75h12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </span>
                </button>
                <div x-show="open" class="absolute top-full right-0 w-60 mt-3 -mr-0.5 sm:-mr-3.5 bg-white rounded-lg shadow-md ring-1 ring-gray-900 ring-opacity-5 font-normal text-sm text-gray-900 divide-y divide-gray-100" style="display: none;">
                  <p class="py-3 px-3.5 truncate">
                    <span class="block mb-0.5 text-xs text-gray-500">Signed in as</span>
                    <span class="font-semibold">Licensed User</span>
                  </p>
                  <div class="py-1.5 px-3.5">
                    <a href="/components" class="group flex sm:hidden items-center py-1.5 hover:text-teal-600 keychainify-checked">
                      <svg aria-hidden="true" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                        <rect x="2.75" y="2.75" width="5.5" height="5.5" rx="1"></rect>
                        <rect x="2.75" y="11.75" width="5.5" height="5.5" rx="1"></rect>
                        <rect x="11.75" y="11.75" width="5.5" height="5.5" rx="2.75"></rect>
                        <path d="M13.616 3.305a1 1 0 011.79.004l1.731 3.498a1 1 0 01-.896 1.443H12.76a1 1 0 01-.894-1.448l1.751-3.497z"></path>
                      </svg>
                      Components
                    </a>
                    <a href="/documentation" class="group flex sm:hidden items-center py-1.5 hover:text-teal-600 keychainify-checked">
                      <svg aria-hidden="true" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                        <path d="M5.75 17.25h8.5a2 2 0 002-2V7L12 2.75H5.75a2 2 0 00-2 2v10.5a2 2 0 002 2z"></path>
                        <path d="M11.75 3v4.25H16M6.75 10.75h6.5M6.75 13.75h6.5"></path>
                      </svg>
                      Documentation
                    </a>
                    <a href="/changelog" class="group flex items-center py-1.5 hover:text-teal-600 keychainify-checked">
                      <svg aria-hidden="true" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                        <rect x="7.75" y="2.75" width="4.5" height="4.5" rx="2.25"></rect>
                        <rect x="7.75" y="12.75" width="4.5" height="4.5" rx="2.25"></rect>
                        <path d="M10 7.5v5"></path>
                      </svg>
                      Changelog
                    </a>
                    <a href="/support" class="group flex items-center py-1.5 hover:text-teal-600 keychainify-checked">
                      <svg aria-hidden="true" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                        <rect x="2.75" y="2.75" width="14.5" height="14.5" rx="7.25"></rect>
                        <rect x="6.75" y="6.75" width="6.5" height="6.5" rx="3.25"></rect>
                        <path d="M5 15l2.5-2.5M15 5l-2.5 2.5M15 15l-2.5-2.5M5 5l2.5 2.5"></path>
                      </svg>
                      Support
                    </a>
                    <a href="/license" class="group flex items-center py-1.5 hover:text-teal-600 keychainify-checked">
                      <svg aria-hidden="true" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                        <circle cx="10" cy="8" r="5.25"></circle>
                        <path d="M13 12.5l1.25 4.75-4.25-1.5-4.25 1.5L7 12.5"></path>
                      </svg>
                      License
                    </a>
                  </div>
                                <div class="py-1.5 px-3.5">
                                      <a href="/documentation#figma-assets" class="group flex items-center py-1.5 hover:text-teal-600 keychainify-checked">
                        <svg aria-hidden="true" width="20" height="20" fill="none" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                          <path d="M6 13.25a3.25 3.25 0 01-1.1-6.31c.473-.17.865-.562.996-1.047a4.252 4.252 0 018.209 0c.13.485.522.878.995 1.048A3.251 3.251 0 0114 13.25M10 11.75v5.5M7.75 14.75l2.25 2.5 2.25-2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Download Figma Assets
                      </a>
                                                    </div>

                                <div class="py-1.5 px-3.5">
                      <a href="/upgrade-team" class="group flex items-center py-1.5 hover:text-teal-600 keychainify-checked">
                        <svg aria-hidden="true" width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                          <rect x="4.75" y="6.75" width="4.5" height="4.5" rx="2.25" stroke="#9CA3AF" stroke-width="1.5"></rect>
                          <rect x="10.75" y="2.75" width="4.5" height="4.5" rx="2.25" stroke="#9CA3AF" stroke-width="1.5"></rect>
                          <path d="M11.179 16.52c-.854-1.416-2.035-2.77-4.171-2.77s-3.318 1.353-4.171 2.77a.484.484 0 00.425.73h7.492c.379 0 .62-.406.425-.73zM12.75 9.75c2.14 0 3.51 1.358 4.418 2.776.204.32-.035.724-.414.724H12.75" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                        Upgrade to Team License
                      </a>
                    </div>
                              <div class="py-1.5 px-3.5">
                    <a href="/account-settings" class="group flex items-center py-1.5 hover:text-teal-600 keychainify-checked">
                      <svg aria-hidden="true" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                        <rect x="7.75" y="5.75" width="4.5" height="4.5" rx="2.25"></rect>
                        <rect x="2.75" y="2.75" width="14.5" height="14.5" rx="7.25"></rect>
                        <path d="M14.618 15.5A5.249 5.249 0 0010 12.75a5.249 5.249 0 00-4.618 2.75"></path>
                      </svg>
                      Account Settings
                    </a>
                    <form method="POST" action="https://tailwindui.com/logout">
                      <input type="hidden" name="_token" value="CONSTANT_TOKEN">                <button type="submit" class="group flex w-full items-center py-1.5 text-gray-900 hover:text-teal-600">
                        <svg aria-hidden="true" width="20" height="20" fill="none" class="flex-none mr-3 text-gray-400 group-hover:text-teal-600">
                          <path d="M10.25 3.75H9A6.25 6.25 0 002.75 10v0A6.25 6.25 0 009 16.25h1.25M10.75 10h6.5M14.75 12.25l2.5-2.25-2.5-2.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Sign out
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                      </div>
        </nav>
    </header> --}}
    <main class="flex-auto min-h-screen bg-gray-200">
        <div class="overflow-hidden">
            <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </div>
    {{-- @yield('content') --}}
    </main>

    <x-notification />
    @livewireScripts
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
