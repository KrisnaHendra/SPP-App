  <!-- FIRST -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>
  <!-- END FIRST -->
  
<div class="row">
            <div class="col-6 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center font-weight-bold text-primary text-uppercase mb-1">TOTAL TRANSAKSI MASUK</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Rp. <?= number_format($total_masuk); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wallet fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center font-weight-bold text-primary text-uppercase mb-1">TRANSAKSI SELESAI</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Rp. <?= number_format($total_selesai); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>


  <!-- Content Row -->
  <div class="row">
                <div class="col-md-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                <div class="card border-left-info shadow h-100">
                            <div class="card-header py-3 bg-info">
                            <h6 class="m-0 font-weight-bold text-light text-center">Jumlah Siswa</h6>
                            </div>
                            <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; height:7rem;" src="<?= base_url('assets/template/') ?>img/student.svg" alt="">
                            </div>
                            <h3 class="text-center"><?= $this->db->count_all('siswa') ?> Siswa</h3>
                            </div>
                        </div>  
                </div>
            </div>
  
                <div class="col-md-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                <div class="card border-left-info shadow h-100">
                            <div class="card-header py-3 bg-info">
                            <h6 class="m-0 font-weight-bold text-light text-center">Tranksasi Masuk</h6>
                            </div>
                            <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; height:7rem;" src="<?= base_url('assets/template/') ?>img/transaksi.svg" alt="">
                            </div>
                            <h3 class="text-center"><?= $this->db->count_all('kelas') ?> (On Process)</h3>
                            </div>
                        </div>  
                </div>
            </div>
                <div class="col-md-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                <div class="card border-left-info shadow h-100">
                            <div class="card-header py-3 bg-info">
                            <h6 class="m-0 font-weight-bold text-light text-center">Jumlah Kelas</h6>
                            </div>
                            <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; height:7rem;" src="<?= base_url('assets/template/') ?>img/kelas.svg" alt="">
                            </div>
                            <h3 class="text-center"><?= $this->db->count_all('kelas') ?> Kelas</h3>
                            </div>
                        </div>  
                </div>
            </div>
                
            </div>
    
          <!-- Content Row -->