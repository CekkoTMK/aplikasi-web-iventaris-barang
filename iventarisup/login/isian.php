<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Lama Peminjaman & Denda
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Nama Barang</th>
                    <th>Lama Dipinjam</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Nama Barang</th>
                    <th>Lama Dipinjam</th>
                    <th>Denda</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $query = $mysqli->query("SELECT * FROM peminjaman");
                $no = 1;

                while ($lihat = mysqli_fetch_array($query)) {
                    $tanggal_pinjam = $lihat['tanggal'];
                    $tanggal_sekarang = date('Y-m-d');

                    // Hitung selisih tanggal
                    $awal = new DateTime($tanggal_pinjam);
                    $akhir = new DateTime($tanggal_sekarang);
                    $selisih = $awal->diff($akhir);

                    // Format lama pinjam
                    $lama = '';
                    if ($selisih->y > 0) {
                        $lama .= $selisih->y . ' tahun ';
                    }
                    if ($selisih->m > 0) {
                        $lama .= $selisih->m . ' bulan ';
                    }
                    if ($selisih->d > 0) {
                        $lama .= $selisih->d . ' hari';
                    }
                    if ($lama == '') {
                        $lama = 'Hari ini';
                    }

                    // Hitung denda (Rp 1000 per hari)
                    $total_hari = $selisih->days;
                    $denda = 0;
                    if ($total_hari > 0) {
                        $denda = $total_hari * 1000;
                    }

                    // Format ke Rupiah
                    $denda_rp = 'Rp ' . number_format($denda, 0, ',', '.');

                    echo "
                    <tr>
                        <td>{$no}</td>
                        <td>{$lihat['nama_pemin']}</td>
                        <td>{$lihat['nama_brg']}</td>
                        <td>{$lama}</td>
                        <td>{$denda_rp}</td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
