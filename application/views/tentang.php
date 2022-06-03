<hr>
<div class="row">
    <div class="col">
        <?php
        if ($this->session->userdata('level') == 'admin') {
            echo '<a href="' . base_url("admin/Dashboard/input_tentang") . '" class="btn btn-primary">Upload tentang</a>';
        }
        ?>

        <div class="table-responsive">
            <?php
            foreach ($kegiatan->result() as $row) {
                echo '<img src="' . base_url('assets/') . $row->img . '" class="img-fluid rounded mx-auto d-block img-thumbnail" alt="Responsive image">';
                echo '<p>';
                echo $row->tentang;
            }
            ?>
        </div>
    </div>
</div>