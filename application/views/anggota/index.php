<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Daftar Anggota
                <a href="<?=site_url('anggota/add');?>" class="btn btn-primary float-end">Tambah Data</a>
            </div>
            <div class="card-body text-primary">
                <table class="table table-striped table-hover" id="tableBuku">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Email</th>
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
                                <td><?= $value->nama_anggota; ?></td>
                                <td><?= $value->gender; ?></td>
                                <td><?= $value->no_telp; ?></td>
                                <td><?= $value->alamat; ?></td>
                                <td><?= $value->email; ?></td>
                                <td>
                                    <a href="<?=site_url('anggota/edit/'.$value->id_anggota);?>" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a onClick="return confirm('Apakah Anda yakin ingin menghapus ini?')" href="<?=site_url('anggota/delete/'.$value->id_anggota);?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>