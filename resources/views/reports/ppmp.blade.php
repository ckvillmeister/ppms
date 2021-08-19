<style>
    #container {
        overflow-x: auto;
    }
    #tbl_procurement_list, .footer, .header{
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
        <strong>MUNICIPALITY OF TRINIDAD</strong><br>
        Name of LGU
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
        @php ($total_budget += ($item->price * $item->quantity))
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
        <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_procurement_list" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center" style="width: 150px">General Description</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Estimated Budget</th>
                    <th class="text-center">Procurement Mode</th>
                    @foreach ($months as $month)
                    <th class="text-center" width="">{{ $month }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php ($no = 1)
                @php ($ctr = 1)
                @php ($prev_object_of_expenditure = '')
                @php ($row_count = count($items))
                @php ($price = 0.0)
                @php ($total = 0.0)
                @php ($jan = 0.0)
                @php ($feb = 0.0)
                @php ($mar = 0.0)
                @php ($apr = 0.0)
                @php ($may = 0.0)
                @php ($jun = 0.0)
                @php ($jul = 0.0)
                @php ($aug = 0.0)
                @php ($sep = 0.0)
                @php ($oct = 0.0)
                @php ($nov = 0.0)
                @php ($dec = 0.0)
                @php ($totprice = 0.0)
                @php ($totitem = 0.0)
                @php ($totjan = 0.0)
                @php ($totfeb = 0.0)
                @php ($totmar = 0.0)
                @php ($totapr = 0.0)
                @php ($totmay = 0.0)
                @php ($totjun = 0.0)
                @php ($totjul = 0.0)
                @php ($totaug = 0.0)
                @php ($totsep = 0.0)
                @php ($totoct = 0.0)
                @php ($totnov = 0.0)
                @php ($totdec = 0.0)

                @foreach ($items as $item)
                    @php ($count = 0)
                    
                    @if ($item->obj_exp_name != $prev_object_of_expenditure)
                        @if ($prev_object_of_expenditure)
                            <tr>
                                <td colspan="5"><strong>SUBTOTAL</strong></td>
                                <td class="numerical-cols"><strong>{{ number_format($total, 2) }}</strong></td>
                                <td class="text-center"></td>
                                <td class="numerical-cols"><strong>{{ ($jan) ? number_format($jan, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($feb) ? number_format($feb, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($mar) ? number_format($mar, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($apr) ? number_format($apr, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($may) ? number_format($may, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($jun) ? number_format($jun, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($jul) ? number_format($jul, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($aug) ? number_format($aug, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($sep) ? number_format($sep, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($oct) ? number_format($oct, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($nov) ? number_format($nov, 2) : '' }}</strong></td>
                                <td class="numerical-cols"><strong>{{ ($dec) ? number_format($dec, 2) : '' }}</strong></td>
                            </tr>
                        @endif

                        <tr>
                            <td></td>
                            <td colspan="18"><strong>{{ $item->obj_exp_name }}</strong></td>
                        </tr>
                        
                        @php ($prev_object_of_expenditure = $item->obj_exp_name)
                        @php ($price = 0.0)
                        @php ($total = 0.0)
                        @php ($jan = 0.0)
                        @php ($feb = 0.0)
                        @php ($mar = 0.0)
                        @php ($apr = 0.0)
                        @php ($may = 0.0)
                        @php ($jun = 0.0)
                        @php ($jul = 0.0)
                        @php ($aug = 0.0)
                        @php ($sep = 0.0)
                        @php ($oct = 0.0)
                        @php ($nov = 0.0)
                        @php ($dec = 0.0)
                        @php ($no = 1)
                    @else
                        @php ($prev_object_of_expenditure = $item->obj_exp_name)
                    @endif

                    @php ($price += $item->price)
                    @php ($total += ($item->price * $item->quantity))

                    <tr>
                        @if ($item->january)
                            @php ($count += 1)
                        @endif
                        @if ($item->february)
                            @php ($count += 1)
                        @endif
                        @if ($item->march)
                            @php ($count += 1)
                        @endif
                        @if ($item->april)
                            @php ($count += 1)
                        @endif
                        @if ($item->may)
                            @php ($count += 1)
                        @endif
                        @if ($item->june)
                            @php ($count += 1)
                        @endif
                        @if ($item->july)
                            @php ($count += 1)
                        @endif
                        @if ($item->august)
                            @php ($count += 1)
                        @endif
                        @if ($item->september)
                            @php ($count += 1)
                        @endif
                        @if ($item->october)
                            @php ($count += 1)
                        @endif
                        @if ($item->november)
                            @php ($count += 1)
                        @endif
                        @if ($item->december)
                            @php ($count += 1)
                        @endif

                        @php ($quot = ($item->price * $item->quantity) / $count)
                        @php ($totprice += $item->price)
                        @php ($totitem += ($item->price * $item->quantity))

                        @if ($item->january)
                            @php ($jan += $quot)
                            @php ($totjan += $quot)
                        @endif
                        @if ($item->february)
                            @php ($feb += $quot)
                            @php ($totfeb += $quot)
                        @endif
                        @if ($item->march)
                            @php ($mar += $quot)
                            @php ($totmar += $quot)
                        @endif
                        @if ($item->april)
                            @php ($apr += $quot)
                            @php ($totapr += $quot)
                        @endif
                        @if ($item->may)
                            @php ($may += $quot)
                            @php ($totmay += $quot)
                        @endif
                        @if ($item->june)
                            @php ($jun += $quot)
                            @php ($totjun += $quot)
                        @endif
                        @if ($item->july)
                            @php ($jul += $quot)
                            @php ($totjul += $quot)
                        @endif
                        @if ($item->august)
                            @php ($aug += $quot)
                            @php ($totaug += $quot)
                        @endif
                        @if ($item->september)
                            @php ($sep += $quot)
                            @php ($totsep += $quot)
                        @endif
                        @if ($item->october)
                            @php ($oct += $quot)
                            @php ($totoct += $quot)
                        @endif
                        @if ($item->november)
                            @php ($nov += $quot)
                            @php ($totnov += $quot)
                        @endif
                        @if ($item->december)
                            @php ($dec += $quot)
                            @php ($totdec += $quot)
                        @endif
                        
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $item->itemname }}</td>
                        <td class="text-center">{{ $item->description }}</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="numerical-cols">{{ number_format($item->price, 2) }}</td>
                        <td class="numerical-cols">{{ number_format($item->price * $item->quantity, 2) }}</td>
                        <td class="text-center">{{ $item->mode }}</td>
                        <td class="numerical-cols">{{ ($item->january) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->february) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->march) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->april) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->may) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->june) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->july) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->august) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->september) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->october) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->november) ? number_format($quot, 2) : '' }}</td>
                        <td class="numerical-cols">{{ ($item->december) ? number_format($quot, 2) : '' }}</td>
                    </tr>
                    @php ($ctr++)
                    @if ($row_count < $ctr)
                    <tr>
                        <td colspan="5"><strong>SUBTOTAL</strong></td>
                        <td class="numerical-cols"><strong>{{ number_format($total, 2) }}</strong></td>
                        <td class="text-center"></td>
                        <td class="numerical-cols"><strong>{{ ($jan) ? number_format($jan, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($feb) ? number_format($feb, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($mar) ? number_format($mar, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($apr) ? number_format($apr, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($may) ? number_format($may, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($jun) ? number_format($jun, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($jul) ? number_format($jul, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($aug) ? number_format($aug, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($sep) ? number_format($sep, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($oct) ? number_format($oct, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($nov) ? number_format($nov, 2) : '' }}</strong></td>
                        <td class="numerical-cols"><strong>{{ ($dec) ? number_format($dec, 2) : '' }}</strong></td>
                    </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="5"><strong>GRAND TOTAL</strong></td>
                    <td class="numerical-cols"><strong>{{ number_format($totitem, 2) }}</strong></td>
                    <td class="text-center"></td>
                    <td class="numerical-cols"><strong>{{ ($totjan) ? number_format($totjan, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totfeb) ? number_format($totfeb, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totmar) ? number_format($totmar, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totapr) ? number_format($totapr, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totmay) ? number_format($totmay, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totjun) ? number_format($totjun, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totjul) ? number_format($totjul, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totaug) ? number_format($totaug, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totsep) ? number_format($totsep, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totoct) ? number_format($totoct, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totnov) ? number_format($totnov, 2) : '' }}</strong></td>
                    <td class="numerical-cols"><strong>{{ ($totdec) ? number_format($totdec, 2) : '' }}</strong></td>
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
            <strong>{{ strtoupper($signatories['subhead']->sub_office_in_charge) }}</strong><br>
            {{ $signatories['subhead']->sub_office.'-in-Charge / Head' }}
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