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
                        <p>Update data mahasiswa. </p>
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
                        <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int">
                                <button type="button" class="btn btn-success notika-btn-success" id="editMhsBtn">Edit
                                    Mhs</button>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                <h2>KRS Mahasiswa</h2>
                            </div>
                            <?php $matkulDiambilNama = array_column($matkulDiambil, 'matakuliah'); ?>
                            <div class="chosen-select-act fm-cmp-mg">
                                <select class="chosen" multiple data-placeholder="Pilih Mata Kuliah...">
                                    <?php foreach ($matkul as $mkl): ?>
                                    <?php if (!in_array($mkl['matakuliah'], $matkulDiambilNama)): ?>
                                    <option value="<?= $mkl['id'] ?>" data-sks="<?= $mkl['sks'] ?>"
                                        data-matakuliah="<?= $mkl['matakuliah'] ?>" data-kelp="<?= $mkl['kelp'] ?>"
                                        data-ruangan="<?= $mkl['ruangan'] ?>">
                                        <?= $mkl['matakuliah'] ?>
                                    </option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                <h2>Kuota SKS Mahasiswa</h2>
                            </div>
                            <div class="form-example-int">
                                <input type="number" class="form-control" name="sisasks" id="sisasks"
                                    value="<?=$mahasiswa['sks']?>" disabled>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int">
                                <button type="button" class="btn btn-success notika-btn-success"
                                    id="tambahMatkulBtn">Tambah
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
                        <h2>Data Mahasiswa</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Kelp</th>
                                    <th>Ruangan</th>
                                    <th>Aksi</th>
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
                                    <td><button class="btn btn-danger notika-btn-success hapusBtn" id="sa-warning"
                                            data-idMhsHapus="<?=$jwl['id']?>" data-matkul="<?= $jwl['matakuliah']; ?>" data-sks="<?= $jwl['sks']; ?>">Hapus</button>
                                        |
                                        <button class="btn btn-info notika-btn-success">Lihat</button>
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

    const maxSKS = parseInt($('#sisasks').val()); // SKS maksimal mahasiswa
    let selectedSKS = 0; // Total SKS yang dipilih

    // Fungsi untuk mengecek mata kuliah terendah dan validasi dropdown
    function checkDropdownStatus() {
        let minSKS = Infinity; // Mulai dengan nilai tak hingga

        // Cari mata kuliah dengan SKS terendah
        $('.chosen option').each(function() {
            const mataKuliahSKS = parseInt($(this).data('sks'));
            if (mataKuliahSKS < minSKS) {
                minSKS = mataKuliahSKS;
            }
        });

        // Disable dropdown jika kuota SKS kurang dari SKS mata kuliah terendah
        if (maxSKS < minSKS) {
            $('.chosen').prop('disabled', true);
        } else {
            $('.chosen').prop('disabled', false);
        }

        // Refresh plugin Chosen untuk memperbarui tampilan
        $('.chosen').trigger('chosen:updated');
    }

    // Panggil fungsi saat halaman dimuat
    checkDropdownStatus();

    // Event untuk perbarui dropdown saat opsi dipilih
    $('.chosen').change(function() {
        selectedSKS = 0; // Reset total SKS yang dipilih

        // Iterasi semua opsi yang dipilih
        $(this).find('option:selected').each(function() {
            const mataKuliahSKS = parseInt($(this).data('sks')); // Ambil SKS dari opsi
            selectedSKS += mataKuliahSKS; // Tambahkan ke total SKS
        });

        const remainingSKS = maxSKS - selectedSKS; // Hitung sisa SKS
        $('#sisasks').val(remainingSKS >= 0 ? remainingSKS : 0); // Update sisa SKS di input

        // Validasi opsi dropdown
        $(this).find('option').each(function() {
            const mataKuliahSKS = parseInt($(this).data('sks'));
            if (mataKuliahSKS > remainingSKS) {
                $(this).addClass('disabled-option'); // Tambahkan kelas untuk opsi tidak valid
            } else {
                $(this).removeClass('disabled-option'); // Hapus kelas jika valid
            }
        });

        // Refresh plugin Chosen untuk memperbarui tampilan
        $(this).trigger('chosen:updated');
    });

    $('#editMhsBtn').click(function(event) {
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

        var mhsId = $(this).data('idmhshapus'); // Ambil mhs_id dari atribut data
        var matkul = $(this).data('matkul'); // Ambil nama matkul dari atribut data
        var sks = $(this).data('sks'); // Ambil jumlah sks dari atribut data

        // Konfirmasi sebelum menghapus
        swal({
            title: "Yakin ingin menghapus?",
            text: `Mata kuliah ${matkul} akan dihapus.`,
            icon: "warning",
            buttons: true,
            showCancelButton: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Kirim request ke server untuk menghapus data
                $.ajax({
                    url: '<?= base_url("krs/hapus_krs") ?>', // Ganti dengan URL controller Anda
                    type: 'POST',
                    data: {
                        id: mhsId,
                        matkul: matkul,
                        sks: sks,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            swal("Berhasil!", "Data berhasil dihapus.", "success")
                                .then(() => {
                                    location
                                        .reload(); // Reload halaman setelah sukses
                                });
                        } else {
                            swal("Gagal!", response.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        swal("Kesalahan Sistem!",
                            "Terjadi kesalahan dalam menghapus data.", "error");
                        console.error("Error:", error);
                    },
                });
            }
        });
    });

    $('#tambahMatkulBtn').click(function() {
        var mahasiswaId = $('[name="idmhs"]').val(); // ID mahasiswa
        var selectedMatkul = []; // Array untuk menyimpan data matkul yang dipilih

        // Iterasi semua opsi yang dipilih
        $('.chosen option:selected').each(function() {
            selectedMatkul.push({
                id: $(this).val(),
                sks: $(this).data('sks'),
                matakuliah: $(this).data('matakuliah'),
                kelp: $(this).data('kelp'),
                ruangan: $(this).data('ruangan')
            });
        });

        // Validasi apakah ada matkul yang dipilih
        if (selectedMatkul.length === 0) {
            swal({
                title: "Gagal!",
                text: "Pilih setidaknya satu mata kuliah!",
                icon: "warning",
                timer: 2000,
            });
            return;
        }

        console.log({
            mahasiswa_id: mahasiswaId,
            matkul: selectedMatkul
        });

        // Kirim data ke controller menggunakan AJAX
        $.ajax({
            url: '<?= base_url("krs/tambah_krs") ?>',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                mahasiswa_id: mahasiswaId,
                matkul: selectedMatkul,
            }),
            success: function(response) {
                swal({
                    title: "Sukses!",
                    text: "Mata kuliah berhasil ditambahkan.",
                    icon: "success",
                    timer: 2000,
                }).then(() => {
                    location.reload(); // Reload halaman setelah sukses
                });
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Kesalahan Sistem!",
                    text: "Terjadi kesalahan dalam mengirim data.",
                    icon: "error",
                    timer: 2000,
                });
                console.error("Error:", error);
            },
        });

    });

});
</script>