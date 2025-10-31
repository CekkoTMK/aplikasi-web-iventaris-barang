
<style>


button:hover {
  background: #0056c7;
}
.suggestion-box {
  border: 1px solid #ccc;
  background: white;
  position: absolute;
  z-index: 5;

  max-height: 150px;
  overflow-y: auto;
  border-radius: 1px;
}
.suggestion-item {
  padding: 8px;
  cursor: pointer;
}
.suggestion-item:hover {
  background: #eef3ff;
}

</style>
<script>
function cariData(field, target) {
  let val = document.getElementById(field).value;
  if (val.length === 0) {
    document.getElementById(target).innerHTML = "";
    return;
  }

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById(target).innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "aksi/cari_barang.php?type=" + field + "&q=" + encodeURIComponent(val), true);
  xhr.send();
}

function pilihData(field, value, target) {
  document.getElementById(field).value = value;
  document.getElementById(target).innerHTML = "";
}
</script>
<h2 class="page-header">Peminjiman Barang</h2>
<!----------------------------form pengisian--------------------------------------------->
<form action="aksi/simpanpinjam.php" method="post">
       <div class = "box-body">
         <div class ="form-group">
          <label>Nama Peminjam</label>
          <input type="text" class="form-control" id="nama" name="nama"
          autocomplete="off" onkeyup="cariData('nama','suggestions_peminjam')"><br>
        </div>
         <div class ="form-group">
          <div id="suggestions_peminjam" class="suggestion-box"></div>

          <label>Barang Dipinjam</label>
          <input type="text" class="form-control" id="nama_brg" name="nama_brg"
          autocomplete="off" onkeyup="cariData('nama_brg','suggestions_barang')">
</div>
 <div class ="form-group">
          <div id="suggestions_barang" class="suggestion-box"></div>

          <label>Tanggal Pengembalian</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal"
          value="<?= date('Y-m-d'); ?>" readonly>
</div>
        
          <button type="submit" class="btn btn-primary" name="submit">Simpan Peminjaman</button>

</div>
</form>

<!---------------------------table list ------------------------------------------------>
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Nama Barang</th>
                                            <th>tanggal</th>
                                         </tr>
                                    </thead>
                                    <tfoot>
                                     <tr>
                                            <th>No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Nama Barang</th>
                                            <th>tanggal</th>
                                         </tr>
                                    </tfoot>
                                    <tbody>
<?php
$query = $mysqli->query("SELECT * FROM peminjaman");
$no = 1; // mulai dari 1

while ($lihat = mysqli_fetch_array($query)) {
  echo "<tr>
  <td>{$no}</td>
  <td>{$lihat['nama_pemin']}</td>
  <td>{$lihat['nama_brg']}</td>
  <td>{$lihat['tanggal']}</td>
  </tr>";
$no++; // naik 1 setiap baris
}
?>
</tbody>
</table></div>