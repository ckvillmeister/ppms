<style>
    #container {
        overflow-x: auto;
    }
    #tbl_ppmp, .footer, .header{
        font-size: 8pt
    }
    .center{
        text-align: center
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
<div class="row header">
    <div class="col-lg-6 col-6">
        <img style="position: absolute; z-index: 1" src="{{ asset('/images/TrinidadLogo.png') }}" height="50" width="50"><br>
        <div style="margin-left:55px">
        <strong>MUNICIPALITY OF TRINIDAD</strong><br>Name of LGU
        </div>
    </div>
    <div class="col-lg-5 col-5">
        <div class="float-right">
        Approved Budget<br>
        Current Year {{ $settings[1]->setting_description }}<br>
        Total
        </div>
    </div>
    <div class="col-lg-1 col-1">
        @php ($total_budget = 0.0)
        @foreach ($items as $item)
        @php ($total_budget += ($item->unit_price * $item->total_qty))
        @endforeach
        <div class="float-right">
            <br>
            <strong>{{ number_format($total_budget, 2) }}</strong><br>
            <strong>{{ number_format($total_budget, 2) }}</strong>
        </div>
    </div>
</div>
<br>
<div class="row header">
    <div class="col-lg-12">
        Name of Office/Unit: <strong>{{ ($deptinfo[0]->sub_office) ? strtoupper($deptinfo[0]->description.' - '.$deptinfo[0]->sub_office) : strtoupper($deptinfo[0]->description) }}</strong>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12 text-center">
        <h2 style="font-size: 14pt"><strong>Project Procurement Management Plan (PPMP)</strong></h2>
        <h2 style="font-size: 14pt"><strong>FY {{ $settings[1]->setting_description }}</strong></h2>
    </div>
</div>
<br>
<div class="row" id="container">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_ppmp" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">AIP Ref. Code</th>
                    <th class="text-center" style="width: 150px">General Description</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Estimated Budget</th>
                    <th class="text-center">Procurement Mode</th>
                    @foreach ($months as $key => $month)
                    <th class="text-center" width="">{{ $key }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php ($no = 1)
                @php ($ctr = 1)
                @php ($row_count = count($items))
                @php ($prev_object_of_expenditure = '')

                @php ($price = 0.0)
                @php ($subtotal = 0.0)
                @php ($grandtotal = 0.0)
                @php ($subtotal_jan = 0.0)
                @php ($subtotal_feb = 0.0)
                @php ($subtotal_mar = 0.0)
                @php ($subtotal_apr = 0.0)
                @php ($subtotal_may = 0.0)
                @php ($subtotal_jun = 0.0)
                @php ($subtotal_jul = 0.0)
                @php ($subtotal_aug = 0.0)
                @php ($subtotal_sep = 0.0)
                @php ($subtotal_oct = 0.0)
                @php ($subtotal_nov = 0.0)
                @php ($subtotal_dec = 0.0)
                @php ($grandtotal_jan = 0.0)
                @php ($grandtotal_feb = 0.0)
                @php ($grandtotal_mar = 0.0)
                @php ($grandtotal_apr = 0.0)
                @php ($grandtotal_may = 0.0)
                @php ($grandtotal_jun = 0.0)
                @php ($grandtotal_jul = 0.0)
                @php ($grandtotal_aug = 0.0)
                @php ($grandtotal_sep = 0.0)
                @php ($grandtotal_oct = 0.0)
                @php ($grandtotal_nov = 0.0)
                @php ($grandtotal_dec = 0.0)
                
                @foreach ($items as $item)
                    @php ($count = 0)
                    
                    @if ($item->obj_exp_name != $prev_object_of_expenditure)
                        @if ($prev_object_of_expenditure)
                            <tr>
                                <td colspan="6"><strong>SUBTOTAL</strong></td>
                                <td class="numerical-cols"><strong>{{ number_format($subtotal, 2) }}</strong></td>
                                <td class="text-center"></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_jan) ? number_format($subtotal_jan, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_feb) ? number_format($subtotal_feb, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_mar) ? number_format($subtotal_mar, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_apr) ? number_format($subtotal_apr, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_may) ? number_format($subtotal_may, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_jun) ? number_format($subtotal_jun, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_jul) ? number_format($subtotal_jul, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_aug) ? number_format($subtotal_aug, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_sep) ? number_format($subtotal_sep, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_oct) ? number_format($subtotal_oct, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_nov) ? number_format($subtotal_nov, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($subtotal_dec) ? number_format($subtotal_dec, 2) : '' }}</strong></td>
                            </tr>
                        @endif

                        <tr>
                            <td></td>
                            <td>{{ $item->aipcode }}</td>
                            <td colspan="18"><strong>{{ $item->obj_exp_name }}</strong></td>
                        </tr>
                        
                        @php ($prev_object_of_expenditure = $item->obj_exp_name)
                        @php ($subtotal = 0.0)
                        @php ($subtotal_jan = 0.0)
                        @php ($subtotal_feb = 0.0)
                        @php ($subtotal_mar = 0.0)
                        @php ($subtotal_apr = 0.0)
                        @php ($subtotal_may = 0.0)
                        @php ($subtotal_jun = 0.0)
                        @php ($subtotal_jul = 0.0)
                        @php ($subtotal_aug = 0.0)
                        @php ($subtotal_sep = 0.0)
                        @php ($subtotal_oct = 0.0)
                        @php ($subtotal_nov = 0.0)
                        @php ($subtotal_dec = 0.0)
                        @php ($no = 1)
                    @else
                        @php ($prev_object_of_expenditure = $item->obj_exp_name)
                    @endif

                    @php ($subtotal += ($item->unit_price * $item->total_qty))
                    @php ($grandtotal += ($item->unit_price * $item->total_qty))
                    
                    <tr>
                        @if ($item->january)
                            @php ($subtotal_jan += ($item->unit_price * $item->january))
                            @php ($grandtotal_jan += ($item->unit_price * $item->january))
                        @endif
                        @if ($item->february)
                            @php ($subtotal_feb += ($item->unit_price * $item->february))
                            @php ($grandtotal_feb += ($item->unit_price * $item->february))
                        @endif
                        @if ($item->march)
                            @php ($subtotal_mar += ($item->unit_price * $item->march))
                            @php ($grandtotal_mar += ($item->unit_price * $item->march)))
                        @endif
                        @if ($item->april)
                            @php ($subtotal_apr += ($item->unit_price * $item->april))
                            @php ($grandtotal_apr += ($item->unit_price * $item->april))
                        @endif
                        @if ($item->may)
                            @php ($subtotal_may += ($item->unit_price * $item->may))
                            @php ($grandtotal_may += ($item->unit_price * $item->may))
                        @endif
                        @if ($item->june)
                            @php ($subtotal_jun += ($item->unit_price * $item->june))
                            @php ($grandtotal_jun += ($item->unit_price * $item->june))
                        @endif
                        @if ($item->july)
                            @php ($subtotal_jul += ($item->unit_price * $item->july))
                            @php ($grandtotal_jul += ($item->unit_price * $item->july))
                        @endif
                        @if ($item->august)
                            @php ($subtotal_aug += ($item->unit_price * $item->august))
                            @php ($grandtotal_aug += ($item->unit_price * $item->august))
                        @endif
                        @if ($item->september)
                            @php ($subtotal_sep += ($item->unit_price * $item->september))
                            @php ($grandtotal_sep += ($item->unit_price * $item->september))
                        @endif
                        @if ($item->october)
                            @php ($subtotal_oct += ($item->unit_price * $item->october))
                            @php ($grandtotal_oct += ($item->unit_price * $item->october))
                        @endif
                        @if ($item->november)
                            @php ($subtotal_nov += ($item->unit_price * $item->november))
                            @php ($grandtotal_nov += ($item->unit_price * $item->november))
                        @endif
                        @if ($item->december)
                            @php ($subtotal_dec += ($item->unit_price * $item->december))
                            @php ($grandtotal_dec += ($item->unit_price * $item->december))
                        @endif
                        
                        <td class="text-center">{{ $no++ }}</td>
                        <td></td>
                        <td class="text-center">{{ $item->itemname }}</td>
                        <td class="text-center">{{ $item->unit }}</td>
                        <td class="text-center">{{ $item->total_qty }}</td>
                        <td class="numerical-cols">{{ number_format($item->unit_price, 2) }}</td>
                        <td class="numerical-cols">{{ number_format($item->unit_price * $item->total_qty, 2) }}</td>
                        <td class="text-center">{{ $item->mode }}</td>
                        <td class="numerical-cols">{{ ($item->january) ? number_format(($item->unit_price * $item->january), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->february) ? number_format(($item->unit_price * $item->february), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->march) ? number_format(($item->unit_price * $item->march), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->april) ? number_format(($item->unit_price * $item->april), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->may) ? number_format(($item->unit_price * $item->may), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->june) ? number_format(($item->unit_price * $item->june), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->july) ? number_format(($item->unit_price * $item->july), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->august) ? number_format(($item->unit_price * $item->august), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->september) ? number_format(($item->unit_price * $item->september), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->october) ? number_format(($item->unit_price * $item->october), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->november) ? number_format(($item->unit_price * $item->november), 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->december) ? number_format(($item->unit_price * $item->december), 2) : '' }}</td>
                    </tr>
                    @php ($ctr++)
                    @if ($row_count < $ctr)
                    <tr>
                        <td colspan="6"><strong>SUBTOTAL</strong></td>
                        <td class="numerical-cols"><strong>{{ number_format($subtotal, 2) }}</strong></td>
                        <td class="text-center"></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_jan) ? number_format($subtotal_jan, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_feb) ? number_format($subtotal_feb, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_mar) ? number_format($subtotal_mar, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_apr) ? number_format($subtotal_apr, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_may) ? number_format($subtotal_may, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_jun) ? number_format($subtotal_jun, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_jul) ? number_format($subtotal_jul, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_aug) ? number_format($subtotal_aug, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_sep) ? number_format($subtotal_sep, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_oct) ? number_format($subtotal_oct, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_nov) ? number_format($subtotal_nov, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($subtotal_dec) ? number_format($subtotal_dec, 2) : '' }}</strong></td>
                    </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="6"><strong>GRAND TOTAL</strong></td>
                    <td class="numerical-cols"><strong>{{ number_format($grandtotal, 2) }}</strong></td>
                    <td class="text-center"></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_jan) ? number_format($grandtotal_jan, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_feb) ? number_format($grandtotal_feb, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_mar) ? number_format($grandtotal_mar, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_apr) ? number_format($grandtotal_apr, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_may) ? number_format($grandtotal_may, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_jun) ? number_format($grandtotal_jun, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_jul) ? number_format($grandtotal_jul, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_aug) ? number_format($grandtotal_aug, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_sep) ? number_format($grandtotal_sep, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_oct) ? number_format($grandtotal_oct, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_nov) ? number_format($grandtotal_nov, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($grandtotal_dec) ? number_format($grandtotal_dec, 2) : '' }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="footer">
    <div class="row">
        <div class="col-lg-3 col-3">
            Prepared by:
        </div>
        <div class="col-lg-3 col-3">
            Recommended by:
        </div>
        <div class="col-lg-3 col-3">
            Reviewed by:
        </div>
        <div class="col-lg-3 col-3">
            Approved by:
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-3 col-3 center">
            <br><br><br>
            <strong>{{ strtoupper($signatories['head']->office_head) }}</strong><br>
            Department Head<br><br><br><br>

            @if ($signatories['subhead']->sub_office)

                @if ($signatories['subhead']->sub_office_in_charge != $signatories['head']->office_head)
                <strong>{{ strtoupper($signatories['subhead']->sub_office_in_charge) }}</strong><br>
                {{ $signatories['subhead']->position }}
                @endif
                
            @endif
        </div>
        <div class="col-lg-3 col-3 center">
            <br><br><br>
            <strong>{{ strtoupper($signatories['gso']->office_head) }}</strong><br>
            General Services Officer
        </div>
        <div class="col-lg-3 col-3 center">
            <br><br><br>
            <strong>{{ strtoupper($signatories['mbo']->office_head) }}</strong><br>
            Municipal Budget Officer
        </div>
        <div class="col-lg-3 col-3 center">
            <br><br><br>
            <strong>{{ strtoupper($signatories['mayor']->office_head) }}</strong><br>
            Municipal Mayor
        </div>
    </div>
</div>
<br><br><br>

<script>
//     var tbl_proc_list = $('#tbl_procurement_list').DataTable({
//     "scrollX": true,
//     "ordering": false,
//     paging: false,
//     searching: false,
//     info: false,
//     styles: {
//       tableHeader: {
//         fontSize: 8
//       }
//     }
//   });
</script>