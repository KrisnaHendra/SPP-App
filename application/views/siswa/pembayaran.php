<div class="row">
<div class="col-md-7">
<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title font-weight-bold text-danger mb-3">Upload Bukti Pembayaran</h5>
    <?= $this->session->flashdata('notif') ?>
    <form action="<?= base_url('pembayaran/bayar') ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-danger text-white" id="basic-addon1" style="width:75px;">NISN</span>
        </div>
        <input type="text" name="nisn" class="form-control" value="<?= $this->session->userdata('nisn'); ?>" readonly style="background:#e3e3e3; color:black;">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-danger text-white" id="basic-addon1" style="width:75px;">Nama</span>
        </div>
        <input type="text" name="nama" class="form-control" value="<?= $this->session->userdata('name'); ?>" readonly style="background:#e3e3e3; color:black;">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-danger text-white" id="basic-addon1" style="width:75px;">Kelas</span>
        </div>
        
        <?php foreach($kelas as $k):?>
        <input type="text" name="kelas" class="form-control" value="<?= $k['nama_kelas'] ?>" readonly style="background:#e3e3e3; color:black;">
        <?php endforeach;?>
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-danger text-white" id="basic-addon1" style="width:75px;">Jumlah</span>
        </div>
        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Bayar (ex: 50000)" aria-label="Username" aria-describedby="basic-addon1" required min="0">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-danger text-white" id="basic-addon1" style="width:75px;">Bayar</span>
        </div>
        <select name="bayar" class="form-control text-center" required>
            <option value="">Pilih SPP/DSP/LAINNYA</option>
            <option value="SPP">SPP</option>
            <option value="DSP">DSP</option>
            <option value="LAINNYA">LAINNYA</option>
        </select>
        </div>
        <div class="input mb-3">
        <i class="btn btn-sm btn-block btn-danger fa fa-file">  Bukti Pembayaran</i>
        <input type="file" name="bukti" class="form-control" required>
        </div>
        
       <button type="submit" class="btn btn-success offset-md-10"><i class="fa fa-save"></i> Submit</button>
    </form>
   
  </div>
</div>
</div>

<!-- 2 -->
<div class="col-md-4">
<div class="card mb-3">
  <div class="card-header bg-danger text-white font-weight-bold"><i class="fa fa-exclamation-circle"></i> TATA CARA PEMBAYARAN</div>
  <div class="card-body">
    <!-- <h5 class="card-title">Danger card title</h5> -->
    <p class="card-text mb-2" style="font-size:15px;">1. Pastikan anda sudah memiliki nomor rekening Virtual Account yang sudah diberikan sekolah (hubungi admin jika belum memiliki). <br>
    2. Pembayaran dapat dilakukan langsung melalui Bank BTN atau transfer antar bank. <br>
    3. Jika anda telah selesai melakukan pembayaran, foto/scan bukti pembayaran tersebut. <br>
    4. Pastikan anda sudah masuk kedalam laman Upload Bukti Pembayaran. <br>
    5. Isi form yang kosong dengan benar dan teliti, pastikan data anda sudah benar (Jika ada kesalahan jangan lakukan transaksi dahulu dan hubungi admin). <br>
    6. Setelah anda selesai mengisi form tersebut simpan dengan menekan tombol <b>Submit</b>.
    </p>
  </div>
</div>
</div>

</div>