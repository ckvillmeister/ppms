<style>
    #container {
        overflow-x: auto;
    }
    #tbl_app, .footer, .header{
        font-size: 8pt
    }

    #tbl_app td {
        vertical-align: center;
    }
    .center{
        text-align: center
    }
    .small-header{
        font-size: 6pt !important;
    }
    
    @page { 
        size: landscape;
    }

    @media print{
        .col-1 {
            width: 8%;
        }
        .col-2 {
            width: 16%;
        }
        .col-3 {
            width: 25%;
        }
        .col-4 {
            width: 33%;
        }
        .col-5 {
            width: 42%;
        }
        .col-6 {
            width: 50%;
        }
        .col-7 {
            width: 58%;
        }
        .col-8 {
            width: 66%;
        }
        .col-9 {
            width: 75%;
        }
        .col-10 {
            width: 83%;
        }
        .col-11 {
            width: 92%;
        }
        .col-12 {
            width: 100%;
        }
    }
</style>
<br>
<div class="row">
    <div class="col-lg-12 text-center">
        <h2 style="font-size: 14pt"><strong>Annual Procurement Plan (APP)</strong></h2>
        <h2 style="font-size: 14pt"><strong>FY {{ $settings[1]->setting_description }}</strong></h2>
    </div>
</div>
<br>
<div class="row" id="container">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_app" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center">Code (PAP)</th>
                    <th rowspan="2" class="text-center">Procurement Program / Project</th>
                    <th rowspan="2" class="text-center" >PMO / End-User</th>
                    <th rowspan="2" class="text-center">Mode of Procurement</th>
                    <th colspan="4" class="text-center small-header">Schedule for Each Procurement Activity</th>
                    <th rowspan="2" class="text-center">Source of Funds</th>
                    <th colspan="3" class="text-center">Estimated Budget (PhP)</th>
                    <th rowspan="2" class="text-center small-header">Remarks (Brief Description of Program/Activity/Project)</th>
                </tr>
                <tr>
                    <th class="text-center small-header">Advertisement/Posting <br>of IB/REI</th>
                    <th class="text-center small-header">Submission/Opening <br>of Bids</th>
                    <th class="text-center small-header">Notice of Award</th>
                    <th class="text-center small-header">Contract Signing</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">MOOE</th>
                    <th class="text-center">CO</th>
                </tr>
            </thead>
            <tbody>
                @php ($no = 1)
                @php ($ctr = 1)
                @php ($prev_object_of_expenditure = '')
                @php ($row_count = count($items))
                @php ($subtotal = 0.0)
                @php ($grandtotal = 0.0)
                
                @foreach ($items as $item)
                    @php ($count = 0)
                    
                    @if ($item->obj_exp_name != $prev_object_of_expenditure)
                        @if ($prev_object_of_expenditure)
                            <!-- <tr>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center" colspan="4"></td>
                                <td class="text-center"></td>
                                <td class="numerical-cols"></td>
                                <td class="numerical-cols"></td>
                                <td class="numerical-cols"></td>
                                <td class="text-center"></td>
                            </tr> -->
                        @endif

                        <tr>
                            <td colspan="2"><strong>{{ $item->obj_exp_name }}</strong></td>
                            <td><strong></strong></td>
                            <td colspan="10"><strong></strong></td>
                        </tr>
                        
                        @php ($prev_object_of_expenditure = $item->obj_exp_name)
                        @php ($subtotal = 0.0)
                    @else
                        @php ($prev_object_of_expenditure = $item->obj_exp_name)
                    @endif

                    @php ($qtr1 = 0)
                    @php ($qtr2 = 0)
                    @php ($qtr3 = 0)
                    @php ($qtr4 = 0)
                    @php ($schedule = '')

                    @if ($item->january | $item->february | $item->march)
                        @php ($qtr1 = 1)
                    @endif

                    @if ($item->april | $item->may | $item->june)
                        @php ($qtr2 = 1)
                    @endif

                    @if ($item->july | $item->august | $item->september)
                        @php ($qtr3 = 1)
                    @endif

                    @if ($item->october | $item->november | $item->december)
                        @php ($qtr4 = 1) 
                    @endif

                    @if ($qtr1 & $qtr2 & $qtr3 & $qtr4)
                        @php ($schedule = 'First Quarter to Fourth Quarter')
                    @elseif ($qtr1 & $qtr2 & $qtr3)
                        @php ($schedule = 'First Quarter to Third Quarter')
                    @elseif ($qtr2 & $qtr3 & $qtr4)
                        php ($schedule = 'Second Quarter to Fourth Quarter')
                    @elseif ($qtr1 & $qtr2 & $qtr3)
                        @php ($schedule = 'First, Second, and Third Quarter')
                    @elseif ($qtr1 & $qtr3 & $qtr4)
                        @php ($schedule = 'First, Third, and Fourth Quarter')
                    @elseif ($qtr1 & $qtr2)
                        @php ($schedule = 'First and Second Quarter')
                    @elseif ($qtr1 & $qtr3)
                        @php ($schedule = 'First and Third Quarter')
                    @elseif ($qtr1 & $qtr4)
                        @php ($schedule = 'First and Fourth Quarter')
                    @elseif ($qtr2 & $qtr3)
                        @php ($schedule = 'Second and Third Quarter')
                    @elseif ($qtr2 & $qtr4)
                        @php ($schedule = 'Second and Fourth Quarter')
                    @elseif ($qtr3 & $qtr4)
                        @php ($schedule = 'Third and Fourth Quarter') 
                    @elseif ($qtr1)
                        @php ($schedule = 'First Quarter')
                    @elseif ($qtr2)
                        @php ($schedule = 'Second Quarter')   
                    @elseif ($qtr3)
                        @php ($schedule = 'Third Quarter')   
                    @elseif ($qtr4)
                        @php ($schedule = 'Fourth Quarter')   
                    @endif

                    @php ($subtotal += ($item->avg_price * $item->total_qty))
                    @php ($grandtotal += ($item->avg_price * $item->total_qty))
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center">{{ $item->itemname }}</td>
                        <td class="text-center"></td>
                        <td class="text-center">{{ $item->mode }}</td>
                        <td class="text-center" colspan="4">{{ $schedule }}</td>
                        <td class="text-center">GoP</td>
                        <td class="numerical-cols">{{ number_format(($item->avg_price * $item->total_qty), 2) }}</td>
                        <td class="numerical-cols">{{ number_format(($item->avg_price * $item->total_qty), 2) }}</td>
                        <td class="numerical-cols"></td>
                        <td class="text-center"></td>
                    </tr>
                    @php ($ctr++)
                    @if ($row_count < $ctr)
                    <!-- <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center" colspan="4"></td>
                        <td class="text-center"></td>
                        <td class="numerical-cols">{{ number_format($subtotal, 2) }}</td>
                        <td class="numerical-cols">{{ number_format($subtotal, 2) }}</td>
                        <td class="numerical-cols"></td>
                        <td class="text-center"></td>
                    </tr> -->
                    @endif
                @endforeach
                <tr>
                    <td class="text-center"></td>
                    <td class="text-center"><strong>TOTAL</strong></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center" colspan="4"></td>
                    <td class="text-center"></td>
                    <td class="numerical-cols"><strong>{{ number_format($grandtotal, 2) }}</strong></td>
                    <td class="numerical-cols"><strong>{{ number_format($grandtotal, 2) }}</strong></td>
                    <td class="numerical-cols"></td>
                    <td class="text-center"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
</script>