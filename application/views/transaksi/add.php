<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Tambah Anggota
                <a href="<?= site_url('transaksi/peminjaman'); ?>" class="btn btn-warning float-end">Kembali</a>
            </div>
            <div class="card-body text-primary">
                <form method="post" action="<?= site_url('transaksi/create'); ?>">
                        <input required hidden type="date" name="tgl_pinjam" class="form-control" id="exampleFormControlInput1" placeholder="Jhon Example" value="<?php echo date("Y-m-d"); ?>" readonly>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
                        <input required type="date" name="tgl_kembali" class="form-control" id="exampleFormControlInput1" placeholder="Jhon Example" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Anggota</label>
                        <select class="form-control selectpicker" name="id_anggota" data-live-search="true" required>
                            <?php
                            foreach ($anggota as $key => $value) {
                            ?>
                                <option data-tokens="<?php echo $value->nama_anggota; ?>" value="<?php echo $value->id_anggota; ?>"><?php echo $value->nama_anggota; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Buku</label>
                        <select class="form-control selectpicker" name="id_buku" data-live-search="true" required>
                            <?php
                            foreach ($buku as $key => $value) {
                            ?>
                                <option data-tokens="<?php echo $value->judul_buku; ?>" value="<?php echo $value->id_buku; ?>"><?php echo $value->judul_buku; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Denda</label>
                        <input required type="number" min='0' name="denda" class="form-control" id="exampleFormControlInput1" value="20000" placeholder="08xxxxxxxxxx" readonly>
                        <small id="emailHelp" class="form-text text-muted">*Denda per hari jika telat mengembalikan buku.</small>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
