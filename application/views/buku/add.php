<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Tambah Buku
                <a href="<?= site_url('buku'); ?>" class="btn btn-warning float-end">Kembali</a>
            </div>
            <div class="card-body text-primary">
                <form method="post" action="<?=site_url('buku/create');?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" id="exampleFormControlInput1" placeholder="isi dengan judul buku">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" id="exampleFormControlInput1" placeholder="isi dengan nama pengarang buku">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="exampleFormControlInput1" placeholder="isi dengan penerbit buku">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">E-ISBN</label>
                        <input type="number" name="isbn" class="form-control" id="exampleFormControlInput1" placeholder="isi dengan judul buku">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tahun Terbit</label>
                        <input type="number" min="2000" max="2021" name="thn_terbit" class="form-control" id="exampleFormControlInput1" placeholder="2021">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>