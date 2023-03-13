<header class="mb-2 bg-indigo-600">
    <nav class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8" aria-label="Top">
      <div class="flex items-center justify-between w-full py-6">
        <div class="flex items-center">
          <a href="#">
            <span class="sr-only">Workflow</span>
            <img class="w-auto h-10" src="{{ asset(env('APP_LOGO')) }}" alt="LOGO">
          </a>
          <div class="ml-10 font-serif text-xl font-semibold text-white lg:block">
            {{ env('APP_CLIENT')  .' - '. env('APP_TITLE') }}
          </div>
        </div>
      </div>
    </nav>
</header>
