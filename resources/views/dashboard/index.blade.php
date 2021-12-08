<html>

<head>
@include('components.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
    @include('components.navbar')
    @include('components.sidebar')
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('images/TrinidadLogo.png') }}" alt="DBMLogo" height="500" width="480">
    </div>

    <div class="content-wrapper">
      
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <div class="row m-2">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Amount</span>
                <span class="info-box-number">{{ number_format($total_procured, 2) }}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Offices w/ Procurements</span>
                <span class="info-box-number">{{ count($departments) }}</span>
              </div>
            </div>
          </div>

          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Departments</span>
                <span class="info-box-number"></span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{ count($users) }}</span>
              </div>
            </div>
          </div>

        </div>

        <div class="card m-3">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-chart-bar mr-2"></i>Total Procurement per Office (Bar)</h3>

            <div class="card-tools">
              <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="position-relative mb-4">
                  <canvas id="bar-chart" height="400"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer p-0">
          </div>
        </div>

        <div class="card m-3">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-chart-pie mr-2"></i>Total Procurement per Office (Doughnut)</h3>

            <div class="card-tools">
              <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="chart-responsive">
                  <canvas id="pieChart" height="150"></canvas>
                </div>
              </div>
              <div class="col-md-6">
                <ul class="chart-legend clearfix">
                  @php ($ctr = 0)
                  @foreach ($departments as $department)
                    <li><i class="fas fa-chart-pie mr-2" style="color: {{ $colors[$ctr] }}"></i>{{ ($department->sub_office) ? $department->description.' - '.$department->sub_office : $department->description }}<strong class="ml-2">{{ number_format($procured_items[$ctr], 2) }}</strong></li>
                    @php ($ctr++)
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="card-footer p-0">
          </div>
        </div>

        <br><br><br>

    </div>
    @include('components.footer')
</div>
</body>
</html>
<script>
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData = {
    labels: <?php echo json_encode($depts) ?>,
    datasets: [
      {
        data: <?php echo json_encode($procured_items) ?>,
        backgroundColor: <?php echo json_encode($colors) ?>
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    }
  }
  
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })

  per_office();

  function per_office(){
    'use strict'

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode      = 'index'
    var intersect = true

    var $supporters_chart = $('#bar-chart')
    var supporters_chart  = new Chart($supporters_chart, {
      type   : 'bar',
      data   : {
        labels  : <?php echo json_encode($depts) ?>,
        datasets: [
          {
            label          : 'Procurement',
            backgroundColor: '#007bff',
            borderColor    : '#007bff',
            data           : <?php echo json_encode($procured_items) ?>
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: true
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero: true,
              callback: function (value, index, values) {
                
                return value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: true
            },
            ticks    : ticksStyle
          }]
        }
      }
    })
  }
</script>