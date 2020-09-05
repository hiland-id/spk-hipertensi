<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-th-large"></i>
          Hallo, <?= ucfirst($session['nama']); ?>
        </h3>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content p-0">
          <p>Selamat datang di Sistem Informasi Kepegawaian.</p>
        </div>
      </div><!-- /.card-body -->
    </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <button class="btn btn-primary" id="refresh">Mulai ulang data</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">

        <!-- PIE CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Golongan I</h3>

            <div class="card-tools">
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="golongan1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Golongan III</h3>

            <div class="card-tools">
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="golongan3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>




      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <!-- LINE CHART -->

        <!-- /.card -->
        <!-- PIE CHART -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Golongan II</h3>

            <div class="card-tools">
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="golongan2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- PIE CHART -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Golongan IV</h3>

            <div class="card-tools">

            </div>
          </div>
          <div class="card-body">
            <canvas id="golongan4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  $(function() {
    $("#refresh").on("click", function() {
      $.ajax({
        url: "<?= base_url('dashboard/get_data_golongan'); ?>",
        type: "GET",
        dataType: "JSON",
        cache: false,
        success: function(res) {
          toastr.success('Updated');
          var dataGolongan1 = {
            labels: [
              'I/A',
              'I/B',
              'I/C',
              'I/D',
            ],
            datasets: [{
              data: [res.gol_1.a, res.gol_1.b, res.gol_1.c, res.gol_1.d],
              backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
            }]
          }
          var pieChartCanvas = $('#golongan1').get(0).getContext('2d')
          var pieData = dataGolongan1;
          var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }

          var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          })

          var dataGolongan2 = {
            labels: [
              'II/A',
              'II/B',
              'II/C',
              'II/D',
            ],
            datasets: [{
              data: [res.gol_2.a, res.gol_2.b, res.gol_2.c, res.gol_2.d],
              backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
            }]
          }

          var pieChartCanvas = $('#golongan2').get(0).getContext('2d')
          var pieData = dataGolongan2;
          var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }

          var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          })

          var dataGolongan3 = {
            labels: [
              'III/A',
              'III/B',
              'III/C',
              'III/D',
            ],
            datasets: [{
              data: [res.gol_3.a, res.gol_3.b, res.gol_3.c, res.gol_3.d],
              backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
            }]
          }

          var pieChartCanvas = $('#golongan3').get(0).getContext('2d')
          var pieData = dataGolongan3;
          var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }

          var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          })

          var dataGolongan4 = {
            labels: [
              'IV/A',
              'IV/B',
              'IV/C',
              'IV/D',
              'IV/E',
            ],
            datasets: [{
              data: [res.gol_4.a, res.gol_4.b, res.gol_4.c, res.gol_4.d, res.gol_4.e],
              backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
            }]
          }

          var pieChartCanvas = $('#golongan4').get(0).getContext('2d')
          var pieData = dataGolongan4;
          var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }

          var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          });

        },
        error: function() {
          toastr.error('Error 400');
        }
      });
    });

    $.ajax({
      url: "<?= base_url('dashboard/get_data_golongan'); ?>",
      type: "GET",
      dataType: "JSON",
      cache: false,
      success: function(res) {
        var dataGolongan1 = {
          labels: [
            'I/A',
            'I/B',
            'I/C',
            'I/D',
          ],
          datasets: [{
            data: [res.gol_1.a, res.gol_1.b, res.gol_1.c, res.gol_1.d],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
          }]
        }
        var pieChartCanvas = $('#golongan1').get(0).getContext('2d')
        var pieData = dataGolongan1;
        var pieOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }

        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        })

        var dataGolongan2 = {
          labels: [
            'II/A',
            'II/B',
            'II/C',
            'II/D',
          ],
          datasets: [{
            data: [res.gol_2.a, res.gol_2.b, res.gol_2.c, res.gol_2.d],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
          }]
        }

        var pieChartCanvas = $('#golongan2').get(0).getContext('2d')
        var pieData = dataGolongan2;
        var pieOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }

        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        })

        var dataGolongan3 = {
          labels: [
            'III/A',
            'III/B',
            'III/C',
            'III/D',
          ],
          datasets: [{
            data: [res.gol_3.a, res.gol_3.b, res.gol_3.c, res.gol_3.d],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
          }]
        }

        var pieChartCanvas = $('#golongan3').get(0).getContext('2d')
        var pieData = dataGolongan3;
        var pieOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }

        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        })

        var dataGolongan4 = {
          labels: [
            'IV/A',
            'IV/B',
            'IV/C',
            'IV/D',
            'IV/E',
          ],
          datasets: [{
            data: [res.gol_4.a, res.gol_4.b, res.gol_4.c, res.gol_4.d, res.gol_4.e],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
          }]
        }

        var pieChartCanvas = $('#golongan4').get(0).getContext('2d')
        var pieData = dataGolongan4;
        var pieOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }

        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        });

      },
      error: function() {
        toastr.error('Error 400');
      }
    });

  });
</script>