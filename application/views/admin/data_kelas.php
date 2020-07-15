<div class="card shadow col-md-7" mb-3>
<h4 class="mt-3 mb-2 text-primary font-weight-bold">Data Kelas :</h4>
<?= $this->session->flashdata('notif'); ?>
<table class="table table-hover mt-2">
  <thead>
    <tr class="bg-primary text-white">
      <th>#</th>
      <th class="text-center">Nama kelas</th>
      <th class="text-center" style="width:250px;">Keahlian</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1; foreach($kelas as $k): ?>
    <tr>
      <th scope="row"><?= $no++; ?></th>
      <td class="text-center"><?= $k['nama_kelas'] ?></td>
      <td class="text-center">
      <?php if($k['keahlian']=='RPL'){?>
      <b class="badge badge-warning">Rekayasa Perangkat Lunak</b>
      <?php }else{?>
      <b class="badge badge-success">Teknik Komputer & Jaringan</b>
      <?php } ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
   <a href="" class="btn btn-block btn-sm btn-outline-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Tambah kelas</a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/add_kelas') ?>" method="POST">
            <i class="fa fa-school btn btn-sm btn-primary btn-block font-weight-bold" style="height:30px;"> Nama Kelas</i>
           <input type="text" class="form-control text-center mb-3" name="nama_kelas" placeholder="Nama Kelas" style="height:30px">
            <i class="fa fa-school btn btn-sm btn-primary btn-block font-weight-bold" style="height:30px;"> Keahlian</i>
            <select name="keahlian" class="form-control text-center">
                <option value="RPL">Rekayasa Perangkat Lunak</option>
                <option value="TKJ">Teknik Komputer & Jaringan</option>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>