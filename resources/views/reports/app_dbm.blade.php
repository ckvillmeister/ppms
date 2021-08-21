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
                    <th class="text-center small-header">Advertisement/Posting of IB/REI</th>
                    <th class="text-center small-header">Submission/Opening of Bids</th>
                    <th class="text-center small-header">Notice of Award</th>
                    <th class="text-center small-header">Contract Signing</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">MOOE</th>
                    <th class="text-center">CO</th>
                </tr>
            </thead>
            <tbody> 
            </tbody>
        </table>
    </div>
</div>

<script>
</script>