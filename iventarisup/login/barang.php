<h2 class="page-header">Data Barang</h2>

<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table me-1"></i> Data Barang
  </div>

  <div class="card-body">
    <table id="datatablesSimple" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Jenis Barang</th>
          <th>Stok Barang</th>
          <th>Opsi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $query = $mysqli->query("SELECT * FROM barang");
        $no = 1;

        while ($lihat = mysqli_fetch_array($query)) {
          echo "
            <tr>
              <td>{$no}</td>
              <td>{$lihat['nama_brg']}</td>
              <td>{$lihat['jenis_brg']}</td>
              <td>{$lihat['stok_brg']}</td>
              <td>
                <a href='?page=editbrg&id_brg={$lihat['id_brg']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='aksi/hapusbrg.php?id={$lihat['id_brg']}' class='btn btn-danger'><i class='fa fa-trash'></i></a>
              </td>
            </tr>
          ";
          $no++;
        }
        ?>
      </tbody>

      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Jenis Barang</th>
          <th>Stok Barang</th>
          <th>Opsi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
<a href="?page=tambahbrg" class="btn btn-primary pull-right" style="margin-bottom: 20px;">
  <i class="fa fa-plus"></i> Tambah
</a>
