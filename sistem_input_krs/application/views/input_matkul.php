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
                        <h2>Data Mata Kuliah</h2>
                        <p>Masukkan data matkul. </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="namamatkul" id="nama"
                                        placeholder=" Nama Matkul">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="fas fa-id-card"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="number" class="form-control" name="sksmatkul" id="sksmatkul"
                                        placeholder=" SKS">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="kelpmatkul" id="kelpmatkul"
                                        placeholder=" Kelp">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="ruanganmatkul" id="ruanganmatkul"
                                        placeholder=" Ruangan">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int">
                                <button class="btn btn-success notika-btn-success inputMatkulBtn">Input
                                    Matkul</button>
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
                        <h2>Data Mata Kuliah</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Matkul</th>
                                    <th>SKS</th>
                                    <th>Kelp</th>
                                    <th>Ruangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($matakuliah){ $i=1; foreach($matakuliah as $matkul):?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$matkul['matakuliah']?></td>
                                    <td><?=$matkul['sks']?></td>
                                    <td><?=$matkul['kelp']?></td>
                                    <td><?=$matkul['ruangan']?></td>
                                    <td><button class="btn btn-danger notika-btn-success hapusBtn" id="sa-warning"
                                            data-id="<?=$matkul['id']?>">Hapus</button>
                                        |
                                        <button class="btn btn-primary notika-btn-success editBtn" data-toggle="modal"
                                            data-target="#myModalone" data-id="<?=$matkul['id']?>">Edit</button>
                                    </td>
                                </tr>
                                <?php endforeach; } else{?>
                                <tr>
                                    <td colspan="10">Tidak ada data matakuliah</td>
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

<div class="modal fade" id="myModalone" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-example-wrap">
                    <div class="cmp-tb-hd">
                        <h2>Edit Data Mata Kuliah</h2>
                    </div>
                    <input type="hidden" class="form-control input-sm" name="idedit">
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="namaedit"
                                    placeholder="Mata Kuliah">
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>SKS</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="sksedit" placeholder="SKS">
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Kelp</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="kelpedit" placeholder="Kelompok">
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Ruangan</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="ruanganedit"
                                    placeholder="Ruangan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default saveBtn" data-dismiss="modal">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    $('.inputMatkulBtn').click(function(event) {
        event.preventDefault();

        var nama = $('[name="namamatkul"]').val();
        var sks = $('[name="sksmatkul"]').val();
        var kelp = $('[name="kelpmatkul"]').val();
        var ruangan = $('[name="ruanganmatkul"]').val();

        if (nama === '' || sks === '' || kelp === '' || ruangan === '') {
            swal({
                title: "Gagal !",
                text: "Data mata kuliah wajib lengkap diisi.",
                timer: 2000
            });
            return;
        }

        $.ajax({
            url: '<?=base_url("krs/input_matkul")?>',
            type: 'post',
            data: {
                namaMatkul: nama,
                sksMatkul: sks,
                kelpMatkul: kelp,
                ruanganMatkul: ruangan,
            },
            success: function(response) {
                if (response.status === 'success') {
                    swal({
                        title: "Sukses !",
                        type: "success",
                        text: "Berhasil menambah data mata kuliah.",
                    }).then(function() {
                        location.href = '<?=base_url('krs/v_matkul')?>';
                    });
                } else {
                    swal({
                        title: "Gagal !",
                        type: "warning",
                        text: "Gagal menambah data mata kuliah.",
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
                url: '<?=base_url("krs/hapus_matkul")?>',
                type: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.status === 'success') {
                        swal({
                            title: "Sukses !",
                            type: "success",
                            text: "Berhasil menghapus data mata kuliah.",
                        }).then(function() {
                            location.href = '<?=base_url('krs/v_matkul')?>';
                        });
                    } else {
                        swal({
                            title: "Gagal !",
                            type: "warning",
                            text: "Gagal menghapus data mata kuliah.",
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


    $('.editBtn').click(function(event) {
        event.preventDefault();

        var id = $(this).data('id');

        $.ajax({
            url: '<?=base_url("krs/get_data_matkul")?>',
            type: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                if (data) {
                    $('[name="idedit"]').val(data.id);
                    $('[name="namaedit"]').val(data.matakuliah);
                    $('[name="sksedit"]').val(data.sks);
                    $('[name="kelpedit"]').val(data.kelp);
                    $('[name="ruanganedit"]').val(data.ruangan);
                } else {
                    swal({
                        title: "Gagal !",
                        type: "warning",
                        text: "Tidak ada data mata kuliah.",
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
        })
    })

    $('.saveBtn').click(function(event) {
        event.preventDefault();

        var id = $('[name="idedit"]').val();
        var nama = $('[name="namaedit"]').val();
        var sks = $('[name="sksedit"]').val();
        var kelp = $('[name="kelpedit"]').val();
        var ruangan = $('[name="ruanganedit"]').val();

        if (nama === '' || sks === '' || kelp === '' || ruangan === '') {
            swal({
                title: "Gagal !",
                text: "Data mata kuliah wajib lengkap diisi.",
                timer: 2000
            });
            return;
        }

        $.ajax({
            url: '<?=base_url("krs/edit_matkul")?>',
            type: 'post',
            data: {
                idMatkul: id,
                namaMatkul: nama,
                sksMatkul: sks,
                kelpMatkul: kelp,
                ruanganMatkul: ruangan,
            },
            success: function(response) {
                if (response.status === 'success') {
                    swal({
                        title: "Sukses !",
                        type: "success",
                        text: "Berhasil mengedit data mata kuliah.",
                    }).then(function() {
                        location.href = '<?=base_url('krs/v_matkul')?>';
                    });
                } else {
                    swal({
                        title: "Gagal !",
                        type: "warning",
                        text: "Gagal mengedit data mata kuliah.",
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
</script>