<em class="text-sm text-danger">Warning: The following are list of items identical to the item you are adding. Do you still want to continue?</em>
<br><br>
<table class="table table-sm table-striped display bg-white" style="width: 100%" id="tbl_item_list">
    <thead>
        <tr>
            <th class="text-center col-header">No.</th>
            <th class="text-center col-header">General Description</th>
            <th class="text-center col-header">Price</th>
            <th class="text-center col-header">Similarity %</th>
        </tr>
    </thead>
    <tbody>
        @php ($ctr = 1)
        @foreach ($identical_items as $item)
            <tr>
                <td class="text-center">{{ $ctr++ }}</td>
                <td>{{ $item->itemname }}</td>
                <td class="numerical-cols">{{ number_format($item->price, 2) }}</td>
                <td class="text-center">{{ number_format($item->perc, 2) }}</td>
            </tr> 
        @endforeach
    </tbody>
</table>