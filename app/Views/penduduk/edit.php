<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Penduduk</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('penduduk/update/' . $penduduk->id_pend) ?>">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" id="NIK" name="NIK" value="<?= $penduduk->NIK; ?>">
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $penduduk->nama; ?>">
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $penduduk->tanggal_lahir; ?>">
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                        <option value="pria" <?= ($penduduk->jenis_kelamin == "pria" ? "Selected" : ""); ?>>Pria</option>
                        <option value="wanita" <?= ($penduduk->jenis_kelamin == "wanita" ? "Selected" : ""); ?>>Wanita</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $penduduk->no_telp; ?>" />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $penduduk->email; ?>" />
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat"><?= $penduduk->alamat; ?></textarea>
                </div>

                <br>

                <div class="form-group">
                    <input type="submit" value="Update Data" class="btn btn-info" />
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>