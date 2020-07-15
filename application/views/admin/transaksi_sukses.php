

<div class="card shadow mb-4">
            <div class="card-header bg-success">
                <div class="row">
              <h4 class="m-0 font-weight-bold text-light col-md-4 mr-5 pr-5">Transaksi Sukses</h4><h2 class="col"></h2>
              <a href="" class="btn btn-sm btn-light offset-md-5 btn-right"><i class="fa fa-fw fa-download"></i> Unduh History</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
            <?= $this->session->flashdata('notif') ?>
                <table class="table table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-success text-white">
                      <th>#</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Jumlah</th>
                      <th>Bayar</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                
                  <tbody>
                  <?php $no=1; foreach($transaksi as $t): ?>
                  <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $t['name'] ?></td>
                        <td><?= $t['nama_kelas'] ?></td>
                        <td>Rp. <?= number_format($t['jumlah']) ?></td>
                        <td>
                        <?php if($t['bayar']=='SPP'){ ?>
                        <b class="text-primary"><?= $t['bayar'] ?></b>
                        <?php }elseif($t['bayar']=='DSP'){ ?>
                        <b class="text-success"><?= $t['bayar'] ?></b>
                        <?php }else{ ?>
                        <b class="text-warning"><?= $t['bayar'] ?></b>
                        <?php } ?>
                        </td>
                        <td>
                        <?php if($t['status']==0){ ?>
                        <a href="" class="btn btn-sm btn-danger" ><i class="fa fa-recycle"></i> Process</a>
                        <?php }else{ ?>
                        <a href="" class="badge badge-sm badge-info" ><i class="fa fa-check"></i> Success</a>
                        <?php } ?>
                        </td>
                        <td><?php date_default_timezone_set('Asia/Jakarta'); ?><?= date('d F Y (H:i)',$t['created_at']) ?></td>
                        
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <?php foreach($transaksi as $t): ?>     
<div class="modal fade" id="modalEdit<?= $t['id_pembayaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle"><img src="<?= base_url('assets/login/images/moklet.png') ?>" alt="logo" width="30px"> Pembayaran <?= $t['bayar'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-5 d-flex">
            <img src="<?= base_url('upload/image/') ?>/<?= $t['bukti'] ?>" class="img-thumbnail" alt="bukti" height="300px" width="100%">
            </div>
            <div class="col-md-7 d-flex">
              <table class="table table-hover">
                <tr class="text-dark font-weight-bold">
                  <td>Nama</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?=$t['name']?></td>
                </tr>
                <tr class="">
                  <td>Kelas</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?= $t['nama_kelas']; ?></td>
                </tr>
                <tr>
                  <td>Jumlah</td>
                  <td class="ml-1 mr-1">:</td>
                  <td>Rp. <?= number_format($t['jumlah'])?></td>
                </tr>
                <tr>
                  <td>Bayar</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?= $t['bayar'] ?></td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?= date('d F Y',$t['created_at']) ?></td>
                </tr>
                <tr>
                  <td>Jam</td>
                  <td class="ml-1 mr-1">:</td>
                  <td><?php date_default_timezone_set('Asia/Jakarta'); ?><?= date('H:i',$t['created_at']) ?></td>
                </tr>
                <!-- <tr>
                  <td>Status</td>
                  <td class="ml-1 mr-1">:</td>
                  <td>
                      <?php if($t['status']==0){ ?>
                      <a href="" class="text-warning" style="font-size:17px;"><i class="fa fa-recycle"></i> Process</a>
                      <?php }else{ ?>
                      <a href="" class="text-primary" style="font-size:17px;"><i class="fa fa-check"></i> Success</a>
                      <?php } ?>
                      </td>
                </tr> -->
                <tr>
                <td colspan="3" class="text-danger small">*NB: Tekan submit untuk mengubah status pembayaran.</td>
                </tr>
              </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
      <form action="<?= base_url('admin/ubah_status') ?>" method="POST">
      <input type="hidden" name="id_pembayaran" value="<?= $t['id_pembayaran'] ?>">
      <input type="hidden" name="nisn" value="<?= $t['nisn'] ?>">
      <input type="hidden" name="jumlah" value="<?= $t['jumlah'] ?>">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Submit</button>
        </form> 
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>