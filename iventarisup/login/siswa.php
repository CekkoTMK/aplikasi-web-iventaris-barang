<style>
.btn-sm {
  padding: 4px 10px;
  font-size: 13px;
}
</style>
<h2 class="page-header">Data Anggota</h2>
<br>
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table me-1"></i> DataTable Example
  </div>
  <div class="card-body">
    <table id="datatablesSimple" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIS</th>
          <th>Kelas</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIS</th>
          <th>Kelas</th>
          <th>Opsi</th>
        </tr>
      </tfoot>
      <tbody>
        <?php
        $no = 1;
        $query = $mysqli->query("SELECT * FROM anggota");
        while ($lihat = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($lihat['nama']); ?></td>
            <td><?= htmlspecialchars($lihat['nis']); ?></td>
            <td><?= htmlspecialchars($lihat['kelas']); ?></td>
            <td>
              <a href="?page=editsiswa&id_peminjam=<?= $lihat['id_anggota']; ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="aksi/hapussiswa.php?id=<?= $lihat['id_anggota']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<a href="?page=tambahsiswa" class="btn btn-primary pull-right" style="margin-bottom: 20px;">
  <i class="fa fa-plus"></i> Tambah
</a>

