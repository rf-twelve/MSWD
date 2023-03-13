<div class="col-lg-9 col-sm-12">
    <div class="card card-primary">
        <div class="pt-4 text-center">
            <img src="{{ asset('\img\lgulopezquezon.png') }}" alt="logo" height="50">
        </div>

        <div class="text-center">
            Republic of the Philippines<br>
            Province of QUEZON<br>
            Municipality of LOPEZ<br>
            <strong>OFFICE OF THE MUNICIPAL TREASURER</strong><br>
            As of {{ $as_of }}<br>

        </div>
        <div class="mt-2 text-center">
            <h5>ASSESSMENT ROLL SUMMARY</h5>
            <span>Taxable Properties</span>
        </div>
        <div class="mx-4 mt-2 mb-0 row">
            <div class="col-3">
                <p class="mb-0">PROVINCE: &ensp;<u><strong>QUEZON</strong></u></p>
                <p class="mb-0">MUNICIPALITY: &ensp;<u><strong>LOPEZ</strong></u></p>
            </div>
            <div class="col-6"></div>
            <div class="col-3">
                <p class="mb-0">Index No.: &ensp;<u><strong>015</strong></u></p>
                <p class="mb-0">Index No.: &ensp;<u><strong>16</strong></u></p>
            </div>
        </div>
        <div class="mx-4 text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    {{-- <th style="width:2%">#</th> --}}
                    <th class="p-0 text-center" style="width:15%">Barangay</th>
                    <th class="p-0 text-center" style="width:8%">Code</th>
                    <th class="p-0 text-center" style="width:10%">Land</th>
                    <th class="p-0 text-center" style="width:10%">Building</th>
                    <th class="p-0 text-center" style="width:10%">Machineries</th>
                    <th class="p-0 text-center" style="width:10%">Total Assessed Value</th>
                    <th class="p-0 text-center" style="width:10%">Total Tax Collectibles(2%)</th>
                    <th class="p-0 text-center" style="width:10%">Previous Assessed value </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assessed_values as $item)
                    <tr>
                        <td class="p-1 text-left ">{{ $item['barangay'] }}</td>
                        <td class="p-1 text-center ">{{ $item['code'] }}</td>
                        <td class="p-1 text-right ">{{ number_format($item['land'],2,'.',',') }}</td>
                        <td class="p-1 text-right ">{{ number_format($item['building'],2,'.',',') }}</td>
                        <td class="p-1 text-right ">{{ number_format($item['machineries'],2,'.',',') }}</td>
                        <td class="p-1 text-right ">{{ number_format($item['total_av'],2,'.',',') }}</td>
                        <td class="p-1 text-right ">{{ number_format($item['total_collectibles'],2,'.',',') }}</td>
                        <td class="p-1 text-right ">{{ number_format($item['total_av_prev'],2,'.',',') }}</td>
                    </tr>
                    @empty

                    @endforelse
                    @if ($grandTotal)
                    <tr>
                        <td colspan="2" class="p-1 text-right"><strong><i>Grand Total:</i></strong></td>
                        <td class="p-1 text-right"><strong>{{number_format($grandTotal['land'],2,'.',',')}}</strong></td>
                        <td class="p-1 text-right"><strong>{{number_format($grandTotal['building'],2,'.',',')}}</strong></td>
                        <td class="p-1 text-right"><strong>{{number_format($grandTotal['machineries'],2,'.',',')}}</strong></td>
                        <td class="p-1 text-right"><strong>{{number_format($grandTotal['total_av'],2,'.',',')}}</strong></td>
                        <td class="p-1 text-right"><strong>{{number_format($grandTotal['total_collectibles'],2,'.',',')}}</strong></td>
                        <td class="p-1 text-right"><strong>{{number_format($grandTotal['total_av_prev'],2,'.',',')}}</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
