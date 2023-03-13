<div class="min-h-full">
    <div class="flex flex-col min-h-0">
        <!-- Top nav-->
        <x-header.navbar>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div>
                    <a href="{{ route('user-dashboard',['user_id'=>Auth::user()->id]) }}" class="text-gray-400 hover:text-gray-700">
                        <x-icon.home class="flex-shrink-0 w-5 h-5"/>
                        <span class="sr-only">Home</span>
                    </a>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                    <x-icon.chevron-right class="flex-shrink-0 w-5 h-5 text-gray-400"/>
                    <a href="{{ route('collections',['user_id'=>Auth::user()->id]) }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Collections</a>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                    <x-icon.chevron-right class="flex-shrink-0 w-5 h-5 text-gray-400"/>
                    <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Computations</a>
                    </div>
                </li>
                </ol>
            </nav>

        </x-header.navbar>

        <!-- Bottom section -->
        <div class="flex-1 min-h-0 overflow-hidden">
            <!-- Main area -->
            <main class="flex-1 min-w-0 border-t border-gray-200 xl:flex">

                <div class="order-first xl:block xl:flex-shrink-0">
                    <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96">
                        <div class="flex-shrink-0">
                            <div
                                class="flex px-6 py-2 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                <span class="pl-2">RPT ACCOUNT INFO</span>
                                {{-- <a href="#" class="flex ml-3 text-indigo-600 hover:text-indigo-900">
                                    <x-icon.edit class="w-4 h-4" /><span class="text-xs">Edit</span>
                                </a> --}}

                            </div>
                        </div>
                        <nav class="flex-1 min-h-0 overflow-y-auto">
                            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                                    <!-- ACCOUNT DETAILS -->
                                <div class="px-2 border-t border-gray-200 text-md sm:p-0">
                                    <dl class="sm:divide-y sm:divide-gray-200">
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                TD/ARP No:</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $rpt_td_no }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                PIN :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $rpt_pin }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                OWNER :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $ro_name }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                ADDRESS :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $ro_address }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                LOT/BLK NO. :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $lp_lot_blk_no }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                STREET :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $lp_street }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                BARANGAY :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $lp_brgy }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                MUNI/CITY :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $lp_municity }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                PROVINCE :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $lp_province }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                KIND :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $rpt_kind }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                CLASS :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $rpt_class }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                AV :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $assmt_av }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                EFFECTIVITY :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $assmt_effective }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                PREV TD/ARP:</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $assmt_td_arp_no_prev }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                PREV AV :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $assmt_av_prev }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                REMARKS :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $rtdp_remarks }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </section>
                        </nav>
                    </div>
                </div>

                <section aria-labelledby="message-heading" class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">



                    <!-- RIGTH SIDE SPACE -->
                    <div class="flex-1 overflow-y-auto lg:block">
                        <div class="min-h-screen pb-6 bg-white shadow">
                            <div class="sm:items-baseline sm:justify-between">

                                <!-- ASSESSED VALUE TABLE -->
                                <div class="flex px-6 py-2 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="pl-2">ASSESSED VALUES</span>
                                    {{-- <a href="#" wire:click="createAssessedValue" class="flex ml-3 text-indigo-600 hover:text-indigo-900">
                                        <x-icon.plus class="w-4 h-4" /><span class="text-xs">New</span>
                                    </a> --}}
                                </div>
                                <div class="flex flex-col bg-gray-200">
                                    <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                                        <x-table>
                                            <x-slot name="head">
                                                {{-- Empty table header --}}
                                            </x-slot>

                                            <x-slot name="body">
                                                <tr class="text-left">
                                                    @forelse ($assessed_values_array as $key => $av_array)
                                                        <td class="border border-gray-300">
                                                            <table class="w-full">
                                                                <tr class="bg-gray-300">
                                                                    <td class="flex font-semibold">
                                                                        @if ($av_array['av_year_from'] == $av_array['av_year_from'])
                                                                            {{ $av_array['av_year_from']}}
                                                                        @else
                                                                            {{ $av_array['av_year_from'].'-'.$av_array['av_year_from'] }}
                                                                        @endif
                                                                        {{-- <div class="flex mt-1 ml-1">
                                                                            <a wire:click="editAssessedValue({{ $key }})" href="#" class="text-blue-500 hover:text-indigo-900">
                                                                                <x-icon.edit class="w-4" />
                                                                            </a>
                                                                            <a wire:click="deleteAssessedValue({{ $key }})" href="#" class="text-red-500 hover:text-indigo-900">
                                                                                <x-icon.trash class="w-4" />
                                                                            </a>
                                                                        </div> --}}

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        {{ $av_array['av_value'] }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    @empty
                                                    @endforelse
                                                </tr>
                                            </x-slot>
                                        </x-table>
                                    </div>
                                </div>

                                {{-- PAYMENT RECORDS TABLE --}}
                                <div class="flex px-6 py-2 mt-6 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="pl-2">PAYMENT RECORDS</span>
                                    {{-- <a wire:click="createPaymentRecord" href="#" class="flex ml-3 text-indigo-600 hover:text-indigo-900">
                                        <x-icon.plus class="w-4 h-4" /><span class="text-xs">New</span>
                                    </a> --}}
                                </div>
                                <div class="flex flex-col">
                                    <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                                        <x-table>
                                            <x-slot name="head">
                                                <thead class="px-3 text-sm text-center bg-gray-200">
                                                    <tr class="font-semibold">
                                                        <th rowspan="2" class="text-center bg-gray-300 border">#</th>
                                                        <th colspan="4" class="text-center bg-gray-300 border">TAX COLLECTED</th>
                                                        <th rowspan="2" class="text-center bg-gray-300 border">O.R. No.</th>
                                                        <th colspan="4" class="text-center bg-gray-300 border">PAYMENT DETAILS</th>
                                                        <th rowspan="2" class="bg-gray-300 border">DIRECTORY</th>
                                                        <th rowspan="2" class="bg-gray-300 border">REMARKS</th>
                                                        <th rowspan="2" class="bg-gray-300 border">TELLER</th>
                                                        {{-- <th rowspan="2" class="relative py-3.5 pl-3 pr-4 sm:pr-6 bg-gray-300">
                                                            <span class="">OPTION</span>
                                                        </th> --}}
                                                    </tr>
                                                    <tr class="px-3 ">
                                                        <th class="font-normal border border-gray-50">BASIC</th>
                                                        <th class="font-normal border border-gray-50">SEF</th>
                                                        <th class="font-normal border border-gray-50">PENALTY</th>
                                                        <th class="font-normal border border-gray-50">TOTAL</th>
                                                        <th class="font-normal border border-gray-50">DATE</th>
                                                        <th class="font-normal border border-gray-50">FROM</th>
                                                        <th class="font-normal border border-gray-50">TO</th>
                                                        <th class="font-normal border border-gray-50">COVERED</th>
                                                    </tr>
                                                </thead>
                                            </x-slot>

                                            <x-slot name="body">
                                                <?php $pr_count = 1; ?>
                                                @forelse ($payment_records_array as $key => $pr)
                                                <tr class="text-gray-500 whitespace-nowrap">
                                                    <td class="px-3 border">{{ $pr_count }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_basic'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_sef'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_penalty'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_amount_due'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_serial_no'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_date'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_year_from'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_year_to'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_covered_year'] }}</td>
                                                    <td class="w-5 px-3 truncate border">{{ $pr['pay_directory'] }}</td>
                                                    <td class="px-3 truncate border">{{ $pr['pay_remarks'] }}</td>
                                                    <td class="px-3 border">{{ $pr['pay_teller'] }}</td>
                                                    {{-- <td class="flex px-3 py-4 border">
                                                        <a wire:click="editPaymentRecord({{ $key }})" href="#" class="text-blue-500 hover:text-indigo-900">
                                                            <x-icon.edit class="w-4 h-4" />
                                                        </a>
                                                        <a wire:click="deletePaymentRecord({{ $key }})" href="#" class="ml-2 text-red-500 hover:text-red-400">
                                                            <x-icon.trash class="w-4 h-4" />
                                                        </a>
                                                    </td> --}}
                                                </tr>
                                                <?php $pr_count++; ?>
                                                @empty

                                                @endforelse

                                            </x-slot>
                                        </x-table>
                                    </div>
                                </div>

                                {{-- TAX DUE TABLE --}}
                                <div class="flex justify-between px-6 py-2 mt-6 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        <span class="pl-2">TAX DUE</span>
                                    </div>
                                    <div x-data={cbt_enabled:false} class="flex text-right">
                                            <!-- This example requires Tailwind CSS v2.0+ -->
                                        <button wire:click="removeAllPenalty()" type="button" class="relative inline-flex items-center justify-center flex-shrink-0 w-10 h-5 text-sm rounded-full cursor-pointer group focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" role="switch" aria-checked="false">
                                            <span class="sr-only">Use setting</span>
                                            <span aria-hidden="true" class="absolute w-full h-full bg-white rounded-md pointer-events-none"></span>
                                            <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                                            <span aria-hidden="true" class="{{ $cbt_enabled ? 'bg-indigo-600':'bg-gray-200' }} absolute h-4 mx-auto transition-colors duration-200 ease-in-out rounded-full pointer-events-none w-9"></span>
                                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                            <span aria-hidden="true" class="{{ $cbt_enabled ? 'translate-x-5':'translate-x-0' }} absolute left-0 inline-block w-5 h-5 transition-transform duration-200 ease-in-out transform translate-x-5 bg-white border border-gray-200 rounded-full shadow pointer-events-none ring-0"></span>
                                        </button>
                                        <span class="ml-3 text-xs">CBT</span>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                                        <x-table>
                                            <x-slot name="head">
                                                <thead class="px-3 text-sm text-center text-gray-900 bg-gray-300 border border-gray-50">
                                                    <tr class="font-semibold">
                                                        <th rowspan="2" class="text-center border sr-only">
                                                            <x-checkbox wire:model="selectedAll" value="" />
                                                        </th>
                                                        <th class="text-center border">BRACKET</th>
                                                        <th class="text-center border">YEAR</th>
                                                        <th class="text-center border">AV * 10%</th>
                                                        <th class="border">TAX DUE</th>
                                                        <th class="border">CBT</th>
                                                        <th class="border">PENALTY</th>
                                                        <th class="border">TOTAL</th>
                                                    </tr>
                                                </thead>
                                            </x-slot>

                                            <x-slot name="body">

                                                <?php $sef = 0; ?>
                                                @forelse ($compute_quarter_result as $key => $result)
                                                    <tr class="{{ $result['status'] == true ? '':'bg-gray-400' }} px-3 py-2 text-gray-500 border whitespace-nowrap">
                                                        @if ($result['status'] == true)
                                                            <td class="px-3 py-2 border"><x-checkbox wire:click="toggleBracket({{ $key }})" checked/></td>
                                                            <td class="px-3 py-2 border">{{ $result['label'] }}</td>
                                                            <td class="px-3 py-2 border">{{ $result['year_no'] }}</td>
                                                            <td class="px-3 py-2 border">{{ 'P '. $result['av'] }}</td>
                                                            <td class="px-3 py-2 border">{{ 'P '. $result['tax_due'] }}</td>
                                                            <td class="px-3 py-2 border">
                                                                <x-checkbox wire:click="removeSelectedPenalty({{ $key }})" />
                                                            </td>
                                                            @if ($result['cbt'] == true)
                                                                <td class="px-3 py-2 bg-gray-400 border">{{ 'P 0.00' }}</td>
                                                            @else
                                                                <td class="px-3 py-2 border">{{ 'P '. number_format($result['penalty_temp'], 2, '.', ',') }}</td>
                                                            @endif
                                                                <td class="px-3 py-2 border">{{ 'P '. number_format($result['total'], 2, '.', ',') }}</td>
                                                        @else
                                                            <td class="px-3 py-2 border"><x-checkbox wire:click="toggleBracket({{ $key }})"/></td>
                                                            <td class="px-3 py-2 border">{{ $result['label'] }}</td>
                                                            <td class="px-3 py-2 border">{{ $result['year_no'] }}</td>
                                                            <td class="px-3 py-2 border">{{ 'P 0.00'}}</td>
                                                            <td class="px-3 py-2 border">{{ 'P 0.00'}}</td>
                                                            <td class="px-3 py-2 border"><x-checkbox disabled /></td>
                                                            <td class="px-3 py-2 border">{{ 'P 0.00'}}</td>
                                                            <td class="px-3 py-2 border">{{ 'P 0.00'}}</td>
                                                        @endif
                                                     </tr>
                                                    <?php $sef = $sef + $result['total']; ?>
                                                @empty
                                                @endforelse

                                                <tr class="px-3 py-2 bg-gray-300 border whitespace-nowrap">
                                                    <td colspan="7" class="px-3 py-2 border">
                                                        SPECIAL EDUCATION FUND
                                                    </td>
                                                    <td class="px-3 py-2 bg-white border">{{ 'P '. number_format($sef, 2, '.', ',') }}</td>
                                                </tr>
                                                <tr class="px-3 py-2 bg-gray-300 border whitespace-nowrap">
                                                    <td colspan="7" class="px-3 py-2 border">
                                                        <div class="flex justify-between">
                                                            <span>GRAND TOTAL</span>
                                                            <a wire:click="openPayment()" href="#"
                                                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-white rounded-xl hover:bg-blue-500 focus:z-10 focus:bg-blue-500">
                                                                <x-icon.circle-check class="w-5 h-5 mr-1 text-gray-400" />
                                                                <span>Payment</span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-2 text-lg font-medium bg-white border">{{ 'P '. number_format($sef * 2, 2, '.', ',') }}</td>
                                                </tr>
                                            </x-slot>
                                        </x-table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Audit Trails on mobile devices -->
                </section>

                <!-- ACCOUNT INFORMATION DESKTOP-->

            </main>

            <!-- ASSESSED VALUE FORM -->
            <div>
                <x-modal.dialog wire:model="assessed_value_modal" maxWidth="sm">
                    <x-slot name="title">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <span>ASSESSED VALUE FORM</span>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        @livewire('mto.forms.assessed-value-form')
                    </x-slot>

                    <x-slot name="footer">
                        <x-button wire:click="closeAssessedValue()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                            {{ __('Cancel') }}
                        </x-button>
                        <x-button wire:click="saveAssessedValue()" type="button" class="hover:bg-blue-500 hover:text-white">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-modal.dialog>
            </div>

            <!-- PAYMENT RECORD FORM -->
            <div>
                <x-modal.dialog wire:model="payment_record_modal" maxWidth="sm">
                    <x-slot name="title">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <span>PAYMENT RECORD FORM</span>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        @livewire('mto.forms.payment-record-form')
                    </x-slot>

                    <x-slot name="footer">
                        <x-button wire:click="closePaymentRecord()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                            {{ __('Cancel') }}
                        </x-button>
                        <x-button wire:click="savePaymentRecord()" type="button" class="hover:bg-blue-500 hover:text-white">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-modal.dialog>
            </div>

            <!-- OPEN PAYMENT FORM -->
            <div>
                <x-modal.dialog wire:model="open_peyment_modal" maxWidth="md">
                    <x-slot name="title">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <span>PAYMENT FORM</span>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-input-group.payment-form-fields />
                    </x-slot>

                    <x-slot name="footer">
                        <x-button wire:click="closePayment()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                            {{ __('Cancel') }}
                        </x-button>
                        <x-button wire:click="savePayment()" type="button" class="hover:bg-blue-500 hover:text-white">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-modal.dialog>
            </div>

            <!-- Delete Single Record Modal -->
            <div>
                <form wire:submit.prevent="deleteSingleRecord">
                    <x-modal.confirmation wire:model.defer="showDeleteSelectedRecordModal">
                        <x-slot name="title">Delete Selected Record</x-slot>

                        <x-slot name="content">
                            <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-button type="button" wire:click.prevent="$set('showDeleteSelectedRecordModal', false)">Cancel
                            </x-button>

                            <x-button type="submit">Delete</x-button>
                        </x-slot>
                    </x-modal.confirmation>
                </form>
            </div>

        </div>
    </div>
</div>
