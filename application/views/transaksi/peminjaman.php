<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Daftar Peminjaman
                <a href="<?= site_url('transaksi/add'); ?>" class="btn btn-primary float-end">Tambah Data</a>
            </div>
            <div class="card-body text-primary">
                <table class="table table-striped table-hover" id="tableBuku">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Nama Anggota</th>
                            <th>Judul</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($show as $key => $value) {
                            $OldDate = new DateTime($value->tgl_kembali);
                            $now = new DateTime(Date('Y-m-d'));
                            $dateDiff = $OldDate->diff($now)->days;
                            $denda = 0;
                            if($value->tgl_kembali<Date('Y-m-d')){
                                $denda = $value->denda * $dateDiff;
                            }
                        ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->tgl_pinjam; ?></td>
                                <td><?= $value->tgl_kembali; ?></td>
                                <td><?= $value->nama_anggota; ?></td>
                                <td><?= $value->judul_buku; ?></td>
                                <td><?= $value->denda; ?></td>
                                <td><span class="badge bg-warning text-dark">Pinjam</span></td>
                                <td>
                                    <a onClick="return confirm('Apakah <?= $value->nama_anggota; ?> akan mengembalikan buku <?= $value->judul_buku; ?>? dengan denda sebesar Rp. <?= $denda; ?>')" href="<?= site_url('transaksi/update/' . $value->id_pinjam . '/' . $denda.'/'.Date('Y-m-d'))  ?>" class="btn btn-info btn-sm">Pengembalian</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Nama Anggota</th>
                            <th>Judul</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>