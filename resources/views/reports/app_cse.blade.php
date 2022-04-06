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
<div class="row m-2" id="container">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_app" style="width:100%">
            <thead>
                <tr>
                    <th colspan="3" rowspan="2" class="text-center">Items & Specifications</th>
                    <th rowspan="2" class="text-center small-header">Unit <br>of<br> Measurement</th>
                    <th class="text-center small-header" colspan="20">Monthly Quantity Requirement</th>
                    <th class="text-center small-header" rowspan="2" >Total <br>Quantity <br>for the Year</th>
                    <th class="text-center small-header" rowspan="2" >Price <br>Catalogue</th>
                    <th class="text-center small-header" rowspan="2" >Total Amount <br>for the Year</th>
                </tr>
                <tr>
                    <th class="text-center">Jan</th>
                    <th class="text-center">Feb</th>
                    <th class="text-center">Mar</th>
                    <th class="text-center">Q1</th>
                    <th class="text-center small-header">Q1 <br>Amount</th>
                    <th class="text-center">Apr</th>
                    <th class="text-center">May</th>
                    <th class="text-center">Jun</th>
                    <th class="text-center">Q2</th>
                    <th class="text-center small-header">Q2 <br>Amount</th>
                    <th class="text-center">Jul</th>
                    <th class="text-center">Aug</th>
                    <th class="text-center">Sep</th>
                    <th class="text-center">Q3</th>
                    <th class="text-center small-header">Q3 <br>Amount</th>
                    <th class="text-center">Oct</th>
                    <th class="text-center">Nov</th>
                    <th class="text-center">Dec</th>
                    <th class="text-center">Q4</th>
                    <th class="text-center small-header">Q4 <br>Amount</th>
                </tr>
            </thead>
            <tbody>
                @php ($no = 1)
                @php ($ctr = 1)
                @php ($prev_category = '')
                @php ($row_count = count($items))
                @php ($grandtotal = 0.0)
                @php ($grandtotalqtr1 = 0.0)
                @php ($grandtotalqtr2 = 0.0)
                @php ($grandtotalqtr3 = 0.0)
                @php ($grandtotalqtr4 = 0.0)
                
                @foreach ($items as $item)
                    @php ($count = 0)
                    
                    @if ($item->category != $prev_category)
                        @if ($prev_category)
                            <!-- <tr>
                                <td colspan="5"><strong>SUBTOTAL</strong></td>
                                <td class="numerical-cols"><strong>{{ number_format($subtotal, 2) }}</strong></td>
                                <td class="numerical-cols"><strong></strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotalqtr1) ? number_format($subtotalqtr1, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong></strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotalqtr2) ? number_format($subtotalqtr2, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong></strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotalqtr3) ? number_format($subtotalqtr3, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong></strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotalqtr4) ? number_format($subtotalqtr4, 2) : '' }}</strong></td>
                            </tr> -->
                        @endif

                        <tr>
                            <td colspan="27"><strong>{{ $item->category }}</strong></td>
                        </tr>
                        
                        @php ($prev_category = $item->category)
                        @php ($subtotal = 0.0)
                        @php ($subtotalqtr1 = 0.0)
                        @php ($subtotalqtr2 = 0.0)
                        @php ($subtotalqtr3 = 0.0)
                        @php ($subtotalqtr4 = 0.0)
                    @else
                        @php ($prev_category = $item->category)
                    @endif

                    <tr>
                        @php ($qtyjan = 0)
                        @php ($qtyfeb = 0)
                        @php ($qtymar = 0)
                        @php ($qtyapr = 0)
                        @php ($qtymay = 0)
                        @php ($qtyjun = 0)
                        @php ($qtyjul = 0)
                        @php ($qtyaug = 0)
                        @php ($qtysep = 0)
                        @php ($qtyoct = 0)
                        @php ($qtynov = 0)
                        @php ($qtydec = 0)
                        @php ($qty1_qty = 0)
                        @php ($qty2_qty = 0)
                        @php ($qty3_qty = 0)
                        @php ($qty4_qty = 0)
                        @php ($rem_qty = $item->total_qty)

                        @for($i = 0; $i < $rem_qty; $i)
                            @if ($item->january)
                                @php ($qtyjan += 1)
                                @php ($rem_qty -= 1)
                            @endif
                            @if ($rem_qty)
                                @if ($item->february)
                                    @php ($qtyfeb += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->march)
                                    @php ($qtymar += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->april)
                                    @php ($qtyapr += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->may)
                                    @php ($qtymay += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->june)
                                    @php ($qtyjun += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->july)
                                    @php ($qtyjul += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->august)
                                    @php ($qtyaug += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->september)
                                    @php ($qtysep += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->october)
                                    @php ($qtyoct += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->november)
                                    @php ($qtynov += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                            @if ($rem_qty)
                                @if ($item->december)
                                    @php ($qtydec += 1)
                                    @php ($rem_qty -= 1)
                                @endif
                            @endif
                        @endfor
                        
                        @php ($grandtotalqtr1 += ($item->avg_price * ($qtyjan + $qtyfeb + $qtymar)))
                        @php ($grandtotalqtr2 += ($item->avg_price * ($qtyapr + $qtymay + $qtyjun)))
                        @php ($grandtotalqtr3 += ($item->avg_price * ($qtyjul + $qtyaug + $qtysep)))
                        @php ($grandtotalqtr4 += ($item->avg_price * ($qtyoct + $qtynov + $qtydec)))
                        @php ($grandtotal += ($item->avg_price * $item->total_qty))
                        
                        <td class="" colspan="3">{{ $item->itemname }}</td>
                        <td class="text-center">{{ $item->unit }}</td>
                        <td class="text-center">{{ $qtyjan }}</td>
                        <td class="text-center">{{ $qtyfeb }}</td>
                        <td class="text-center">{{ $qtymar }}</td>
                        <td class="text-center">{{ ($qtyjan + $qtyfeb + $qtymar) }}</td>
                        <td class="numerical-cols">{{ number_format($item->avg_price * ($qtyjan + $qtyfeb + $qtymar), 2) }}</td>
                        <td class="text-center">{{ $qtyapr }}</td>
                        <td class="text-center">{{ $qtymay }}</td>
                        <td class="text-center">{{ $qtyjun }}</td>
                        <td class="text-center">{{ ($qtyapr + $qtymay + $qtyjun) }}</td>
                        <td class="numerical-cols">{{ number_format($item->avg_price * ($qtyapr + $qtymay + $qtyjun), 2) }}</td>
                        <td class="text-center">{{ $qtyjul }}</td>
                        <td class="text-center">{{ $qtyaug }}</td>
                        <td class="text-center">{{ $qtysep }}</td>
                        <td class="text-center">{{ ($qtyjul + $qtyaug + $qtysep) }}</td>
                        <td class="numerical-cols">{{ number_format($item->avg_price * ($qtyjul + $qtyaug + $qtysep), 2) }}</td>
                        <td class="text-center">{{ $qtyoct }}</td>
                        <td class="text-center">{{ $qtynov }}</td>
                        <td class="text-center">{{ $qtydec }}</td>
                        <td class="text-center">{{ ($qtyoct + $qtynov + $qtydec) }}</td>
                        <td class="numerical-cols">{{ number_format($item->avg_price * ($qtyoct + $qtynov + $qtydec), 2) }}</td>
                        <td class="text-center">{{ ($qtyjan + $qtyfeb + $qtymar + $qtyapr + $qtymay + $qtyjun + $qtyjul + $qtyaug + $qtysep + $qtyoct + $qtynov + $qtydec) }}</td>
                        <td class="numerical-cols">{{ number_format($item->avg_price, 2) }}</td>
                        <td class="numerical-cols"><strong>{{ number_format(($item->avg_price * $item->total_qty), 2) }}</strong></td>
                    </tr>
                    @php ($ctr++)
                @endforeach
                <!-- <tr>
                    <td colspan="5"><strong>GRANDTOTAL</strong></td>
                    <td class="numerical-cols"><strong>{{ number_format($grandtotal, 2) }}</strong></td>
                    <td class="numerical-cols"><strong></strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotalqtr1) ? number_format($grandtotalqtr1, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong></strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotalqtr2) ? number_format($grandtotalqtr2, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong></strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotalqtr3) ? number_format($grandtotalqtr3, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong></strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotalqtr4) ? number_format($grandtotalqtr4, 2) : '' }}</strong></td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<script>
</script>