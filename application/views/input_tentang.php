<hr>
<form method="POST" action="<?= base_url('API/input_tentang_action') ?>" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <?= $this->session->flashdata('msg') ?><br>
                <label for="img">Upload Gambar</label>
                <input type="file" class="form-control-file" id="img" name='img'>
            </div>
            <div class="form-group">
                <label for="keterangan">Tambah keterangan</label>
                <textarea class="form-control" id="keterangan" rows="8" placeholder="Keterangan" name="tentang"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <a href="<?= base_url('admin/Dashboard/tentang') ?>" class="btn btn-block btn-danger">Batal</a>
        </div>
        <div class="col-6">
            <button class="btn btn-block btn-primary" type="submit">Upload</button>
        </div>
    </div>
</form>
<?php
$this->session->set_flashdata('msg', '');
?>