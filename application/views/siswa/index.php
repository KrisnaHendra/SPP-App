 <!-- Page Heading -->
 
 
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
            <!-- <a href="" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <?php foreach($siswa as $s): ?>
<div class="row">
 <!-- Earnings (Monthly) Card Example -->
 <div class="col-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center font-weight-bold text-danger text-uppercase mb-1">TOTAL TAGIHAN</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Rp. <?= number_format($s['SPP']+$s['DSP']+$s['LAIN']) ?></div>
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
                <div class="card border-left-danger shadow h-100">
                            <div class="card-header py-3 bg-danger">
                            <h6 class="m-0 font-weight-bold text-light text-center">SPP</h6>
                            </div>
                            <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; height:7rem;" src="<?= base_url('assets/template/') ?>img/tagihan.svg" alt="">
                            </div>
                            <h3 class="text-center">Rp. <?= number_format($s['SPP']) ?></h3>
                            </div>
                        </div>  
                </div>
            </div>
                <div class="col-md-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                <div class="card border-left-danger shadow h-100">
                            <div class="card-header py-3 bg-danger">
                            <h6 class="m-0 font-weight-bold text-light text-center">DSP</h6>
                            </div>
                            <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; height:7rem;" src="<?= base_url('assets/template/') ?>img/tagihan2.svg" alt="">
                            </div>
                            <h3 class="text-center">Rp. <?= number_format($s['DSP']) ?></h3>
                            </div>
                        </div>  
                </div>
            </div>
                <div class="col-md-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                <div class="card border-left-danger shadow h-100">
                            <div class="card-header py-3 bg-danger">
                            <h6 class="m-0 font-weight-bold text-light text-center">LAINNYA</h6>
                            </div>
                            <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; height:7rem;" src="<?= base_url('assets/template/') ?>img/tagihan3.svg" alt="">
                            </div>
                            <h3 class="text-center">Rp. <?= number_format($s['LAIN']) ?></h3>
                            </div>
                        </div>  
                </div>
            </div>
                
            </div>
          <?php endforeach; ?>
          <!-- Content Row -->