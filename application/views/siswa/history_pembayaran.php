

<div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
              <h4 class="m-0 font-weight-bold text-danger col-md-4 mr-5">History Pembayaran</h4>
              <a href="" class="btn btn-sm btn-danger offset-md-6 btn-right"><i class="fa fa-fw fa-download"></i> Unduh History</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-danger text-white">
                      <th>#</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Jumlah</th>
                      <th>Bayar</th>
                      <th class="text-center">Bukti</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                      <th width="30px;" class="text-center"><i class="fa fa-info-circle"></i></th>
                    </tr>
                  </thead>
                
                  <tbody>
                  <?php $no=1; foreach($history as $h): ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $h['name'] ?></td>
                      <td><?= $h['nama_kelas'] ?></td>
                      <td>Rp. <?= number_format($h['jumlah']) ?></td>
                      <td><?= $h['bayar'] ?></td>
                      <td class="text-center"><img src="<?= base_url('upload/image/') ?>/<?= $h['bukti'] ?>" class="img-thumbnail" alt="bukti" style="width:50px !important; height:35px !important;"></td>
                      <td>
                      <?php if($h['status']==0){ ?>
                      <a href="" class="btn btn-sm btn-light text-danger" ><i class="fa fa-recycle"></i> Process</a>
                      <?php }else{ ?>
                      <a href="" class="btn btn-sm btn-light text-primary" ><i class="fa fa-check"></i> Success</a>
                      <?php } ?>

                      </td>
                      <td><?= date('d F Y',$h['created_at']) ?></td>
                      <td><a href="#detailPembayaran<?= $h['id_pembayaran'] ?>" class="btn btn-sm btn-primary" style="" data-toggle="modal"><i class="fa fa-info-circle"></i></a></td>
                    </tr>
                  <?php endforeach; ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <?php foreach($history as $h): ?>     
<div class="modal fade" id="detailPembayaran<?= $h['id_pembayaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle"><img src="<?= base_url('assets/login/images/moklet.png') ?>" alt="logo" width="30px"> Detail Pembayaran <?= $h['bayar'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-5 d-flex">
            <img src="<?= base_url('upload/image/') ?>/<?= $h['bukti'] ?>" class="img-thumbnail" alt="bukti" height="300px" width="100%">
            </div>
            <div class="col-md-7 d-flex">
              <table class="table table-hover">
                <tr class="text-dark font-weight-bold">
                  <td>Nama</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?=$h['name']?></td>
                </tr>
                <tr class="">
                  <td>Kelas</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?= $h['nama_kelas']; ?></td>
                </tr>
                <tr>
                  <td>Jumlah</td>
                  <td class="ml-1 mr-1">:</td>
                  <td>Rp. <?= number_format($h['jumlah'])?></td>
                </tr>
                <tr>
                  <td>Bayar</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?= $h['bayar'] ?></td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?= date('d F Y',$h['created_at']) ?></td>
                </tr>
                <tr>
                  <td>Jam</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?php date_default_timezone_set('Asia/Jakarta'); ?><?= date('H:i',$h['created_at']) ?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td class="ml-1 mr-1">:</td>
                  <td>
                      <?php if($h['status']==0){ ?>
                      <a href="" class="text-warning" style="font-size:17px;"><i class="fa fa-recycle"></i> Process</a>
                      <?php }else{ ?>
                      <a href="" class="text-primary" style="font-size:17px;"><i class="fa fa-check"></i> Success</a>
                      <?php } ?>
                      </td>
                </tr>
              </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>