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
            </tbody>
        </table>
    </div>
</div>

<script>
</script>