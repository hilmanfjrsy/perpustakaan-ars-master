<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Daftar Pengembalian
                <!-- <a href="<?=site_url('transaksi/add');?>" class="btn btn-primary float-end">Tambah Data</a> -->
            </div>
            <div class="card-body text-primary">
                <table class="table table-striped table-hover" id="tableBuku">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tgl Pengembalian</th>
                            <th>Nama Anggota</th>
                            <th>Judul</th>
                            <th>Total Denda</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($show as $key => $value) 
                        {
                            $OldDate = new DateTime($value->tgl_kembali);
                            $now = new DateTime($value->tgl_pengembalian);
                            $dateDiff = $OldDate->diff($now)->days;
                        ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->tgl_pengembalian; ?></td>
                                <td><?= $value->nama_anggota; ?></td>
                                <td><?= $value->judul_buku; ?></td>
                                <td><?= $value->total_denda; ?></td>
                                <td><span class="badge bg-success">Kembali</span></td>
                                <td><?= $value->total_denda==0?'Tepat Waktu':'Lebih '.$dateDiff.' hari' ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tgl Pengembalian</th>
                            <th>Nama Anggota</th>
                            <th>Judul</th>
                            <th>Total Denda</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>