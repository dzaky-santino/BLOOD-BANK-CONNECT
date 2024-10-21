@extends('admin.layouts.app')
@section('konten')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Stok Darah</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-droplet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalStock}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Dokter</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$dokter}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">User</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-hand-holding-droplet"></i>
                    </div>

                    <div class="ps-3">
                      <h6>{{$user}}</h6>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Admin</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$admin}}</h6>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Stok Darah</h5>

                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      var dataDarah = @json($dataDarah);
                      var labels = dataDarah.map(item => item.gol_darah);
                      var data = dataDarah.map(item => item.stok);

                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Stok Darah',
                          data: data,
                        }],
                        chart: {
                          height: 350,
                          type: 'bar',
                          toolbar: {
                            show: false
                          },
                        },
                        plotOptions: {
                          bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                          },
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          show: true,
                          width: 2,
                          colors: ['transparent']
                        },
                        xaxis: {
                          categories: labels,
                        },
                        yaxis: {
                          title: {
                            text: 'Stok Darah'
                          }
                        },
                        fill: {
                          opacity: 1
                        },
                        tooltip: {
                          y: {
                            formatter: function (val) {
                              return val + " stok"
                            }
                          }
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Bar Chart -->
                </div>
              </div>
            </div><!-- End Reports -->
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Website Traffic -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Pengguna</h5>
          
              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
          
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var dokter = @json($dokter);
                  var user = @json($user);
                  var admin = @json($admin);
          
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Pengguna',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [
                        { value: dokter, name: 'Dokter' },
                        { value: user, name: 'User' },
                        { value: admin, name: 'Admin' }
                      ]
                    }]
                  });
                });
              </script>
            </div>
          </div>
          <!-- End Website Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
@endsection
