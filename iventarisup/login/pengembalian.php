

<style>


button:hover {
  background: #0056c7;
}
.suggestion-box {
  border: 1px solid #ccc;
  background: white;
  position: absolute;
  z-index: 10;
  width: calc(100% - 22px);
  max-height: 150px;
  overflow-y: auto;
  border-radius: 6px;
}
.suggestion-item {
  padding: 8px;
  cursor: pointer;
}
.suggestion-item:hover {
  background: #eef3ff;
}
.msg {
  text-align: center;
  margin-bottom: 15px;
  color: green;
  font-weight: 500;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<h2 class="page-header">Pengembalian Barang</h2>
<!----------------------------form pengisian--------------------------------------------->

<form action="aksi/simpanpengembalian.php" method="POST">

        <div class = "box-body">
            <div class ="form-group">
            <label for="nama_brg">Barang Dipinjam</label>
            <input type="text" name="nama_brg" id="nama_brg" class="form-control" list="barangList" autocomplete="off" required>
                <datalist id="barangList">
                <?php
                $result = $mysqli->query("SELECT nama_brg FROM peminjaman WHERE nama_brg = 0");
                while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['nama_brg']}'>";
                }
                ?>
                </datalist>
            </div>
            <div class ="form-group">
            <label for="nama_pemin">Nama Peminjam</label>
            <input type="text" name="nama_pemin" class="form-control" id="nama_pemin"  readonly>
            </div>
            <div class ="form-group">
            <label for="tanggal">Tanggal Peminjaman</label>
            <input type="text" name="tanggal" class="form-control" id="tanggal" readonly>
            </div>
           
            <button class="btn btn-primary" type="submit">Pengembalian Barang</button>
          
          </div>
</form>
<!----------------------------------------------------------->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // 1. Ambil daftar barang untuk datalist
  $.getJSON("aksi/getdatapeminjaman.php", function(data) {
    let options = "";
    data.forEach(function(item) {
      options += `<option value="${item}">`;
    });
    $("#barangList").html(options);

  });

  // 2. Saat nama barang diketik/dipilih, ambil detail peminjam
  $("#nama_brg").on("input change", function() {
    const nama_brg = $(this).val().trim();
    if (nama_brg === "") return;

    $.getJSON("aksi/get_detail.php", { nama_brg: nama_brg }, function(data) {
      console.log("Response:", data);
      console.log("Nama barang dikirim:", nama_brg);
      console.log("Data dari server:", data);
      if (data && data.nama_pemin) {
        $("#nama_pemin").val(data.nama_pemin);
        $("#tanggal").val(data.tanggal);
      } else {
        $("#nama_pemin").val("");
        $("#tanggal").val("");
      }
    });
  });
});
</script>
</div>
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