<?php 
include('database.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">
        <h3>
            To Do List
            <small class="text-muted">
                Catat semua hal yang akan kamu kerjakan disini.
            </small>
        </h3>
        <hr>

        <!-- Form -->

        <form class="form row" method="POST" action="" name="myForm">
            <input type="hidden" name="id" value="<?= isset($todo) ? $todo['id'] : '' ?>"> <!-- Input hidden untuk ID -->
            <div class="col mb-2">
                <label for="inputIsi" class="form-label fw-bold">
                Kegiatan
                </label>
                <input type="text" class="form-control" name="isi" id="inputIsi" placeholder="Kegiatan" value="<?= isset($todo) ? htmlspecialchars($todo['isi']) : '' ?>">
            </div>
            <div class="col mb-2">
                <label for="inputTanggalAwal" class="form-label fw-bold">
                Tanggal Awal
                </label>
                <input type="date" class="form-control" name="tgl_awal" id="inputTanggalAwal" placeholder="Tanggal Awal" value="<?= isset($todo) ? $todo['tgl_awal'] : '' ?>">
            </div>
                <div class="col mb-2">
                <label for="inputTanggalAkhir" class="form-label fw-bold">
                Tanggal Akhir
                </label>
                <input type="date" class="form-control" name="tgl_akhir" id="inputTanggalAkhir" placeholder="Tanggal Akhir" value="<?= isset($todo) ? $todo['tgl_akhir'] : '' ?>">
            </div>
            <div class="col mb-2 d-flex">
                <button type="submit" class="btn btn-primary rounded-pill px-3 mt-auto" name="simpan">
                    <?= isset($todo) ? 'Update' : 'Simpan' ?>
                </button>
            </div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Awal</th>
                    <th scope="col">Akhir</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todos as $index => $todo): ?>
                <tr>
                    <th><?= $index + 1 ?></th>
                    <td style="display: none;"><?= $todo['id'] ?></td>
                    <td><?= htmlspecialchars($todo['isi']) ?></td>
                    <td><?= htmlspecialchars($todo['tgl_awal']) ?></td>
                    <td><?= htmlspecialchars($todo['tgl_akhir']) ?></td>
                    <td>
                        <?php if($todo['status']=='Belum' || $todo['status']=='belum'){?>
                        <a class="btn btn-warning rounded-pill px-3" type="button" 
                        href="?updatestatus_id=<?= $todo['id'] ?>&status=<?=$todo['status']?>"><?= htmlspecialchars($todo['status']) ?></a>
                        <?php }else{?>
                        <a class="btn btn-success rounded-pill px-3" type="button" 
                        href="?updatestatus_id=<?= $todo['id'] ?>&status=<?=$todo['status']?>"><?= htmlspecialchars($todo['status']) ?></a>
                        <?php }?>
                    </td>
                    <td>
                        <a class="btn btn-info rounded-pill px-3" href="?update_id=<?= $todo['id'] ?>">Ubah</a>
                        <a class="btn btn-danger rounded-pill px-3" href="?delete_id=<?= $todo['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>