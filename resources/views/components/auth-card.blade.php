{{-- Sample Logo: https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg --}}
<div class="flex min-h-screen bg-fuchsia-300">
    <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="w-full max-w-sm mx-auto lg:w-96">
            <div class="text-center">
                <div class="inline-block max-w-[160px] mx-auto">
                    <img class="w-auto h-12 mx-auto" src="{{ asset('img/users/logo.png') }}" alt="Company Logo" />
                </div>
            </div>
            <div class="mb-10 text-center text-white">
                <div class="inline-block max-w-[300px] mx-auto">
                    <span class="font-sans text-2xl font-bold">{{ __('LGU KALIBO') }}</span><br>
                    <span class="font-serif text-xl text-justify">
                        {{ __('MSWD Monitoring & Evaluation System') }}
                    </span>
                </div>
            </div>
            <div class="mt-4 text">
                {{ $slot }}

                <div class="flex items-center justify-center py-2">
                    {{-- <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> already </a> --}}
                    <span class="font-thin hover:text-fuchsia-800 text-slate-800">
                        {{ __('LGU KALIBO - MSWD-MES © 2023') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex-1 hidden w-0 lg:block">
        <img class="absolute inset-0 object-cover w-full h-full"
        src="{{ asset('img/users/bg.jpg') }}" alt="Company office" />
    </div>
</div>
