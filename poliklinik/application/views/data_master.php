<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if($type=='data_dokter'){?>
    <title>Data Dokter - Sistem Informasi Poliklinik</title>
    <?php } else {?>
    <title>Data Pasien - Sistem Informasi Poliklinik</title>
    <?php }?>
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
                            <a href="<?=base_url('home/periksa')?>" class='sidebar-link'>
                                <i class="fa-solid fa-book-medical"></i>
                                <span>Periksa</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Actions</li>

                        <li class="sidebar-item  ">
                            <a href="https://github.com/aldennayef/bengkel_koding" class='sidebar-link'>
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


            <!--
                ///////////////////////////
                /////// DATA DOKTER ///////
                ///////////////////////////
            -->

            <?php if($type === 'data_dokter'){?>
            <div class="page-heading">
                <h3>Data Dokter</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data Dokter</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Nama</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Dokter"
                                                                    id="namadokter" name="namadokter">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Alamat</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Alamat" id="alamatdokter"
                                                                    name="alamatdokter">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-house-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">No HP</label>
                                                            <div class="position-relative">
                                                                <input type="number" class="form-control"
                                                                    placeholder="08xxx"  id="nohpdokter" name="nohpdokter">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1 submit-dokter">Submit</button>
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
                                    <h4 class="card-title">List Dokter</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($list_dokter as $dokter){?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$dokter['nama']?></td>
                                                    <td><?=$dokter['alamat']?></td>
                                                    <td><?=$dokter['no_hp']?></td>
                                                    <td><a href="#" class="btn btn-sm btn-outline-success btnUpdateDokter" data-bs-toggle="modal" data-bs-target="#updateDokterForm" data-id='<?=$dokter['id']?>'>Update</a> 
                                                        | <a href="#" class="btn btn-sm btn-outline-danger btnDeleteDokter" data-id='<?=$dokter['id']?>'>Delete</a>
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


            <div class="modal fade text-left" id="updateDokterForm" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Update Data Dokter </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <input type="hidden" name="iddokter">
                                <label>Nama: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Nama Lengkap" name="nama"
                                        class="form-control">
                                </div>
                                <label>Alamat: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Alamat" name="alamat"
                                        class="form-control">
                                </div>
                                <label>No HP: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="08xxx" name="nohp"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="button" class="btn btn-primary ml-1 submit-update-dokter"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





            <!--
                /////////////////////////////////////
                /////////////////////////////////////
                //////////// DATA PASIEN ////////////
                /////////////////////////////////////
                /////////////////////////////////////
            -->

            <?php } else {?>
            <div class="page-heading">
                <h3>Data Pasien</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data Pasien</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Nama</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Pasien"
                                                                    id="namapasien"
                                                                    name="namapasien">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Alamat</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Alamat" 
                                                                    id="alamatpasien"
                                                                    name="alamatpasien">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-house-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">No HP</label>
                                                            <div class="position-relative">
                                                                <input type="number" class="form-control"
                                                                    placeholder="08xxx"  
                                                                    id="nohppasien"
                                                                    name="nohppasien">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1 submit-pasien">Submit</button>
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
                                    <h4 class="card-title">List Pasien</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($list_pasien as $pasien){?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$pasien['nama']?></td>
                                                    <td><?=$pasien['alamat']?></td>
                                                    <td><?=$pasien['no_hp']?></td>
                                                    <td><a href="#" class="btn btn-sm btn-outline-success btnUpdatePasien" data-bs-toggle="modal" data-bs-target="#updatePasienForm" data-id='<?=$pasien['id']?>'>Update</a> 
                                                        | <a href="#" class="btn btn-sm btn-outline-danger btnDeletePasien" data-id='<?=$pasien['id']?>'>Delete</a>
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

            <div class="modal fade text-left" id="updatePasienForm" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Update Data Pasien </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <label>Nama: </label>
                                <div class="form-group">
                                    <input type="hidden" name="idpasien">
                                    <input type="text" placeholder="Nama Lengkap" name="nama"
                                        class="form-control">
                                </div>
                                <label>Alamat: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Alamat" name="alamat"
                                        class="form-control">
                                </div>
                                <label>No HP: </label>
                                <div class="form-group">
                                    <input type="number" placeholder="08xxx" name="nohp"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="button" class="btn btn-primary ml-1 submit-update-pasien"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Sistem Informasi Poliklinik</p>
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

            $('.submit-dokter').click(function(event) {
                event.preventDefault();

                var nama = $('[name="namadokter"]').val();
                var alamat = $('[name="alamatdokter"]').val();
                var nohp = $('[name="nohpdokter"]').val();

                if (nama.length == 0) {
                    Swal.fire('Error', 'Nama tidak boleh kosong !', 'error');
                    return;
                }
                if (alamat.length == 0) {
                    Swal.fire('Error', 'Alamat tidak boleh kosong !', 'error');
                    return;
                }
                if (nohp.length == 0) {
                    Swal.fire('Error', 'Nomor HP tidak boleh kosong !', 'error');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("home/data_master") ?>',
                    type: 'POST',
                    data: {type:'datadokter',nama:nama,alamat:alamat,nohp:nohp}, // Menentukan bahwa kita mengharapkan JSON sebagai respons
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Sukses Menambah Data Dokter',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Menambah Data Dokter', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });
            
            $('.submit-pasien').click(function(event) {
                event.preventDefault();

                var nama = $('[name="namapasien"]').val();
                var alamat = $('[name="alamatpasien"]').val();
                var nohp = $('[name="nohppasien"]').val();

                if (nama.length == 0) {
                    Swal.fire('Error', 'Nama tidak boleh kosong !', 'error');
                    return;
                }
                if (alamat.length == 0) {
                    Swal.fire('Error', 'Alamat tidak boleh kosong !', 'error');
                    return;
                }
                if (nohp.length == 0) {
                    Swal.fire('Error', 'Nomor HP tidak boleh kosong !', 'error');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("home/data_master") ?>',
                    type: 'POST',
                    data: {type:'datapasien',nama:nama,alamat:alamat,nohp:nohp}, // Menentukan bahwa kita mengharapkan JSON sebagai respons
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Sukses Menambah Data Pasien',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Menambah Data Pasien', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });

            $('.btnDeleteDokter').click(function(event) {
                event.preventDefault();

                var iddokter = $(this).data('id');

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
                                iddokter:iddokter,
                                type:'datadokter'
                            }, // Menentukan bahwa kita mengharapkan JSON sebagai respons
                            success: function(response) {
                                if (response.status === 'success') {
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: 'Sukses Menghapus Data Dokter',
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', response.message || 'Gagal Menghapus Data Dokter', 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                            }
                        });
                    }
                }); 
            });

            $('.btnDeletePasien').click(function(event) {
                event.preventDefault();

                var idpasien = $(this).data('id');

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
                                idpasien:idpasien,
                                type:'datapasien'
                            }, // Menentukan bahwa kita mengharapkan JSON sebagai respons
                            success: function(response) {
                                if (response.status === 'success') {
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: 'Sukses Menghapus Data Pasien',
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', response.message || 'Gagal Menghapus Data Pasien', 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                            }
                        });
                    }
                }); 
            });

            $('.btnUpdatePasien').click(function(event) {
                event.preventDefault();

                var idPasien = $(this).data('id');

                $.ajax({
                    url: '<?= base_url("home/get_data") ?>',
                    type: 'POST',
                    data: {type:'datapasien',idPasien:idPasien},
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            // Isi field di dalam modal dengan data yang didapat
                            $('#updatePasienForm input[name="idpasien"]').val(data.id);
                            $('#updatePasienForm input[name="nama"]').val(data.nama);
                            $('#updatePasienForm input[name="alamat"]').val(data.alamat);
                            $('#updatePasienForm input[name="nohp"]').val(data.no_hp);
                        } else {
                            alert('Data not found');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });

            $('.btnUpdateDokter').click(function(event) {
                event.preventDefault();

                var idDokter = $(this).data('id');

                $.ajax({
                    url: '<?= base_url("home/get_data") ?>',
                    type: 'POST',
                    data: {type:'datadokter',idDokter:idDokter},
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            // Isi field di dalam modal dengan data yang didapat
                            $('#updateDokterForm input[name="iddokter"]').val(data.id);
                            $('#updateDokterForm input[name="nama"]').val(data.nama);
                            $('#updateDokterForm input[name="alamat"]').val(data.alamat);
                            $('#updateDokterForm input[name="nohp"]').val(data.no_hp);
                        } else {
                            alert('Data not found');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });

            $('.submit-update-dokter').click(function(event) {
                event.preventDefault();

                var id = $('[name="iddokter"]').val();
                var nama = $('[name="nama"]').val();
                var alamat = $('[name="alamat"]').val();
                var nohp = $('[name="nohp"]').val();

                if (nama.length == 0) {
                    Swal.fire('Error', 'Nama tidak boleh kosong !', 'error');
                    return;
                }
                if (alamat.length == 0) {
                    Swal.fire('Error', 'Alamat tidak boleh kosong !', 'error');
                    return;
                }
                if (nohp.length == 0) {
                    Swal.fire('Error', 'Nomor HP tidak boleh kosong !', 'error');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("home/update_data") ?>',
                    type: 'POST',
                    data: {type:'datadokter',iddokter:id,nama:nama,alamat:alamat,nohp:nohp},
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Sukses Update Data Dokter',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Menghapus Data Dokter', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });

            $('.submit-update-pasien').click(function(event) {
                event.preventDefault();

                var id = $('[name="idpasien"]').val();
                var nama = $('[name="nama"]').val();
                var alamat = $('[name="alamat"]').val();
                var nohp = $('[name="nohp"]').val();

                if (nama.length == 0) {
                    Swal.fire('Error', 'Nama tidak boleh kosong !', 'error');
                    return;
                }
                if (alamat.length == 0) {
                    Swal.fire('Error', 'Alamat tidak boleh kosong !', 'error');
                    return;
                }
                if (nohp.length == 0) {
                    Swal.fire('Error', 'Nomor HP tidak boleh kosong !', 'error');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("home/update_data") ?>',
                    type: 'POST',
                    data: {type:'datapasien',idpasien:id,nama:nama,alamat:alamat,nohp:nohp},
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Sukses Update Data Pasien',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Menghapus Data Pasien', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });

        });
    </script>
</body>

</html>