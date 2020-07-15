<div class="card col-md-7 mb-3">
  <img src="<?= base_url('assets/template/img/user.png') ?>" class="card-img-top mx-auto mt-2" alt="..." style="width:150px; height:150px;">
  <div class="card-body">
    <h5 class="card-title font-weight-bold text-center"><?= $this->session->userdata('name'); ?></h5>
    <hr>
   <table class="">
   <?php foreach($data as $d): ?>
    <tr>
    <td>NISN</td>
    <td>:</td>
    <td><?= $d['nisn'] ?></td>
    </tr>
    <tr>
    <td>Kelas</td>
    <td>:</td>
    <td><?= $d['nama_kelas'] ?></td>
    </tr>
    <!-- <tr>
    <td>Tempat lahir</td>
    <td>:</td>
    <td>Malang</td>
    </tr>
    <tr>
    <td>Tanggal lahir</td>
    <td>:</td>
    <td>18 Oktober 2002</td>
    </tr> -->
    <tr>
    <td>Jenis kelamin</td>
    <td>:</td>
    <td><?= $d['jenis'] ?></td>
    </tr>
    <!-- <tr>
    <td>Agama</td>
    <td>:</td>
    <td>ISLAM</td>
    </tr> -->
    <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?= $d['alamat'] ?></td>
    </tr>
    <tr>
    <td>Nomor Telepon</td>
    <td>:</td>
    <td><?= $d['telepon'] ?></td>
    </tr>
    <tr>
    <td>Nama Ayah</td>
    <td>:</td>
    <td>Stefan James</td>
    </tr>
    <tr>
    <td>Nama Ibu</td>
    <td>:</td>
    <td>Natasha Ardhia</td>
    </tr>
   <?php endforeach; ?>
   </table>
  </div>
</div>