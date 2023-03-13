<div class="min-h-full">
    <div class="flex flex-col min-h-0">
        <!-- Top nav-->
        <nav class="flex bg-blue-500 border-b border-gray-200" aria-label="Breadcrumb">
            <ol role="list" class="justify-between flex w-full max-w-screen-xl px-4 mx-auto space-x-4 sm:px-6 lg:px-8">

                <span class="flex space-x-2 py-2">
                    <a href="{{ route('account-list',['user_id'=>auth()->user()->id]) }}"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 hover:text-white hover:bg-blue-600 bg-white rounded-xl focus:z-10 hover:border-blue-600 focus:outline-none focus:ring-1 hover:ring-blue-600">
                        <x-icon.arrow-curve-left class="mr-2.5 h-5 w-5" />
                        <span>Back</span>
                    </a>
                    <a wire:click="verifyAndUpdate()" href="#"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white hover:bg-blue-600 rounded-xl hover:text-white focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <x-icon.circle-check class="mr-1 h-5 w-5" />
                        <span>Update</span>
                    </a>
                </span>
                <div class="flex">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative py-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <x-icon.search class="w-5 h-5 text-gray-500" />
                        </div>
                        <x-input wire:model.debounce.500ms="assessment_roll_search"
                            class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Search" placeholder="Search Assessment Roll..." type="search" />
                    </div>
                </div>

            </ol>
        </nav>

        <!-- Bottom section -->
        <div class="flex-1 min-h-0 overflow-hidden">
            <!-- Main area -->
            <main class="flex-1 min-w-0 border-t border-gray-200 xl:flex">

                <div class="order-first xl:block xl:flex-shrink-0">
                    <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96">
                        <div class="flex-shrink-0">
                            <div class="flex px-6 py-2 text-sm font-medium bg-blue-600 text-white border">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                <span class="pl-2">ACCOUNT DETAILS</span>
                                <a href="#" wire:click="editAccountForm()" class="flex ml-3 text-white hover:text-blue-300">
                                    <x-icon.edit class="w-4 h-4" /><span class="text-xs">Edit</span>
                                </a>
                            </div>
                        </div>
                        <nav class="flex-1 min-h-0 overflow-y-auto">
                            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                                    <!-- ACCOUNT DETAILS -->
                                <div class="px-2 border-t border-gray-200 text-md sm:p-0">
                                    <dl class="sm:divide-y sm:divide-gray-200">
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                TD/ARP No. :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="rpt_td_no" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('rpt_td_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                PIN :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="rpt_pin" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('rpt_pin')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                                </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                KIND :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="rpt_kind" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('rpt_kind')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                CLASS :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="rpt_class" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('rpt_class')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                OWNER'S NAME :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-form.text-area wire:model.lazy="ro_name" rows="4"></x-form.text-area>
                                                @error('ro_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                ADDRESS :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-form.text-area wire:model.lazy="ro_address" rows="4"></x-form.text-area>
                                                @error('ro_address')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                LOT/BLK NO. :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="lp_lot_blk_no" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('lp_lot_blk_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                STREET :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="lp_street" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('lp_street')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                BARANGAY :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="lp_brgy" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('lp_brgy')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                MUNI/CITY :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="lp_municity" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('lp_municity')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                PROVINCE :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                <x-input wire:model.lazy="lp_province" class="p-0 m-0 text-sm" type="text" placeholder="Enter nature"/>
                                                @error('lp_province')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </section>
                        </nav>
                    </div>
                </div>


                <section aria-labelledby="message-heading" class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">
                    <!-- Document Details -->
                    <div class="flex-1 overflow-y-auto lg:block">
                        <div class="min-h-screen pb-6 bg-white shadow">
                            <div class="sm:items-baseline sm:justify-between">

                                <div class="flex px-6 py-2 text-sm font-medium border bg-blue-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="pl-2">ASSESSED VALUES</span>
                                    <a href="#" wire:click="createAssessedValue()" class="flex ml-3 text-white hover:text-blue-300">
                                        <x-icon.plus class="w-4 h-4" /><span class="text-xs">New</span>
                                    </a>
                                </div>
                                <div class="flex flex-col">
                                    <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                                        <x-table>
                                            <x-slot name="head">
                                                {{-- Empty header --}}
                                            </x-slot>

                                            <x-slot name="body">
                                                <tr class="text-left">
                                                    @forelse ($assessed_values_array as $key => $av_array)
                                                        <td class="border border-gray-300">
                                                            <table class="w-full">
                                                                <tr class="bg-gray-300">
                                                                    <td class="font-semibold flex">
                                                                        @if ($av_array['av_year_from'] == $av_array['av_year_from'])
                                                                            {{ $av_array['av_year_from']}}
                                                                        @else
                                                                            {{ $av_array['av_year_from'].'-'.$av_array['av_year_from'] }}
                                                                        @endif
                                                                        <div class="ml-1 mt-1 flex">
                                                                            <a wire:click="editAssessedValue({{ $key }})" href="#" class="text-blue-500 hover:text-indigo-900">
                                                                                <x-icon.edit class="w-4" />
                                                                            </a>
                                                                            <a wire:click="deleteAssessedValue({{ $key }})" href="#" class="text-red-500 hover:text-indigo-900">
                                                                                <x-icon.trash class="w-4" />
                                                                            </a>
                                                                        </div>

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

                                <div class="flex px-6 py-2 mt-4 text-sm font-medium bg-blue-600 text-white border">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="pl-2">PAYMENT RECORDS</span>
                                    <a href="#" wire:click="createPaymentRecord" class="flex ml-3 text-white hover:text-blue-300">
                                        <x-icon.plus class="w-4 h-4" /><span class="text-xs">New</span>
                                    </a>
                                </div>
                                <div class="flex flex-col">
                                    <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                                        <x-table>
                                            <x-slot name="head">
                                                <thead class="px-3 text-sm text-center bg-gray-200">
                                                    <tr class="font-semibold">
                                                        <th rowspan="2" class="text-center border bg-gray-300">#</th>
                                                        <th colspan="4" class="text-center border bg-gray-300">TAX COLLECTED</th>
                                                        <th rowspan="2" class="text-center border bg-gray-300">O.R. No.</th>
                                                        <th colspan="4" class="text-center border bg-gray-300">PAYMENT DETAILS</th>
                                                        <th rowspan="2" class="border bg-gray-300">DIRECTORY</th>
                                                        <th rowspan="2" class="border bg-gray-300">REMARKS</th>
                                                        <th rowspan="2" class="border bg-gray-300">TELLER</th>
                                                        <th rowspan="2" class="relative py-3.5 pl-3 pr-4 sm:pr-6 bg-gray-300">
                                                            <span class="">OPTION</span>
                                                        </th>
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
                                                    <td class="flex px-3 py-4 border">
                                                        <a wire:click="editPaymentRecord({{ $key }})" href="#" class="text-blue-500 hover:text-indigo-900">
                                                            <x-icon.edit class="w-4 h-4" />
                                                        </a>
                                                        <a wire:click="deletePaymentRecord({{ $key }})" href="#" class="ml-2 text-red-500 hover:text-red-400">
                                                            <x-icon.trash class="w-4 h-4" />
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $pr_count++; ?>
                                                @empty

                                                @endforelse

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

            <!-- ACCOUNT FORM -->
            <div>
                <x-modal.dialog wire:model="account_form_modal" maxWidth="sm">
                    <x-slot name="title">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <span>ACCOUNT FORM</span>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-input-group.rpt-account-fields/>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button wire:click="closeAccountForm()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                            {{ __('Cancel') }}
                        </x-button>
                        <x-button wire:click="saveAccountForm()" type="button" class="hover:bg-blue-500 hover:text-white">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-modal.dialog>
            </div>

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
                        <x-input-group.assessed-value-fields/>
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
                        <x-input-group.payment-record-fields />
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
