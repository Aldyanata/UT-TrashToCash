<!-- file: application/views/dashboard_view.php (contoh nama file) -->

<?php
// Ambil satu data terakhir/pertama sesuai kebutuhan Anda:
$data1 = !empty($datatransaksi) ? end($datatransaksi) : [];
$data2 = !empty($pembelian)      ? end($pembelian)      : [];
$data3 = !empty($jmlpembelian)   ? end($jmlpembelian)   : [];
$data4 = !empty($penjualan)      ? end($penjualan)      : [];
$data5 = !empty($jmlpenjualan)   ? end($jmlpenjualan)   : [];
$user  = !empty($datauser)       ? end($datauser)       : [];
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      
      <!-- Pimpinan -->
      <?php if(isset($user['level']) && $user['level'] == 'pimpinan'): ?>
      <div class="row">
        <!-- Pembelian -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $data2['pembelian'] ?? 0; ?></h3>
              <p>Pembelian</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
          </div>
        </div>
        
        <!-- Penjualan -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $data4['penjualan'] ?? 0; ?></h3>
              <p>Penjualan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        
        <!-- Jumlah Pembelian -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= "Rp ".number_format($data3['jmlpembelian'] ?? 0, 0, ',', '.'); ?></h3>
              <p>Jumlah Pembelian</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill"></i>
            </div>
          </div>
        </div>
        
        <!-- Jumlah Penjualan -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= "Rp ".number_format($data5['jmlpenjualan'] ?? 0, 0, ',', '.'); ?></h3>
              <p>Jumlah Penjualan</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill"></i>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <!-- /Pimpinan -->

      <!-- Admin -->
      <?php if(isset($user['level']) && $user['level'] == 'admin'): ?>
      <div class="row">
        <!-- Pembelian -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $data2['pembelian'] ?? 0; ?></h3>
              <p>Pembelian</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
          </div>
        </div>
        
        <!-- Penjualan -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $data4['penjualan'] ?? 0; ?></h3>
              <p>Penjualan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        
        <!-- Jumlah Pembelian -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= "Rp ".number_format($data3['jmlpembelian'] ?? 0, 0, ',', '.'); ?></h3>
              <p>Jumlah Pembelian</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill"></i>
            </div>
          </div>
        </div>
        
        <!-- Jumlah Penjualan -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= "Rp ".number_format($data5['jmlpenjualan'] ?? 0, 0, ',', '.'); ?></h3>
              <p>Jumlah Penjualan</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill"></i>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <!-- /Admin -->

      <!-- Form Transaksi (Admin / Masyarakat) -->
      <?php if(isset($user['level']) && ($user['level']=='admin' || $user['level']=='masyarakat')): ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Transaksi</h5>
            </div>
          </div>
          
          <div class="row">
            <!-- Form Pembelian -->
            <div class="col-lg-6">
              <form action="<?= base_url('index.php/transaksi/pembelian'); ?>" method="post">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Pembelian</h5>
                  </div>
                  <div class="card-body">
                    <?php 
                      // Anggap id_transaksi diset dari data terakhir + 1
                      $no = !empty($data1['id_transaksi']) ? $data1['id_transaksi'] + 1 : 1;
                    ?>
                    <!-- ID Transaksi -->
                    <input type="hidden" name="id_transaksi" class="form-control" value="<?= $no; ?>" readonly>
                    
                    <!-- Tanggal Transaksi -->
                    <label>Tanggal Transaksi</label>
                    <input type="text" name="tgl_transaksi" class="form-control" 
                           value="<?= date('Y-m-d'); ?>" readonly>

                    <div class="row mt-3">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Nama Sampah</label>
                          <select name="kd_sampah" class="form-control" 
                                  id="sampah" onchange="cek_db()" required>
                            <option selected disabled>--PILIH SAMPAH--</option>
                            <?php if(!empty($datasampah)): ?>
                              <?php foreach($datasampah as $s): ?>
                                <option value="<?= $s['kd_sampah']; ?>">
                                  <?= $s['nm_sampah']; ?>
                                  <!-- (Jika mau tampilkan harga: 
                                  <?= ' - Rp'.number_format($s['harga_beli'],0,',','.'); ?>) -->
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Harga</label>
                          <div class="row">
                            <div class="col-sm-6">
                              <input type="text" name="harga_beli" 
                                     class="form-control" id="harga_beli" value="" readonly>
                            </div>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="satuan" 
                                     value="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Jumlah Beli</label>
                          <input type="number" name="jml" id="jml" class="form-control" 
                                 required oninput="jmlHarga()">
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Total Harga</label>
                      <input type="text" id="ttl_harga" class="form-control" 
                             value="" readonly>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                      <span class="fa fa-save"></span> Simpan Transaksi
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /Form Pembelian -->

            <!-- Form Penjualan (Hanya Admin) -->
            <?php if($user['level'] == 'admin'): ?>
            <div class="col-lg-6">
              <form action="<?= base_url('index.php/transaksi/penjualan'); ?>" method="post">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Penjualan</h5>
                  </div>
                  <div class="card-body">
                    <?php 
                      $no = !empty($data1['id_transaksi']) ? $data1['id_transaksi'] + 1 : 1;
                    ?>
                    <!-- ID Transaksi -->
                    <input type="hidden" name="id_transaksi" class="form-control" 
                           value="<?= $no; ?>" readonly>
                    
                    <!-- Tanggal Transaksi -->
                    <label>Tanggal Transaksi</label>
                    <input type="text" name="tgl_transaksi" class="form-control" 
                           value="<?= date('Y-m-d'); ?>" readonly>

                    <div class="row mt-3">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Nama Sampah</label>
                          <select name="kd_sampah" class="form-control" 
                                  id="sampah1" onchange="cek_db1()" required>
                            <option selected disabled>--PILIH SAMPAH--</option>
                            <?php if(!empty($datasampah)): ?>
                              <?php foreach($datasampah as $s): ?>
                                <option value="<?= $s['kd_sampah']; ?>">
                                  <?= $s['nm_sampah']; ?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Harga</label>
                          <div class="row">
                            <div class="col-sm-6">
                              <input type="text" name="harga_jual" 
                                     class="form-control" id="harga_jual" readonly>
                            </div>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" 
                                     id="satuan1" value="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Jumlah Jual</label>
                          <input type="number" name="jml" id="jml1" class="form-control" 
                                 required oninput="jmlHargaJual()">
                        </div>
                      </div>
                    </div>

                    <!-- Pilih Pembeli -->
                    <div class="row">
                      <div class="col-md-12">
                        <label>Pembeli</label>
                        <select name="id_client" class="form-control" required>
                          <option selected disabled>--PILIH PEMBELI--</option>
                          <?php if(!empty($dataclient)): ?>
                            <?php foreach($dataclient as $cli): ?>
                              <option value="<?= $cli['id_client']; ?>">
                                <?= $cli['nama']; ?>
                              </option>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group mt-3">
                      <label>Total Harga</label>
                      <input type="text" id="ttl_hargajual" class="form-control" 
                             value="" readonly>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                      <span class="fa fa-save"></span> Simpan Transaksi
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <?php endif; ?>
            <!-- /Form Penjualan -->
          </div>
        </div>
      </div>
      <?php endif; ?>
      <!-- /Form Transaksi -->
      
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Pastikan jQuery / script disertakan -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function cek_db(){
        var sampah = $("#sampah").val(); 
        $.ajax({
          url : "<?php echo base_url('index.php/dashboard/getsampah'); ?>", // file proses penginputan
          data : 'kd_sampah='+sampah,
        }).success(function (data){
          var json = data,
          obj = JSON.parse(json);
          $('#harga_beli').val(obj.harga_beli); 
          $('#satuan').val("/ "+obj.satuan); 
        })
		
      }
	  function cek_db1(){
        var sampah1 = $("#sampah1").val(); 
        $.ajax({
          url : "<?php echo base_url('index.php/dashboard/getsampah1'); ?>", // file proses penginputan
          data : 'kd_sampah='+sampah1,
        }).success(function (data){
          var json = data,
          obj = JSON.parse(json);
          $('#harga_jual').val(obj.harga_jual); 
          $('#satuan1').val("/ "+obj.satuan); 
        })
		
      }
	  function jmlHarga() {
		var ttl_harga = document.getElementById('ttl_harga');
		var harga = document.getElementById('harga_beli').value;
		var jml = document.getElementById('jml').value;
		var jmlharga = harga * jml;
		ttl_harga.value = jmlharga;
	  }
	
	  function jmlHargaJual() {
		var ttl_harga = document.getElementById('ttl_hargajual');
		var harga = document.getElementById('harga_jual').value;
		var jml1 = document.getElementById('jml1').value;
		var jmlharga = harga * jml1;
		ttl_harga.value = jmlharga;
	  }
</script>
