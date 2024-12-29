<style>
/* Styling table untuk center alignment */
#data-table-basic {
    width: 100%;
    border-collapse: collapse;
}

#data-table-basic th,
#data-table-basic td {
    text-align: center;
    /* Horizontal alignment */
    vertical-align: middle;
    /* Vertical alignment */
}

#data-table-basic th {
    background-color: #f8f9fa;
    /* Opsional: memberikan warna latar belakang pada header */
    font-weight: bold;
}

#data-table-basic td {
    padding: 10px;
    /* Opsional: memberi jarak antara teks dan border */
}

#tambahMatkulBtn {
    margin-top: 15px;
    /* Memberi jarak antara dropdown dan tombol */
}

.disabled-option {
    color: #ccc !important;
    /* Berikan warna abu-abu */
    pointer-events: none;
    /* Nonaktifkan interaksi */
    cursor: not-allowed;
    /* Ubah kursor menjadi 'tidak diizinkan' */
}
</style>

<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Sistem Input KRS Mahasiswa</h2>
                    </div>
                    <div class="cmp-tb-hd bcs-hd">
                        <h2>Data Mahasiswa</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <input type="hidden" class="form-control" name="idmhs" id="idmhs"
                                value="<?=$mahasiswa['id']?>" readonly>
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="namamhs" id="nama"
                                        value="<?=$mahasiswa['namaMhs']?>" disabled placeholder=" Nama Mahasiswa">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fas fa-id-card"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="nimmhs" id="nimmhs"
                                        value="<?=$mahasiswa['nim']?>" disabled placeholder=" NIM Mahasiswa">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="number" class="form-control" name="ipkmhs" id="ipkmhs"
                                        value="<?=$mahasiswa['ipk']?>" disabled placeholder=" IPK">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-element-list">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <a href="<?=base_url('krs/unduh_krs/').$mahasiswa['id']?>"><button class="btn btn-success notika-btn-success">Unduh KRS</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>Data Mahasiswa</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Kelp</th>
                                    <th>Ruangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($jadwal){ $i=1; foreach($jadwal as $jwl):?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$jwl['matakuliah']?></td>
                                    <td><?=$jwl['sks']?></td>
                                    <td><?=$jwl['kelp']?></td>
                                    <td><?=$jwl['ruangan']?></td>
                                </tr>
                                <?php endforeach; } else{?>
                                <tr>
                                    <td colspan="10">Tidak ada data mahasiswa</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jquery
		============================================ -->
<script src="<?=base_url('assets/js/vendor/jquery-1.12.4.min.js')?>"></script>
<!-- bootstrap JS
		============================================ -->
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
<script>
$(document).ready(function() {


});
</script>