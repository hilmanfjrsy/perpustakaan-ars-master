<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Daftar Buku
                <a href="<?=site_url('buku/add');?>" class="btn btn-primary float-end">Tambah Data</a>
            </div>
            <div class="card-body text-primary">
                <table class="table table-striped table-hover" id="tableBuku">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>ISBN</th>
                            <th>Tahun</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($show as $key => $value) 
                        {
                        ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->judul_buku; ?></td>
                                <td><?= $value->pengarang; ?></td>
                                <td><?= $value->penerbit; ?></td>
                                <td><?= $value->isbn; ?></td>
                                <td><?= $value->thn_terbit; ?></td>
                                <td>
                                    <a href="<?=site_url('buku/edit/'.$value->id_buku);?>" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a onClick="return confirm('Apakah Anda yakin ingin menghapus ini?')" href="<?=site_url('buku/delete/'.$value->id_buku);?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>ISBN</th>
                            <th>Tahun</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>