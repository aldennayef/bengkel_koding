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
                        <p>Masukkan data mahasiswa. </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="namamhs" id="nama"
                                        placeholder=" Nama Mahasiswa">
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
                                        placeholder=" NIM Mahasiswa">
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
                                        placeholder=" IPK">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int">
                                <button type="button" class="btn btn-success notika-btn-success" id="inputMhsBtn">Input
                                    Mhs</button>
                            </div>
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
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM</th>
                                    <th>IPK</th>
                                    <th>SKS Maksimal</th>
                                    <th style="width:40vh;">Matkul yang Diambil</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($mahasiswa){ $i=1; foreach($mahasiswa as $mhs):?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$mhs['namaMhs']?></td>
                                    <td><?=$mhs['nim']?></td>
                                    <td><?=$mhs['ipk']?></td>
                                    <td><?=$mhs['sks']?></td>
                                    <td><?=$mhs['matakuliah']?></td>
                                    <td><button class="btn btn-danger notika-btn-success hapusBtn"
                                            id="sa-warning" data-id="<?=$mhs['id']?>">Hapus</button>
                                        |
                                        <a href="<?=base_url('krs/v_edit_mahasiswa/').$mhs['id']?>"><button class="btn btn-primary notika-btn-success">Edit</button></a>
                                        |
                                        <a href="<?=base_url('krs/v_unduh_krs/').$mhs['id']?>"><button class="btn btn-info notika-btn-success">Lihat</button></a>
                                    </td>
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

    $('#inputMhsBtn').click(function(event) {
        event.preventDefault();

        var nama = $('[name="namamhs"]').val();
        var nim = $('[name="nimmhs"]').val();
        var ipk = $('[name="ipkmhs"]').val();

        if (nama === '' || nim === '' || ipk === '') {
            swal({
                title: "Gagal !",
                text: "Data mahasiswa wajib lengkap diisi.",
                timer: 2000
            });
            return;
        }

        $.ajax({
            url: '<?=base_url("krs/input_mhs")?>',
            type: 'post',
            data: {
                namaMhs: nama,
                nimMhs: nim,
                ipkMhs: ipk
            },
            success: function(response) {
                if (response.status === 'success') {
                    swal({
                        title: "Sukses !",
                        type: "success",
                        text: "Berhasil menambah data mahasiswa.",
                    }).then(function() {
                        location.href = '<?=base_url('')?>';
                    });
                } else {
                    swal({
                        title: "Gagal !",
                        type: "warning",
                        text: "Gagal menambah data mahasiswa.",
                        timer: 2000
                    });
                }
            },
            error: function() {
                swal({
                    title: "Kesalahan sistem!",
                    text: "Sistem mengalami kesalahan dalam mengirim data.",
                    timer: 2000
                });
            }
        });
    });

    $('.hapusBtn').click(function(event) {
        event.preventDefault();

        var id = $(this).data('id');

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
        }).then(function() {
            $.ajax({
                url: '<?=base_url("krs/hapus_mhs")?>',
                type: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.status === 'success') {
                        swal({
                            title: "Sukses !",
                            type: "success",
                            text: "Berhasil menghapus data mahasiswa.",
                        }).then(function() {
                            location.href = '<?=base_url('')?>';
                        });
                    } else {
                        swal({
                            title: "Gagal !",
                            type: "warning",
                            text: "Gagal menghapus data mahasiswa.",
                            timer: 2000
                        });
                    }
                },
                error: function() {
                    swal({
                        title: "Kesalahan sistem!",
                        text: "Sistem mengalami kesalahan dalam mengirim data.",
                        timer: 2000
                    });
                }
            });
        });
    });

});
</script>