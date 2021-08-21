<style>
    #container {
        overflow-x: auto;
    }
    #tbl_procurement_list, .footer, .header{
        font-size: 8pt
    }

    #tbl_procurement_list td {
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
        <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_procurement_list" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center">Item No.</th>
                    <th rowspan="2" class="text-center">Description</th>
                    <th rowspan="2" class="text-center">Unit Cost</th>
                    <th rowspan="2" class="text-center">Quantity</th>
                    <th rowspan="2" class="text-center">Unit</th>
                    <th rowspan="2" class="text-center">Total Cost</th>
                    <th colspan="2" class="text-center small-header">First Quarter</th>
                    <th colspan="2" class="text-center small-header">Second Quarter</th>
                    <th colspan="2" class="text-center small-header">Third Quarter</th>
                    <th colspan="2" class="text-center small-header">Fourth Quarter</th>
                    <!-- <th colspan="8" class="text-center"></th> -->
                </tr>
                <tr>
                    <th class="text-center small-header">Quantity</th>
                    <th class="text-center small-header">Amount</th>
                    <th class="text-center small-header">Quantity</th>
                    <th class="text-center small-header">Amount</th>
                    <th class="text-center small-header">Quantity</th>
                    <th class="text-center small-header">Amount</th>
                    <th class="text-center small-header">Quantity</th>
                    <th class="text-center small-header">Amount</th>
                </tr>
            </thead>
            <tbody>
                @php ($no = 1)
                @php ($ctr = 1)
                @php ($prev_object_of_expenditure = '')
                @php ($row_count = count($items))
                @php ($total = 0.0)
                @php ($totalqtr1 = 0.0)
                @php ($totalqtr2 = 0.0)
                @php ($totalqtr3 = 0.0)
                @php ($totalqtr4 = 0.0)
                @php ($grandtotal = 0.0)
                @php ($grandtotalqtr1 = 0.0)
                @php ($grandtotalqtr2 = 0.0)
                @php ($grandtotalqtr3 = 0.0)
                @php ($grandtotalqtr4 = 0.0)
                
                @foreach ($items as $item)
                    @php ($count = 0)
                    
                    @if ($item->obj_exp_name != $prev_object_of_expenditure)
                        @if ($prev_object_of_expenditure)
                            <tr>
                                <td colspan="5"><strong>SUBTOTAL</strong></td>
                                <td class="numerical-cols"><strong>{{ number_format($total, 2) }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($totalqtr1) ? number_format($totalqtr1, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong></strong></td>
                                <td class="numerical-cols"><strong>{{ ($totalqtr2) ? number_format($totalqtr2, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong></strong></td>
                                <td class="numerical-cols"><strong>{{ ($totalqtr3) ? number_format($totalqtr3, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong></strong></td>
                                <td class="numerical-cols"><strong>{{ ($totalqtr4) ? number_format($totalqtr4, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong></strong></td>
                            </tr>
                        @endif

                        <tr>
                            <td></td>
                            <td colspan="18"><strong>{{ $item->obj_exp_name }}</strong></td>
                        </tr>
                        
                        @php ($prev_object_of_expenditure = $item->obj_exp_name)
                        @php ($total = 0.0)
                        @php ($totalqtr1 = 0.0)
                        @php ($totalqtr2 = 0.0)
                        @php ($totalqtr3 = 0.0)
                        @php ($totalqtr4 = 0.0)
                        @php ($grandtotal = 0.0)
                    @else
                        @php ($prev_object_of_expenditure = $item->obj_exp_name)
                    @endif

                    @php ($total += ($item->avg_price * $item->total_qty))

                    <tr>
                        @if ($item->january | $item->february | $item->march)
                            
                        @endif
                        @if ($item->april | $item->may | $item->june)
                            
                        @endif
                        @if ($item->july | $item->august | $item->september)
                            
                        @endif
                        @if ($item->october | $item->november | $item->december)
                            
                        @endif

                        @php ($total += ($item->avg_price * $item->total_qty))

                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $item->itemname }}</td>
                        <td class="numerical-cols">{{ number_format($item->avg_price, 2) }}</td>
                        <td class="text-center">{{ $item->total_qty }}</td>
                        <td class="text-center">{{ $item->description }}</td>
                        <td class="numerical-cols">{{ number_format($item->avg_price * $item->total_qty, 2) }}</td>
                        <td class="numerical-cols"></td>
                        <td class="numerical-cols"></td>
                        <td class="numerical-cols"></td>
                        <td class="numerical-cols"></td>
                        <td class="numerical-cols"></td>
                        <td class="numerical-cols"></td>
                        <td class="numerical-cols"></td>
                        <td class="numerical-cols"></td>
                    </tr>
                    @php ($ctr++)
                    @if ($row_count < $ctr)
                    <tr>
                        <td colspan="5"><strong>SUBTOTAL</strong></td>
                        <td class="numerical-cols"><strong>{{ number_format($total, 2) }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($totalqtr1) ? number_format($totalqtr1, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong></strong></td>
                        <td class="numerical-cols"><strong>{{ ($totalqtr2) ? number_format($totalqtr2, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong></strong></td>
                        <td class="numerical-cols"><strong>{{ ($totalqtr3) ? number_format($totalqtr3, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong></strong></td>
                        <td class="numerical-cols"><strong>{{ ($totalqtr4) ? number_format($totalqtr4, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong></strong></td>
                    </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="5"><strong>GRANDTOTAL</strong></td>
                    <td class="numerical-cols"><strong>{{ number_format($total, 2) }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotalqtr1) ? number_format($grandtotalqtr1, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong></strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotalqtr2) ? number_format($grandtotalqtr2, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong></strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotalqtr3) ? number_format($grandtotalqtr3, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong></strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotalqtr4) ? number_format($grandtotalqtr4, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
</script>