

<div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
              <h4 class="m-0 font-weight-bold text-primary col-md-4">Data Siswa</h4>
              <a href="" class="btn btn-sm mr-4"></a>
              <a href="" class="btn btn-sm btn-primary offset-md-6 btn-right" style=""><i class="fa fa-fw fa-download"></i></a>
              <a href="" class="btn btn-sm btn-info btn-right ml-2" data-toggle="modal" data-target="#addSiswa"><i class="fa fa-plus-circle"></i> Tambah</a>
              </div>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('notif') ?>
              <div class="table-responsive">
              <!-- <button class="btn btn-info mb-3" data-toggle="modal" data-target="#addSiswa"><i class="fa fa-plus-circle"></i> Tambah Siswa</button> -->
                <table class="table table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-primary text-white">
                      <th>NISN</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Email</th>
                      <th>Kelas</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th><i class="fa fa-times"></i></th>
                    </tr>
                  </thead>
                
                  <tbody>
                  <?php foreach($siswa as $s): ?>
                    <tr>
                      <td class="text-primary"><a href="#updateSiswa<?= $s['id'] ?>" class="badge badge-light text-primary font-weight-bold" data-toggle="modal" data-target="#updateSiswa<?= $s['id'] ?>"><?= $s['nisn'] ?></a></td>
                      <td class="font-weight-bold"><?= $s['name'] ?></td>
                      <td>
                      <?php if($s['id_jenis']==1){?>
                      <a href="" class="badge badge-large badge-warning">L<span style="font-size:0.11px">Laki-laki</span></a>
                      <?php }else{?>
                      <a href="" class="badge badge-large badge-info">P<span style="font-size:0.11px">Perempuan</span></a>
                      <?php }?>
                      </td>
                      <td><?= $s['email'] ?></td>
                      <td><?= $s['nama_kelas'] ?></td>
                      <td><?= $s['alamat'] ?></td>
                      <td><?= $s['telepon'] ?></td>
                      <td>
                      <a href="<?= base_url('admin/delete_siswa') ?>/<?= $s['id'] ?>" class="badge badge-sm badge-light" data-toggle="tooltip" data-placement="top" title="Hapus <?= $s['nisn'] ?>" onClick="return confirm('Anda yakin?')"><i class="fa fa-times text-danger"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                   
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>

         <!-- Add -->
         <div class="modal fade" id="addSiswa" tabindex="-1" role="dialog" aria-labelledby="addSiswaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/add_siswa') ?>" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1" style="width:90px;">NISN</span>
                </div>
                <input type="text" name="nisn" class="form-control" placeholder="NISN" aria-label="nisn" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1" style="width:90px;">Nama</span>
                </div>
                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" aria-label="nama" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1" style="width:90px;">Email</span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1" style="width:90px;">Password</span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" required>
            </div>
           <select name="id_kelas" class="form-control mb-3" required>
                    <option value="">PILIH KELAS</option>
                    <?php foreach($kelas as $k):?>
                    <option value=<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                    <?php endforeach; ?></select>
           <select name="kelamin" class="form-control mb-3" required>
                    <option value="">JENIS KELAMIN</option>
                    <?php foreach($jenis as $j):?>
                    <option value="<?= $j['id_jenis'] ?>" class="text-danger"><?= $j['jenis'] ?></option>
                    <?php endforeach; ?>
                    </select>
           </select>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1" style="width:90px;">Alamat</span>
                </div>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1" style="width:90px;">Telepon</span>
                </div>
                <input type="number" name="telepon" class="form-control" placeholder="No. Telepon" aria-label="telepon" aria-describedby="basic-addon1" required>
            </div>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

         <!-- Update -->
         <?php foreach($siswa as $s):?>
         <div class="modal fade" id="updateSiswa<?=$s['id']?>" tabindex="-1" role="dialog" aria-labelledby="updateSiswaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/update_siswa') ?>" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-danger font-weight-bold" id="basic-addon1" style="width:90px;">NISN</span>
                </div>
                <input type="text" name="nisn" class="form-control" value="<?= $s['nisn'] ?>" aria-label="nisn" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-danger font-weight-bold" id="basic-addon1" style="width:90px;">Nama</span>
                </div>
                <input type="text" name="nama" class="form-control" value="<?= $s['name'] ?>" aria-label="nama" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-danger font-weight-bold" id="basic-addon1" style="width:90px;">Email</span>
                </div>
                <input type="email" name="email" class="form-control" value="<?= $s['email'] ?>" aria-label="email" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-danger font-weight-bold" id="basic-addon1" style="width:90px;">Password</span>
                </div>
                <input type="text" name="password" class="form-control" value="<?= $s['password'] ?>" aria-label="password" aria-describedby="basic-addon1" required>
            </div>
           <select name="id_kelas" class="form-control mb-3" required>
                    <option value="<?= $s['id_kelas'] ?>"><?=$s['nama_kelas']?></option>
                    <option value="1">X RPL 1</option>
                    <option value="2">X TKJ 1</option></select>
           <select name="kelamin" class="form-control mb-3" required>
                    <option value="">JENIS KELAMIN</option>
                    <option value="L" class="text-danger">Laki - laki</option>
                    <option value="P" class="text-danger">Perempuan</option>
           </select>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-danger font-weight-bold" id="basic-addon1" style="width:90px;">Alamat</span>
                </div>
                <input type="text" name="alamat" class="form-control" value="<?= $s['alamat'] ?>" aria-label="alamat" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-danger font-weight-bold" id="basic-addon1" style="width:90px;">Telepon</span>
                </div>
                <input type="number" name="telepon" class="form-control" value="<?= $s['telepon'] ?>" aria-label="telepon" aria-describedby="basic-addon1" required min="0">
            </div>
           
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
