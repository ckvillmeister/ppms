<table class="table table-sm table-bordered display bg-white" id="tbl_procurement_list" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center text-xs">No.</th>
            <th class="text-center text-xs" width="7.5%">AIP Ref. Code</th>
            <th class="text-center text-xs" width="15%">General Description</th>
            <th class="text-center text-xs">Unit</th>
            <th class="text-center text-xs">Qty</th>
            <th class="text-center text-xs">Price</th>
            <th class="text-center text-xs">Estimated Budget</th>
            <th class="text-center text-xs">Procurement Mode</th>
            @foreach ($months as $key => $month)
            <th class="text-center text-xs" width="">{{ $key }}</th>
            @endforeach
            <th class="text-center text-xs" width="7.5%">Control</th>
        </tr>
    </thead>
    <tbody>
        @if ($items)
            @php ($ctr = 1)
            @php ($grandtotal = 0.0)
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
            @foreach ($objects as $object)
                <tr class="bg-primary">
                    <td></td>
                    <td>{{ $object->aipcode }}</td>
                    <td colspan="19"><span class="text-xs">{{ $object->object()->where('id', $object->object)->first()->obj_exp_name }} - Approved Budget: {{ number_format($object->amount, 2) }}</span></td>
                </tr>
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
                @php ($total_per_object = 0)
                @foreach ($items as $item)
                    @if ($object->object == $item->object)
                        @php ($jan += ($item->january) ? $item->january * $item->price : 0)
                        @php ($feb += ($item->february) ? $item->february * $item->price : 0)
                        @php ($mar += ($item->march) ? $item->march * $item->price : 0)
                        @php ($apr += ($item->april) ? $item->april * $item->price : 0)
                        @php ($may += ($item->may) ? $item->may * $item->price : 0)
                        @php ($jun += ($item->june) ? $item->june * $item->price : 0)
                        @php ($jul += ($item->july) ? $item->july * $item->price : 0)
                        @php ($aug += ($item->august) ? $item->august * $item->price : 0)
                        @php ($sep += ($item->september) ? $item->september * $item->price : 0)
                        @php ($oct += ($item->october) ? $item->october * $item->price : 0)
                        @php ($nov += ($item->november) ? $item->november * $item->price : 0)
                        @php ($dec += ($item->december) ? $item->december * $item->price : 0)
                        @php ($grandtotal += ($item->price * $item->quantity))
                        @php ($grandtotal_jan += ($item->january) ? $item->january * $item->price : 0)
                        @php ($grandtotal_feb += ($item->february) ? $item->february * $item->price : 0)
                        @php ($grandtotal_mar += ($item->march) ? $item->march * $item->price : 0)
                        @php ($grandtotal_apr += ($item->april) ? $item->april * $item->price : 0)
                        @php ($grandtotal_may += ($item->may) ? $item->may * $item->price : 0)
                        @php ($grandtotal_jun += ($item->june) ? $item->june * $item->price : 0)
                        @php ($grandtotal_jul += ($item->july) ? $item->july * $item->price : 0)
                        @php ($grandtotal_aug += ($item->august) ? $item->august * $item->price : 0)
                        @php ($grandtotal_sep += ($item->september) ? $item->september * $item->price : 0)
                        @php ($grandtotal_oct += ($item->october) ? $item->october * $item->price : 0)
                        @php ($grandtotal_nov += ($item->november) ? $item->november * $item->price : 0)
                        @php ($grandtotal_dec += ($item->december) ? $item->december * $item->price : 0)
                        @php ($total_per_object += ($item->price * $item->quantity))
                        @php ($this_price = ($item->price * $item->quantity))
                        @php ($this_months_total = 0.0)
                        <tr data-id="{{ $item->id }}">
                            <td class="text-xs text-center">{{ $ctr++ }}</td>
                            <!-- <td class="text-xs text-center">{{ ($object->aipcode()->where('year', $object->year)->first()   ) ? $object->aipcode()->where('year', $object->year)->first()->aipcode : '' }}</td> -->
                            <td class="text-xs text-center"></td>
                            <td class="text-xs" style="cursor: pointer; white-space: pre-wrap">{{ $item->itemname }}</td>
                            <td class="text-xs text-center" style="cursor: pointer;">{{ $item->unit }}</td>
                            <td class="text-xs text-center" style="cursor: pointer;">{{ $item->quantity }}</td>
                            <td class="text-xs text-right" style="cursor: pointer;">{{ number_format($item->price, 2) }}</td>
                            <td class="text-xs text-right">{{ number_format(($item->price * $item->quantity), 2) }}</td>
                            <td class="text-xs text-center" style="cursor: pointer">{{ $item->mode }}</td>
                            @foreach ($months as $key => $month)
                                @if (strtolower($month) == 'january')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->january }}">
                                    {{ ($item->january) ? number_format((floatval($item->january) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->january) ? floatval($item->january) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'february')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->february }}">
                                    {{ ($item->february) ? number_format((floatval($item->february) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->february) ? floatval($item->february) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'march')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->march }}">
                                    {{ ($item->march) ? number_format((floatval($item->march) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->march) ? floatval($item->march) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'april')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->april }}">
                                    {{ ($item->april) ? number_format((floatval($item->april) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->april) ? floatval($item->april) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'may')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->may }}">
                                    {{ ($item->may) ? number_format((floatval($item->may) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->may) ? floatval($item->may) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'june')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->june }}">
                                    {{ ($item->june) ? number_format((floatval($item->june) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->june) ? floatval($item->june) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'july')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->july }}">
                                    {{ ($item->july) ? number_format((floatval($item->july) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->july) ? floatval($item->july) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'august')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->august }}">
                                    {{ ($item->august) ? number_format((floatval($item->august) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->august) ? floatval($item->august) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'september')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->september }}">
                                    {{ ($item->september) ? number_format((floatval($item->september) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->september) ? floatval($item->september) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'october')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->october }}">
                                    {{ ($item->october) ? number_format((floatval($item->october) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->october) ? floatval($item->october) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'november')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->november }}">
                                    {{ ($item->november) ? number_format((floatval($item->november) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->november) ? floatval($item->november) * $item->price : 0)
                                    </td>
                                @elseif (strtolower($month) == 'december')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->december }}">
                                    {{ ($item->december) ? number_format((floatval($item->december) * $item->price), 2) : '' }}
                                    @php ($this_months_total += ($item->december) ? floatval($item->december) * $item->price : 0)
                                    </td>
                                @endif
                            @endforeach
                            <td class="text-center">
                                @if ($this_price != $this_months_total)
                                    <i class="fas fa-exclamation mr-2" data-toggle="tooltip" data-placement="top" title="Quantity Distribution per Month is not equal with total quantity"></i>
                                @endif
                                
                                @if ($item->mode == 'Public Bidding')
                                <button class="btn btn-sm btn-success" id="btn-show-set-schedule" value="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Add Procurement Schedule"><i class="fas fa-plus"></i></button>
                                @endif
                                <button class="btn btn-sm btn-warning" onclick="editPPMPItem({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Edit PPMP Item"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" onclick="deletePPMPItem({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Delete PPMP Item"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr class="bg-light">
                    <td class="text-xs" colspan="6">Total:</td>
                    <td class="text-xs text-right"><strong>{{ number_format($total_per_object, 2) }}</strong></td>
                    <td class="text-xs"></td>
                    <td class="text-xs text-right"><strong>{{ ($jan) ? number_format($jan, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($feb) ? number_format($feb, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($mar) ? number_format($mar, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($apr) ? number_format($apr, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($may) ? number_format($may, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($jun) ? number_format($jun, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($jul) ? number_format($jul, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($aug) ? number_format($aug, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($sep) ? number_format($sep, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($oct) ? number_format($oct, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($nov) ? number_format($nov, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($dec) ? number_format($dec, 2) : '' }}</strong></td>
                    <td class="text-xs text-center">
                        <button class="btn btn-xs btn-primary form-control form-control-sm" id="new-item" value="{{ $object->object }}"><i class="fas fa-plus mr-2"></i>New</button>
                    </td>
                </tr>
            @endforeach
        @endif
        <tr class="bg-gray">
            <td class="text-xs" colspan="6">Grand Total:</td>
            <td class="text-xs text-right"><strong>{{ number_format($grandtotal, 2) }}</strong></td>
            <td class="text-xs"></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_jan) ? number_format($grandtotal_jan, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_feb) ? number_format($grandtotal_feb, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_mar) ? number_format($grandtotal_mar, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_apr) ? number_format($grandtotal_apr, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_may) ? number_format($grandtotal_may, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_jun) ? number_format($grandtotal_jun, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_jul) ? number_format($grandtotal_jul, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_aug) ? number_format($grandtotal_aug, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_sep) ? number_format($grandtotal_sep, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_oct) ? number_format($grandtotal_oct, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_nov) ? number_format($grandtotal_nov, 2) : '' }}</strong></td>
            <td class="text-xs text-right"><strong>{{ ($grandtotal_dec) ? number_format($grandtotal_dec, 2) : '' }}</strong></td>
            <td class="text-xs"></td>
        </tr>
    </tbody>
</table>
<br>
<div class="modal fade" id="modal_item_list" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Item List</h5>
      </div>
      <div class="modal-body">

        <div id="listitems"></div>

      </div>
      <div class="modal-footer">
        <div class="float-right">
            <button type="button" class="btn btn-sm btn-danger" id="btn-close-procurement" data-dismiss="modal" style="width:150px"><i class="fas fa-window-close mr-2"></i>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_procurement_schedule" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header card-primary card-outline">
            <h5 class="modal-title" id="modal_title">Schedule for Each Procurement Activity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        <div class="row mt-3">
            <div class="col-lg-5">
                <label class="text-xs">Posting of IB/REI:</label>
            </div>
            <div class="col-lg-7">
                <input type="date" class="form-control form-control-sm" name="advertisement" id="advertisement">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-5">
                <label class="text-xs">Submission/Opening of Bids:</label>
            </div>
            <div class="col-lg-7">
                <input type="date" class="form-control form-control-sm" name="bidding" id="bidding">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-5">
                <label class="text-xs">Notice of Award:</label>
            </div>
            <div class="col-lg-7">
                <input type="date" class="form-control form-control-sm" name="award" id="award">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-5">
                <label class="text-xs">Contract Signing:</label>
            </div>
            <div class="col-lg-7">
                <input type="date" class="form-control form-control-sm" name="contract_signing" id="contract_signing">
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <div class="float-right">
            <button type="button" class="btn btn-sm btn-primary" id="btn-submit-procurement-sched" data-dismiss="modal" style="width:150px"><i class="fas fa-save mr-2"></i>Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_procurement_item_edit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Edit Item Procurement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div id="itemform"></div>

      </div>
      <div class="modal-footer">
        <div class="float-right">
        <button type="button" class="btn btn-sm btn-primary" id="btn-update-procurement-item" data-dismiss="modal" style="width:150px"><i class="fas fa-save mr-2"></i>Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    var selected_col_index, selected_row_index, selected_id;

    // var tbl_proc_list = $('#tbl_procurement_list').DataTable({
    //     "scrollX": true,
    //     "ordering": false,
    //     paging: false,
    //     styles: {
    //     tableHeader: {
    //         fontSize: 8
    //     }
    //     },
    //     'columnDefs': [
    //         {
    //             targets: [5, 6],
    //             className: 'numerical-cols'
    //             // 'createdCell':  function (td, data, rowData, row, col) {
    //             //       $(td).attr('id', data); 
    //             // }
    //         },
    //         {
    //             targets: [0, 1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19],
    //             className: 'text-center'
    //         },
    //         {
    //             targets: 4,
    //             'createdCell':  function (td, data, rowData, row, col) {
    //                 $(td).attr('id', 'quantity-col'); 
    //             }
    //         }
    //     ]
    // });

    $('#objects').select2({dropdownCssClass: "font"});

    $('#tbl_procurement_list').on('click', '#new-item', function(){
        var object = $('#objects').val();
        var rowindex = $(this).closest('tr');
        var objectid = $(this).val();
        //td:eq(1)

        // if (object == '' || object == 0){
        //     message('Error', 'red', "Please select object of expenditure first!");
        // }
        // else{
            $.ajax({
                headers: {
                    'x-csrf-token': token
                },
                url: '/ppmp/getnewprocurementform',
                method: 'POST',
                data: {objectid: objectid},
                dataType: 'HTML',
                beforeSend: function() {
                    $('#basicloader').show();
                },
                complete: function(){
                    $('#basicloader').hide();
                },
                success: function(result) {
                    //$("#" + id + ).closest( "tr" ).after( ... );
                   // $('#tbl_procurement_list').append(result);
                    $(result).insertAfter(rowindex);
                    //$('#tbl_procurement_list > tbody').eq(rowindex + 1).append(result);
                },
                error: function(obj, msg, exception){
                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                }
            })
        //}
    });

    // $('#tbl_procurement_list tbody td').dblclick(function() {
    //     var td = $(this),
    //         colindex = $(this).index(),
    //         rowindex = $(this).closest('tr').index(),
    //         id = $(this).closest('tr').attr('data-id'),
    //         attribute = '',
    //         title = '',
    //         content = '';
        
    //     if (jQuery.inArray(colindex, [2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]) !== -1){
    //         if (colindex == 2){
    //             title = "Select / Type New Item";
    //             attribute = "itemname";

    //             $.ajax({
    //                 headers: {
    //                     'x-csrf-token': token
    //                 },
    //                 'async': false,
    //                 url: '/ppmp/getitems',
    //                 method: 'POST',
    //                 dataType: 'HTML',
    //                 success: function(result) {
    //                     content = result;
    //                 },
    //                 error: function(obj, msg, exception){
    //                     message('Error', 'red', msg + ": " + obj.status + " " + exception);
    //                 }
    //             })
    //         }
    //         if (colindex == 3){
    //             title = "Select / Type New Unit";
    //             attribute = "unit";

    //             $.ajax({
    //                 headers: {
    //                     'x-csrf-token': token
    //                 },
    //                 'async': false,
    //                 url: '/ppmp/getunits',
    //                 method: 'POST',
    //                 dataType: 'HTML',
    //                 success: function(result) {
    //                     content = result;
    //                 },
    //                 error: function(obj, msg, exception){
    //                     message('Error', 'red', msg + ": " + obj.status + " " + exception);
    //                 }
    //             })
    //         }
    //         else if (colindex == 4){
    //             title = "Enter New Quantity";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "quantity";
    //         }
    //         else if (colindex == 5){
    //             title = "Enter New Price";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "price";
    //         }
    //         else if (colindex == 7){
    //             title = "Select New Mode of Procurement";
    //             content = "<select class='form form-control' id='txt-field' autofocus>@foreach($mode as $m) <option value='{{ $m }}'>{{ $m }}</option> @endforeach</select>";
    //             attribute = "mode";
    //         }
    //         else if (colindex == 8){
    //             title = "Enter New Quantity for Month of January";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "january";
    //         }
    //         else if (colindex == 9){
    //             title = "Enter New Quantity for Month of February";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "february";
    //         }
    //         else if (colindex == 10){
    //             title = "Enter New Quantity for Month of March";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "march";
    //         }
    //         else if (colindex == 11){
    //             title = "Enter New Quantity for Month of April";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "april";
    //         }
    //         else if (colindex == 12){
    //             title = "Enter New Quantity for Month of May";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "may";
    //         }
    //         else if (colindex == 13){
    //             title = "Enter New Quantity for Month of June";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "june";
    //         }
    //         else if (colindex == 14){
    //             title = "Enter New Quantity for Month of July";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "july";
    //         }
    //         else if (colindex == 15){
    //             title = "Enter New Quantity for Month of August";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "august";
    //         }
    //         else if (colindex == 16){
    //             title = "Enter New Quantity for Month of September";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "september";
    //         }
    //         else if (colindex == 17){
    //             title = "Enter New Quantity for Month of October";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "october";
    //         }
    //         else if (colindex == 18){
    //             title = "Enter New Quantity for Month of November";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "november";
    //         }
    //         else if (colindex == 19){
    //             title = "Enter New Quantity for Month of December";
    //             content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
    //             attribute = "december";
    //         }

    //         $.confirm({
    //             escapeKey: "cancel",
    //             title: title,
    //             content: content,
    //             buttons: {
    //                 save: function () {
    //                     var strValue = $('#txt-field').val();

    //                     if(jQuery.inArray(colindex, [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]) !== -1){
    //                         var orig_qty = td.closest('tr').find('td:eq(' + colindex + ')').attr('data-qty');
    //                         td.closest('tr').find('td:eq(' + colindex + ')').attr({'data-qty': strValue});
                            
    //                         var mainqty = td.closest('tr').find('td:eq(4)').text();
    //                         var totalqty = 0;
    //                         var jan = td.closest('tr').find('td:eq(8)').attr('data-qty') ? td.closest('tr').find('td:eq(8)').attr('data-qty') : 0,
    //                             feb = td.closest('tr').find('td:eq(9)').attr('data-qty') ? td.closest('tr').find('td:eq(9)').attr('data-qty') : 0,
    //                             mar = td.closest('tr').find('td:eq(10)').attr('data-qty') ? td.closest('tr').find('td:eq(10)').attr('data-qty') : 0,
    //                             apr = td.closest('tr').find('td:eq(11)').attr('data-qty') ? td.closest('tr').find('td:eq(11)').attr('data-qty') : 0,
    //                             may = td.closest('tr').find('td:eq(12)').attr('data-qty') ? td.closest('tr').find('td:eq(12)').attr('data-qty') : 0,
    //                             jun = td.closest('tr').find('td:eq(13)').attr('data-qty') ? td.closest('tr').find('td:eq(13)').attr('data-qty') : 0,
    //                             jul = td.closest('tr').find('td:eq(14)').attr('data-qty') ? td.closest('tr').find('td:eq(14)').attr('data-qty') : 0,
    //                             aug = td.closest('tr').find('td:eq(15)').attr('data-qty') ? td.closest('tr').find('td:eq(15)').attr('data-qty') : 0,
    //                             sep = td.closest('tr').find('td:eq(16)').attr('data-qty') ? td.closest('tr').find('td:eq(16)').attr('data-qty') : 0,
    //                             oct = td.closest('tr').find('td:eq(17)').attr('data-qty') ? td.closest('tr').find('td:eq(17)').attr('data-qty') : 0,
    //                             nov = td.closest('tr').find('td:eq(18)').attr('data-qty') ? td.closest('tr').find('td:eq(18)').attr('data-qty') : 0,
    //                             dec = td.closest('tr').find('td:eq(19)').attr('data-qty') ? td.closest('tr').find('td:eq(19)').attr('data-qty') : 0;

    //                         var per_month_total = parseInt(jan) + parseInt(feb) + parseInt(mar) + parseInt(apr) + parseInt(may) + parseInt(jun) + parseInt(jul) + parseInt(aug) + parseInt(sep) + parseInt(oct) + parseInt(nov) + parseInt(dec);
                            
    //                         // if (parseInt(per_month_total) != parseInt(mainqty)){
    //                         //     td.closest('tr').find('td:eq(' + colindex + ')').attr({'data-qty': orig_qty});
    //                         //     message('Error', 'red',"Quantity allocated per month is not equal with the total quantity!");
    //                         // }
    //                         // else{
    //                             $.ajax({
    //                                 headers: {
    //                                     'x-csrf-token': token
    //                                 },
    //                                 url: '/ppmp/update/' + attribute,
    //                                 method: 'POST',
    //                                 data: {'id': id, 'attr': attribute, 'value': $('#txt-field').val()},
    //                                 dataType: 'HTML',
    //                                 success: function(result) {
    //                                     var dept = $('#departments').val(),
    //                                         year = $('#cbo_year').val();

    //                                         retrieveProcurementItems(dept, year);
    //                                 },
    //                                 error: function(obj, msg, exception){
    //                                     message('Error', 'red', msg + ": " + obj.status + " " + exception);
    //                                 }
    //                             })
    //                         //}
    //                     }
    //                     else{
    //                         $.ajax({
    //                             headers: {
    //                                 'x-csrf-token': token
    //                             },
    //                             url: '/ppmp/update/' + attribute,
    //                             method: 'POST',
    //                             data: {'id': id, 'attr': attribute, 'value': strValue},
    //                             dataType: 'HTML',
    //                             success: function(result) {
    //                                 if (colindex == 2){
    //                                     td.closest('tr').find('td:eq(2)').text(strValue);
    //                                 }
    //                                 else if (colindex == 3){
    //                                     td.closest('tr').find('td:eq(3)').text(strValue);
    //                                 }
    //                                 else if (colindex == 4 || colindex == 5){
    //                                     td.closest('tr').find('td:eq(' + colindex + ')').text(strValue);

    //                                     var dept = $('#departments').val(),
    //                                         year = $('#cbo_year').val();

    //                                     retrieveProcurementItems(dept, year);
    //                                 }
    //                                 else if (colindex == 7){
    //                                     td.closest('tr').find('td:eq(7)').text(strValue);
    //                                 }
                                    
    //                             },
    //                             error: function(obj, msg, exception){
    //                                 message('Error', 'red', msg + ": " + obj.status + " " + exception);
    //                             }
    //                         })
    //                     }
    //                 },
    //                 cancel: function () {
                        
    //                 }
    //             }
    //         });
    //     }
    // });

    function changeMonth(id, month){
        var status = $(event.target).is(":checked");

        $.ajax({
            headers: {
                'x-csrf-token': token
            },
            url: '/ppmp/toggleprocurementitemmonth',
            method: 'POST',
            data: {'deptid': $('#departments').val(), 'id': id, 'month': month, 'status': status},
            dataType: 'HTML',
            beforeSend: function() {
                $('#basicloader').show();
            },
            complete: function(){
                $('#basicloader').hide();
            },
            success: function(result) {
                
            },
            error: function(obj, msg, exception){
                message('Error', 'red', msg + ": " + obj.status + " " + exception);
            }
        })
    }

    function editPPMPItem(id){
        $.ajax({
            headers: {
                'x-csrf-token': token
            },
            url: '/ppmp/edititem',
            method: 'POST',
            data: {form: 1, id: id},
            dataType: 'HTML',
            success: function(result) {
                $('#itemform').html(result);
                $('#modal_procurement_item_edit').modal({
                                    backdrop: 'static',
                                    keyboard: true, 
                                    show: true});
                
            },
            error: function(obj, msg, exception){
                message('Error', 'red', msg + ": " + obj.status + " " + exception);
            }
        })
    }

    function deletePPMPItem(id){
        $.confirm({
            title: "Remove PPMP Item",
            type: "blue",
            content: "This is an irreversible action. Are you sure you want to remove this item?",
            buttons: {
                confirm: function () {
                    $.ajax({
                        headers: {
                            'x-csrf-token': token
                        },
                        url: '/ppmp/toggleprocurementitemstatus',
                        method: 'POST',
                        data: {'deptid': $('#departments').val(), 'id': id, 'status': 0},
                        dataType: 'HTML',
                        success: function(result) {
                            if (result == 1){
                                var dept = $('#departments').val(),
                                year = $('#cbo_year').val();

                                retrieveProcurementItems(dept, year);
                            }
                            else if (result == 2){
                                message('Error', 'red', "Cannot delete this item. Procurement plan is already approved!");
                            }
                            else if (result == 3){
                                message('Error', 'red', "Creating / modification of procurement plan is already closed!");
                            }
                            else{
                                message('Error', 'red', "Error during processing!");
                            }
                        },
                        error: function(obj, msg, exception){
                            message('Error', 'red', msg + ": " + obj.status + " " + exception);
                        }
                    })
                },
                cancel: function () {
                    
                }
            }
        });
    }

    $('#btn-show-set-schedule').on('click', function(){
        var id = $(this).val();

        $.ajax({
            headers: {
                'x-csrf-token': token
            },
            url: '/ppmp/getprocsched',
            method: 'POST',
            data: {'id': id},
            dataType: 'JSON',
            success: function(result) {
                $('#advertisement').val('');
                $('#bidding').val('');
                $('#award').val('');
                $('#contract_signing').val('');

                if (result){
                    $('#advertisement').val(result['advertisement']);
                    $('#bidding').val(result['bidding']);
                    $('#award').val(result['award']);
                    $('#contract_signing').val(result['contract_signing']);
                }
                
                $('#btn-submit-procurement-sched').val(id);
                $('#modal_procurement_schedule').modal({
                                            backdrop: 'static',
                                            keyboard: true, 
                                            show: true});
            },
            error: function(obj, msg, exception){
                message('Error', 'red', msg + ": " + obj.status + " " + exception);
            }
        })

        
    });

    $('#btn-submit-procurement-sched').on('click', function(){
        var id = $(this).val(),
            advertisement = $('#advertisement').val(),
            bidding = $('#bidding').val(),
            award = $('#award').val(),
            contract_signing = $('#contract_signing').val();

        $.ajax({
            headers: {
                'x-csrf-token': token
            },
            url: '/ppmp/setprocsched',
            method: 'POST',
            data: {'id': id, 'advertisement': advertisement, 'bidding': bidding, 'award': award, 'contract_signing': contract_signing},
            dataType: 'HTML',
            success: function(result) {
                if (result == 1){
                    $.alert({
                        title: 'Saved',
                        type: 'blue',
                        content: "Procurement schedule successfully set!",
                        buttons: {
                            ok: function(){
                                $('#modal_procurement_schedule').modal('hide');
                            }
                        }
                    })
                }
                else{
                    message('Error', 'red', "Error during processing!");
                }
            },
            error: function(obj, msg, exception){
                message('Error', 'red', msg + ": " + obj.status + " " + exception);
            }
        })
    });


    
</script>

<script>
    $("body .months").inputmask('decimal');
    $("body #qty").inputmask('decimal');
    $("body #price").inputmask('decimal', {'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'});
    $("body #total").inputmask('decimal', {'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'});

    function compute(){
        var qty = $(event.target).closest('tr').find('#qty').val();
        var price = $(event.target).closest('tr').find('#price').val().replace(',', '');

        if (!(qty == '' || qty == 0 || price == '' || price == 0)){
            var total = parseFloat(qty) * parseFloat(price);
            $(event.target).closest('tr').find('#total').val(total);
        }
    }

    function addProcurement(objectid){
        
        var dept = $('#departments').val(),
            year = $('#cbo_year').val(),
            itemname = $(event.target).closest('tr').find('#item').val(),
            unit = $(event.target).closest('tr').find('#unit').val(),
            object = $('#objects').val(),
            //qty = $(event.target).closest('tr').find('#qty').val(),
            price = $(event.target).closest('tr').find('#price').val(),
            mode = $(event.target).closest('tr').find('#mode').val(),
            jan = $('#January').val() ? $('#January').val() : 0,
            feb = $('#February').val() ? $('#February').val() : 0,
            mar = $('#March').val() ? $('#March').val() : 0,
            apr = $('#April').val() ? $('#April').val() : 0,
            may = $('#May').val() ? $('#May').val() : 0,
            jun = $('#June').val() ? $('#June').val() : 0,
            jul = $('#July').val() ? $('#July').val() : 0,
            aug = $('#August').val() ? $('#August').val() : 0,
            sep = $('#September').val() ? $('#September').val() : 0,
            oct = $('#October').val() ? $('#October').val() : 0,
            nov = $('#November').val() ? $('#November').val() : 0,
            dec = $('#December').val() ? $('#December').val() : 0;
        var per_month_total = parseInt(jan) + parseInt(feb) + parseInt(mar) + parseInt(apr) + parseInt(may) + parseInt(jun) + parseInt(jul) + parseInt(aug) + parseInt(sep) + parseInt(oct) + parseInt(nov) + parseInt(dec);
        
        if (itemname == ''){
            message('Error', 'red',"Please select / provide an item name!");
        }
        else if (unit == ''){
            message('Error', 'red',"Please select / provide unit of measurement!");
        }
        // else if (qty == ''){
        //     message('Error', 'red',"Please enter an item quantity!");
        // }
        else if (price == ''){
            message('Error', 'red',"Please enter an item price!");
        }
        else if (mode == ''){
            message('Error', 'red',"Please select mode of procurement!");
        }
        else if (parseInt(per_month_total) < 1){
            message('Error', 'red',"Please select a month and provide its quantity for this item!");
        }
        // else if (parseInt(per_month_total) > parseInt(qty)){
        //     message('Error', 'red',"Quantity allocated per month is more than the item quantity entered!");
        // }
        // else if (parseInt(per_month_total) < parseInt(qty)){
        //     message('Error', 'red',"Quantity allocated per month is less than the item quantity entered!");
        // }
        else{
            $.ajax({
                headers: {
                    'x-csrf-token': token
                },
                url: '/ppmp/create',
                method: 'POST',
                data: {
                    'dept': dept,
                    'year': year,
                    'itemname': itemname,
                    'object': objectid,
                    'unit': unit,
                    'qty': per_month_total,
                    'price': price,
                    'mode': mode,
                    'January': jan,
                    'February': feb,
                    'March': mar,
                    'April': apr,
                    'May': may,
                    'June': jun,
                    'July': jul,
                    'August': aug,
                    'September': sep,
                    'October': oct,
                    'November': nov,
                    'December': dec
                },
                setCookies: token,
                dataType: "JSON",
                beforeSend: function() {
                    $('#basicloader').show();
                },
                complete: function(){
                    $('#basicloader').hide();
                },
                success: function(result) {
                    if (result.result == 1){
                        retrieveProcurementItems(dept, year);
                    }
                    else{
                        message(result.result, result.color, result.message);
                    }
                },
                error: function(obj, msg, exception){
                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                }
            })
        }
    }

    $('#btn-update-procurement-item').on('click', function(){
        var id = $('#proc_item_id').val(),
            itemname = $('#eitem').val(),
            unit = $('#eunit').val(),
            //qty = $('#eqty').val(),
            price = $('#eprice').val(),
            mode = $('#emode').val(),
            jan = $('#eJanuary').val() ? $('#eJanuary').val() : 0,
            feb = $('#eFebruary').val() ? $('#eFebruary').val() : 0,
            mar = $('#eMarch').val() ? $('#eMarch').val() : 0,
            apr = $('#eApril').val() ? $('#eApril').val() : 0,
            may = $('#eMay').val() ? $('#eMay').val() : 0,
            jun = $('#eJune').val() ? $('#eJune').val() : 0,
            jul = $('#eJuly').val() ? $('#eJuly').val() : 0,
            aug = $('#eAugust').val() ? $('#eAugust').val() : 0,
            sep = $('#eSeptember').val() ? $('#eSeptember').val() : 0,
            oct = $('#eOctober').val() ? $('#eOctober').val() : 0,
            nov = $('#eNovember').val() ? $('#eNovember').val() : 0,
            dec = $('#eDecember').val() ? $('#eDecember').val() : 0;
        var per_month_total = parseInt(jan) + parseInt(feb) + parseInt(mar) + parseInt(apr) + parseInt(may) + parseInt(jun) + parseInt(jul) + parseInt(aug) + parseInt(sep) + parseInt(oct) + parseInt(nov) + parseInt(dec);
        
        if (itemname == ''){
            message('Error', 'red',"Please select / provide an item name!");
        }
        else if (unit == ''){
            message('Error', 'red',"Please select / provide unit of measurement!");
        }
        // else if (qty == ''){
        //     message('Error', 'red',"Please enter an item quantity!");
        // }
        else if (price == ''){
            message('Error', 'red',"Please enter an item price!");
        }
        else if (mode == ''){
            message('Error', 'red',"Please select mode of procurement!");
        }
        else if (parseInt(per_month_total) < 1){
            message('Error', 'red',"Please select a month and provide its quantity for this item!");
        }
        // else if (parseInt(per_month_total) > parseInt(qty)){
        //     message('Error', 'red',"Quantity allocated per month is more than the item quantity entered!");
        // }
        // else if (parseInt(per_month_total) < parseInt(qty)){
        //     message('Error', 'red',"Quantity allocated per month is less than the item quantity entered!");
        // }
        else{
            $.ajax({
                headers: {
                    'x-csrf-token': token
                },
                url: '/ppmp/edititem',
                method: 'POST',
                data: {
                    form: 0, 
                    id: id,
                    itemname: itemname,
                    unit: unit,
                    qty: per_month_total,
                    price: price,
                    mode: mode,
                    January: jan,
                    February: feb,
                    March: mar,
                    April: apr,
                    May: may,
                    June: jun,
                    July: jul,
                    August: aug,
                    September: sep,
                    October: oct,
                    November: nov,
                    December: dec
                },
                dataType: 'HTML',
                success: function(result) {
                    var dept = $('#departments').val(),
                        year = $('#cbo_year').val();

                    if (result == 1){
                        $.alert({
                            title: 'Updated!',
                            type: 'blue',
                            content: "Procured item info successfully updated!",
                            buttons: {
                                ok: function(){
                                    retrieveProcurementItems(dept, year);
                                }
                            }
                            })
                    }
                    else{
                        $('#itemform').html(result);
                        $('#modal_procurement_item_edit').modal({
                                        backdrop: 'static',
                                        keyboard: true, 
                                        show: true});
                    }
                },
                error: function(obj, msg, exception){
                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                }
            })
        }
    })

    
</script>