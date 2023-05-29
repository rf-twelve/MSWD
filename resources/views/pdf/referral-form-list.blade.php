<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @page {
            margin-top: 0.5in;
            margin-left: 0.5in;
            margin-right: 0.5in;
            margin-bottom: 0.5in;
            size: 8.5in 13in;
        }

        /* General
        -----------------------------------------------------------------------*/
        body {
            background-color: transparent;
            color: black;
            font-family: "verdana", "sans-serif";
            margin: 0px;
            padding-top: 0px;
            font-size: 1em;
        }

        @media print {
            p { margin: 2px; }
        }

        table {
            width:100%;
        }
        td {
            padding:2px;
        }

        .table-bordered{
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table-bordered th
        {
            border: 1px solid black;
        }
        .table-bordered td, {
            border-right: 1px solid black;
            border-left: 1px solid black;
        }
        .b-0, {
            border: 0px;
        }
        .right{
            text-align: right;
        }
        .center{
            text-align: center;
        }
        .bold{
            font-weight: bold;
        }
        .bordered {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .underline {
            border-bottom: 1px solid black;
        }
        .spacing-1 {
            letter-spacing: 1px;
        }
        .spacing-2 {
            letter-spacing: 2px;
        }
        .p-2 {
            padding: 2px;
        }
        .p-4 {
            padding: 4px;
        }
        .w-50 {
            width: 50%;
        }
        .w-60 {
            width: 60%;
        }
        .page-break {
            page-break-after: always;
        }

    </style>
</head>

<body>
    <table style="font-size: 8px">
        <tbody>
            <tr>
                <td width="35%" class="right">
                    <img width="50" src="{{ url('/img/users/logo.png') }}" />
                </td>
                <td width="30%" class="center">
                    <p style="font-size:9pt;">
                        Republic of the Philippines<br>
                        Province of Aklan<br>
                    </p>
                    <p style="font-size:10pt;font-style:bold">
                        ATI-ATIHAN TOWN OF KALIBO<br>
                        MSWD-AICS
                    </p>
                </td>
                <td width="35%"></td>
            </tr>
        </tbody>
    </table>
    <p class="center" style="font-size:12pt;font-style:bold;padding:0pt">
       LIST OF REFERRALS
    </p>

    <table style="width:100%;" class="table-bordered">
        <tr style="font-size:9pt;background-color:lightgray">
            <td class="table-bordered center" width="10%"><strong>Date</strong></td>
            <td class="table-bordered center" width="10%"><strong>Client</strong></td>
            <td class="table-bordered center" width="10%"><strong>Beneficiary</strong></td>
            <td class="table-bordered center" width="10%"><strong>Relation</strong></td>
            <td class="table-bordered center" width="10%"><strong>Address</strong></td>
            <td class="table-bordered center" width="10%"><strong>Contact No.</strong></td>
            <td class="table-bordered center" width="10%"><strong>Assistance</strong></td>
            <td class="table-bordered center" width="10%"><strong>Referral</strong></td>
            <td class="table-bordered center" width="10%"><strong>Welfare Agency</strong></td>
            <td class="table-bordered center" width="10%"><strong>Worrker</strong></td>
        </tr>
        @foreach ($data as $item)

        <tr style="font-size:9pt;">
            <td class="table-bordered center">{{ $item['date'] }}</td>
            <td class="table-bordered center">{{ $item['client'] }}</td>
            <td class="table-bordered center">{{ $item['beneficiary'] }}</td>
            <td class="table-bordered center">{{ $item['relation'] }}</td>
            <td class="table-bordered center">{{ $item['address'] }}</td>
            <td class="table-bordered center">{{ $item['contact'] }}</td>
            <td class="table-bordered center">{{ $item['assistance'] }}</td>
            <td class="table-bordered center">{{ $item['referral'] }}</td>
            <td class="table-bordered center">{{ $item['welfare_agency'] }}</td>
            <td class="table-bordered center">{{ $item['worker'] }}</td>
        </tr>

        @endforeach

    </table>

</body>

</html>
