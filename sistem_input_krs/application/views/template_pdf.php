<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Pastikan semua isi tabel berada di tengah */
        table.table-bordered th, 
        table.table-bordered td {
            text-align: center; /* Horizontal center */
            vertical-align: middle; /* Vertical center */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Kartu Rencana Studi</h2>
        <p>Nama Mahasiswa : <?= $mahasiswa['namaMhs'] ?></p>
        <p>NIM : <?= $mahasiswa['nim'] ?></p>
        <p>IPK : <?= $mahasiswa['ipk'] ?></p>
        <table class="table table-bordered">
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
                <?php 
                $total_sks = 0; // Inisialisasi total SKS
                if ($jadwal) { 
                    $i = 1; 
                    foreach ($jadwal as $jwl): 
                        $total_sks += $jwl['sks']; // Menambahkan SKS ke total
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $jwl['matakuliah'] ?></td>
                    <td><?= $jwl['sks'] ?></td>
                    <td><?= $jwl['kelp'] ?></td>
                    <td><?= $jwl['ruangan'] ?></td>
                </tr>
                <?php 
                    endforeach; 
                } else { 
                ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data mahasiswa</td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><strong>Total SKS</strong></td>
                    <td><strong><?= $total_sks ?></strong></td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
