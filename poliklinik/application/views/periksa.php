<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periksa - Poliklinik</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/vendors/iconly/bold.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/vendors/simple-datatables/style.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/app.css')?>">
    <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.svg')?>" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?=base_url('assets/images/logo/logo.png')?>" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="<?=base_url('')?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data Master</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?=base_url('home/data_dokter')?>">Data Dokter</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?=base_url('home/data_pasien')?>">Data Pasien</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                                <i class="fa-solid fa-book-medical"></i>
                                <span>Periksa</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Actions</li>

                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                                <i class="fa-brands fa-github"></i>
                                <span>Git Hub</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link logout'>
                                <i class="fa-solid fa-sign-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Periksa Pasien</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data Periksa</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="pasien-dropdown">Pasien</label>
                                                            <div class="position-relative">
                                                                <select class="form-control" id="pasien-dropdown" name="idpasien">
                                                                    <option value="">Pilih Nama Pasien</option>
                                                                    <?php foreach($pasien as $datapasien): ?>
                                                                        <option value="<?= $datapasien['id'] ?>"><?= $datapasien['nama'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="dokter-dropdown">Dokter</label>
                                                            <div class="position-relative">
                                                                <select class="form-control" id="dokter-dropdown" name="iddokter">
                                                                    <option value="">Pilih Nama Dokter</option>
                                                                    <?php foreach($dokter as $datadokter): ?>
                                                                        <option value="<?= $datadokter['id'] ?>"><?= $datadokter['nama'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="fa-solid fa-stethoscope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="tanggal-periksa">Tanggal Periksa</label>
                                                            <div class="position-relative">
                                                                <input type="datetime-local" class="form-control"
                                                                    placeholder="Pilih Tanggal dan Jam Periksa" 
                                                                    id="tanggal_periksa" name="tanggalperiksa">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar-check"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">

                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Catatan</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Catatan Periksa" id="catatan"
                                                                    name="catatan">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-book"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Obat</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Obat" id="obat"
                                                                    name="obat">
                                                                <div class="form-control-icon">
                                                                    <i class="fa-solid fa-kit-medical"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1 submit-periksa">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List Periksa Pasien</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pasien</th>
                                                    <th>Dokter</th>
                                                    <th>Tanggal Periksa</th>
                                                    <th>Catatan</th>
                                                    <th>Obat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($list_periksa as $periksa){?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$periksa['nama_pasien']?></td>
                                                    <td><?=$periksa['nama_dokter']?></td>
                                                    <td><?=$periksa['tgl_periksa']?></td>
                                                    <td><?=$periksa['catatan']?></td>
                                                    <td><?=$periksa['obat']?></td>
                                                    <td><a href="#" class="btn btn-sm btn-outline-success btnUpdate" data-bs-toggle="modal" data-bs-target="#updatePeriksaForm" data-id='<?=$periksa['id']?>'>Update</a> 
                                                        | <a href="#" class="btn btn-sm btn-outline-danger btnDelete" data-id="<?=$periksa['id_periksa']?>">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="modal fade text-left" id="updatePeriksaForm" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Update Data Periksa </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <input type="hidden" id="id_periksa" name="id_periksa">
                                <label>Nama Pasien: </label>
                                <div class="form-group">
                                    <select name="id_pasien" class="form-control" id="namaPasienDropdown">
                                        <option value="">Pilih Nama Pasien</option>
                                        <!-- Data pasien akan diisi dengan AJAX -->
                                    </select>
                                </div>
                                <label>Nama Dokter: </label>
                                <div class="form-group">
                                    <select name="id_dokter" class="form-control" id="namaDokterDropdown">
                                        <option value="">Pilih Nama Dokter</option>
                                        <!-- Data dokter akan diisi dengan AJAX -->
                                    </select>
                                </div>
                                <label>Tanggal Periksa: </label>
                                <div class="form-group">
                                    <input type="datetime-local" placeholder="Tanggal Periksa" name="tanggal_periksa" id="tanggalPeriksa" class="form-control">
                                </div>
                                <label>Catatan: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Catatan Periksa" name="catatan_periksa" id="catatanPeriksa" class="form-control">
                                </div>
                                <label>Obat: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Obat" name="obat_periksa" id="obatPeriksa" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="button" class="btn btn-primary ml-1 submit-update-periksa"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    
    <script src="<?=base_url('assets/vendors/apexcharts/apexcharts.js')?>"></script>
    <script src="<?=base_url('assets/js/pages/dashboard.js')?>"></script>
    
    <script src="<?=base_url('assets/js/main.js')?>"></script>
    <script src="<?=base_url('assets/vendors/simple-datatables/simple-datatables.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script>
        $(document).ready(function() {
            $('.logout').click(function(event) {
                event.preventDefault();

                $.ajax({
                    url: '<?= base_url("home/logout") ?>',
                    type: 'POST',
                    dataType: 'json', // Menentukan bahwa kita mengharapkan JSON sebagai respons
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Sukses Log Out',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Log Out', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });

            $('.btnUpdate').click(function(event) {
                event.preventDefault();

                const idPeriksa = $(this).data('id');

                // AJAX untuk mengambil data pasien, dokter, dan periksa (jika ada ID)
                $.ajax({
                    url: '<?= base_url("home/get_data_periksa") ?>',
                    type: 'POST',
                    data: { id: idPeriksa },
                    dataType: 'json',
                    success: function(data) {
                        // Kosongkan dropdown
                        $('#namaPasienDropdown').empty().append('<option value="">Pilih Nama Pasien</option>');
                        $('#namaDokterDropdown').empty().append('<option value="">Pilih Nama Dokter</option>');

                        // Isi dropdown pasien
                        data.pasien.forEach(function(pasien) {
                            $('#namaPasienDropdown').append(`<option value="${pasien.id}">${pasien.nama}</option>`);
                        });

                        // Isi dropdown dokter
                        data.dokter.forEach(function(dokter) {
                            $('#namaDokterDropdown').append(`<option value="${dokter.id}">${dokter.nama}</option>`);
                        });

                        // Isi data periksa ke form jika data periksa ada
                        if (data.periksa) {
                            $('#id_periksa').val(data.periksa.id);
                            $('#namaPasienDropdown').val(data.periksa.id_pasien);
                            $('#namaDokterDropdown').val(data.periksa.id_dokter);
                            $('#tanggalPeriksa').val(data.periksa.tgl_periksa);
                            $('#catatanPeriksa').val(data.periksa.catatan);
                            $('#obatPeriksa').val(data.periksa.obat);
                        } else {
                            alert('Data periksa tidak ditemukan');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil data');
                    }
                });
            });

            $('.submit-periksa').click(function(event) {
                event.preventDefault();

                var iddokter = $('[name="iddokter"]').val();
                var idpasien = $('[name="idpasien"]').val();
                var catatan = $('[name="catatan"]').val();
                var obat = $('[name="obat"]').val();
                var tanggalperiksa = $('[name="tanggalperiksa"]').val();

                if (iddokter.length == 0) {
                    Swal.fire('Error', 'Dokter tidak boleh kosong !', 'error');
                    return;
                }
                if (idpasien.length == 0) {
                    Swal.fire('Error', 'Pasien tidak boleh kosong !', 'error');
                    return;
                }
                if (tanggalperiksa.length == 0) {
                    Swal.fire('Error', 'Tanggal periksa tidak boleh kosong !', 'error');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("home/data_periksa") ?>',
                    type: 'POST',
                    data: {
                        idpasien:idpasien,
                        iddokter:iddokter,
                        catatan:catatan,
                        obat:obat,
                        tanggalperiksa:tanggalperiksa,
                    }, // Menentukan bahwa kita mengharapkan JSON sebagai respons
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Sukses Menambah Data Periksa',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Menambah Data Periksa', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });
            

            $('.submit-update-periksa').click(function(event) {
                event.preventDefault();

                var id_periksa = $('[name="id_periksa"]').val();
                var id_dokter = $('[name="id_dokter"]').val();
                var id_pasien = $('[name="id_pasien"]').val();
                var catatan = $('[name="catatan_periksa"]').val();
                var obat = $('[name="obat_periksa"]').val();
                var tanggal_periksa = $('[name="tanggal_periksa"]').val();

                if (id_dokter.length == 0) {
                    Swal.fire('Error', 'Dokter tidak boleh kosong !', 'error');
                    return;
                }
                if (id_pasien.length == 0) {
                    Swal.fire('Error', 'Pasien tidak boleh kosong !', 'error');
                    return;
                }
                if (tanggal_periksa.length == 0) {
                    Swal.fire('Error', 'Tanggal periksa tidak boleh kosong !', 'error');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("home/update_data") ?>',
                    type: 'POST',
                    data: {
                        id_periksa:id_periksa,
                        id_pasien:id_pasien,
                        id_dokter:id_dokter,
                        catatan:catatan,
                        obat:obat,
                        tanggal_periksa:tanggal_periksa,
                        type:'dataperiksa'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Sukses Mengupdate Data Periksa',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Mengupdate Data Periksa', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });
            
            $('.btnDelete').click(function(event) {
                event.preventDefault();

                var idPeriksa = $(this).data('id');

                Swal.fire({
                    title: 'Hapus Data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya !',
                    cancelButtonText: 'Batal !',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: '<?= base_url("home/delete_data") ?>',
                            type: 'POST',
                            data: {
                                idPeriksa:idPeriksa,
                                type:'periksa'
                            }, // Menentukan bahwa kita mengharapkan JSON sebagai respons
                            success: function(response) {
                                if (response.status === 'success') {
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: 'Sukses Menghapus Data Periksa',
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', response.message || 'Gagal Menghapus Data Periksa', 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                            }
                        });
                    }
                }); 
            });
            
        });
    </script>
</body>

</html>