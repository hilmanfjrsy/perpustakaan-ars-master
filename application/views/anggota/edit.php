<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Edit Data Anggota
                <a href="<?= site_url('anggota'); ?>" class="btn btn-warning float-end">Kembali</a>
            </div>
            <div class="card-body text-primary">
                <form method="post" action="<?=site_url('anggota/update');?>">
                    <input type="hidden" name="id_anggota" value="<?=$show->id_anggota;?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Anggota</label>
                        <input required type="text" name="nama_anggota" class="form-control" id="exampleFormControlInput1" placeholder="Jhon Example" value="<?=$show->nama_anggota;?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Gender</label>
                        <select required class="form-select" name="gender" aria-label="Default select example">
                            <?php
                            foreach ($gender as $key => $value) {
                            ?>
                                <option value="<?php echo $key; ?>" <?=$key == $show->gender ? ' selected="selected"' : '';?>><?php echo $key; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telepon</label>
                        <input required type="number" min='0' name="no_telp" class="form-control" id="exampleFormControlInput1" placeholder="08xxxxxxxxxx" value="<?=$show->no_telp;?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input required type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="Alamat" value="<?=$show->alamat;?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input required type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="example@email.com" value="<?=$show->email;?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input required type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="*******" value="<?=$show->password;?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Ubah</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>