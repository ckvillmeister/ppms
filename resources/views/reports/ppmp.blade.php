<div class="row">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_procurement_list">
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
                @php ($prev_category = '')
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
                    
                    @if ($item->category != $prev_category)
                        @if ($prev_category)
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="numerical-cols"><strong>{{ number_format($price, 2) }}</strong></td>
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
                            <td>{{ $categories[$item->category] }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                        @php ($prev_category = $item->category)
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
                        @php ($prev_category = $item->category)
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
                        <td class="text-center">{{ $item->uom }}</td>
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
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="numerical-cols"><strong>{{ number_format($price, 2) }}</strong></td>
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
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="numerical-cols"><strong>{{ number_format($totprice, 2) }}</strong></td>
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

<script>
    var tbl_proc_list = $('#tbl_procurement_list').DataTable({
    "scrollX": true,
    "ordering": false,
    paging: false,
    searching: false,
    info: false,
    styles: {
      tableHeader: {
        fontSize: 8
      }
    }
  });
</script>