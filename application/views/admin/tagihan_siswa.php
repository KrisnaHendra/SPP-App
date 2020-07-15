

<div class="card shadow mb-4">
            <div class="card-header bg-info py-3">
                <div class="row">
              <h4 class="m-0 font-weight-bold text-light col-md-4">Tagihan Siswa</h4>
              <a href="" class="btn btn-sm mr-4"></a>
              <a href="" class="btn btn-sm btn-light offset-md-7 btn-right" style=""><i class="fa fa-fw fa-download"></i></a>
              <!-- <a href="" class="btn btn-sm btn-light btn-right ml-2" data-toggle="modal" data-target="#addSiswa"><i class="fa fa-plus-circle"></i> Tambah</a> -->
              </div>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('notif') ?>
              <div class="table-responsive">
              <!-- <button class="btn btn-info mb-3" data-toggle="modal" data-target="#addSiswa"><i class="fa fa-plus-circle"></i> Tambah Siswa</button> -->
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-info text-white">
                      <th style="width:80px;">NISN</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Kelas</th>
                      <th class="text-left">SPP</th>
                      <th class="text-left">DSP</th>
                      <th class="text-left">LAIN</th>
                      <th style="width:50px;">Update</th>
                    </tr>
                  </thead>
                
                  <tbody>
                  <?php foreach($siswa as $s): ?>
                    <tr>
                      <td class="text-primary"><h6 class="font-weight-bold"><?= $s['nisn'] ?></h6></td>
                      <td class="font-weight-bold"><?= $s['name'] ?></td>
                      <td>
                      <?php if($s['id_jenis']==1){?>
                      <a href="" class="badge badge-large badge-warning">L<span style="font-size:0.11px">Laki-laki</span></a>
                      <?php }else{?>
                      <a href="" class="badge badge-large badge-info">P<span style="font-size:0.11px">Perempuan</span></a>
                      <?php }?>
                      </td>
                      <td><?= $s['nama_kelas'] ?></td>
                      <?php if($s['SPP']==0){?>
                      <td class="text-left font-weight-bold text-primary">Rp. <?= number_format($s['SPP']) ?></td>
                      <?php }else{?>
                      <td class="text-left font-weight-bold text-dark">Rp. <?= number_format($s['SPP']) ?></td>
                      <?php }?>
                      <td>Rp. <?= number_format($s['DSP']) ?></td>
                      <td>Rp. <?= number_format($s['LAIN']) ?></td>
                      <td class="text-center">
                      <a href="#updateSiswa<?= $s['id'] ?>" class="badge badge-primary" data-toggle="modal" data-placement="top" title="Edit tagihan <?= $s['nisn'] ?>"><i class="fa fa-dollar-sign"></i></a>
                      <!-- <i href="<?= base_url('admin/delete_siswa') ?>/<?= $s['id'] ?>" class="badge badge-sm badge-light" onClick="return confirm('Anda yakin?')"><i class="fa fa-trash text-danger"></i></a> -->
                      </td>
                    </tr>
                  <?php endforeach; ?>
                   
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>

        
         <!-- Update -->
         <?php foreach($siswa as $s):?>
         <div class="modal fade" id="updateSiswa<?=$s['id']?>" tabindex="-1" role="dialog" aria-labelledby="updateSiswaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tagihan <?= $s['name'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/update_tagihan') ?>" method="POST">
        <input type="hidden" name="id" value="<?= $s['id'] ?>">
          <table class="table table-sm">
            <tr>
              <td>NISN</td>
              <td>:</td>
              <td><?= $s['nisn'] ?></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?= $s['name'] ?></td>
            </tr>
            <tr>
              <td>Jenis kelamin</td>
              <td>:</td>
              <td><?= $s['jenis'] ?></td>
            </tr>
            <tr>
              <td>Kelas</td>
              <td>:</td>
              <td><?= $s['nama_kelas'] ?></td>
            </tr>
          </table>
           <i class="fa fa-dollar-sign btn btn-sm btn-info btn-block font-weight-bold" style="height:30px;"> Tunggakan SPP</i>
           <input type="text" class="form-control text-center mb-3" name="spp" value="<?= $s['SPP'] ?>" style="height:30px">
           <i class="fa fa-dollar-sign btn btn-sm btn-warning btn-block font-weight-bold" style="height:30px;"> Tunggakan DSP</i>
           <input type="text" class="form-control text-center mb-3" name="dsp" value="<?= $s['DSP'] ?>" style="height:30px">
           <i class="fa fa-dollar-sign btn btn-sm btn-success btn-block font-weight-bold" style="height:30px;"> Tunggakan Lainnya</i>
           <input type="text" class="form-control text-center mb-3" name="lain" value="<?= $s['LAIN'] ?>" style="height:30px">
         
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
         <?php endforeach; ?>
