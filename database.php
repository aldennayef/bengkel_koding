<?php
// Konfigurasi database
$host = 'localhost'; // Host database
$dbname = 'bengkod'; // Nama database PostgreSQL
$user = 'postgres'; // Username PostgreSQL
$password = 'password'; // Password PostgreSQL
$port = '9603'; // Port PostgreSQL

/// Fungsi untuk menyambungkan ke PostgreSQL
function connectDatabase($host, $port, $dbname, $user, $password) {
    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname"; // Menyertakan port
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $pdo;
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
}

// Fungsi untuk menyimpan data dari form
function saveTodo($pdo, $isi, $tgl_awal, $tgl_akhir) {
    try {
        // Query untuk menyimpan data ke tabel todo_list
        $query = "INSERT INTO todolist (isi, tgl_awal, tgl_akhir, status) VALUES (:isi, :tgl_awal, :tgl_akhir, :status)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':isi' => $isi,
            ':tgl_awal' => $tgl_awal,
            ':tgl_akhir' => $tgl_akhir,
            ':status' => 'Belum',
        ]);
        return true; // Mengembalikan nilai true jika berhasil
    } catch (PDOException $e) {
        echo "Gagal menyimpan data: " . $e->getMessage();
        return false;
    }
}

// Fungsi untuk menghapus data dari form
function deleteTodo($pdo, $id) {
    try {
        // Query untuk menyimpan data ke tabel todo_list
        $query = "DELETE from todolist where id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':id' => $id,
        ]);
        return true; // Mengembalikan nilai true jika berhasil
    } catch (PDOException $e) {
        echo "Gagal menyimpan data: " . $e->getMessage();
        return false;
    }
}

// Fungsi untuk mengambil data berdasarkan ID
function getTodoById($pdo, $id) {
    try {
        $query = "SELECT * FROM todolist WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Gagal mengambil data: " . $e->getMessage();
        return null;
    }
}

$todo = null;

// Fungsi untuk mengupdate data
function updateTodo($pdo, $id, $isi, $tgl_awal, $tgl_akhir) {
    try {
        $query = "UPDATE todolist SET isi = :isi, tgl_awal = :tgl_awal, tgl_akhir = :tgl_akhir WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':isi' => $isi,
            ':tgl_awal' => $tgl_awal,
            ':tgl_akhir' => $tgl_akhir,
            ':id'=>$id
        ]);
        return true;
    } catch (PDOException $e) {
        echo "Gagal mengupdate data: " . $e->getMessage();
        return false;
    }
}

// Fungsi untuk mengupdate status dari form
function updateStatusTodo($pdo, $id, $status) {
    try {
        // Query untuk menyimpan data ke tabel todo_list
        $query = "UPDATE todolist SET status = :status WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':status' => $status,
        ]);
        return true; // Mengembalikan nilai true jika berhasil
    } catch (PDOException $e) {
        echo "Gagal menyimpan data: " . $e->getMessage();
        return false;
    }
}

// Fungsi untuk mengambil data dari tabel todo_list
function fetchTodos($pdo) {
    try {
        $query = "SELECT * FROM todolist ORDER BY id ASC"; // Mengambil semua data dari tabel todo_list
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan data sebagai array asosiatif
    } catch (PDOException $e) {
        echo "Gagal mengambil data: " . $e->getMessage();
        return [];
    }
}

// Koneksi ke database
$pdo = connectDatabase($host, $port, $dbname, $user, $password);

// Mengambil data dari database
$todos = fetchTodos($pdo);

// Proses form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $isi = $_POST['isi'];
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

    // Validasi sederhana apakah semua field diisi
    if (!empty($isi) && !empty($tgl_awal) && !empty($tgl_akhir)) {
        if($id){
            // Simpan data ke database menggunakan fungsi saveTodo
            if (updateTodo($pdo, $id, $isi, $tgl_awal, $tgl_akhir)) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        }else{
            // Simpan data ke database menggunakan fungsi saveTodo
            if (saveTodo($pdo, $isi, $tgl_awal, $tgl_akhir)) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Semua field harus diisi!</div>";
    }
}

if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $todo = getTodoById($pdo, $id); // Mengambil data berdasarkan ID untuk diisi di form
}

// Proses jika ada parameter 'delete_id' di URL
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id']; // Ambil ID dari URL
    if (deleteTodo($pdo, $id)) {
        // Jika berhasil, arahkan ulang ke halaman utama untuk refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data!</div>";
    }
}

// Proses jika ada parameter 'updatestatus_id' di URL
if (isset($_GET['updatestatus_id'])) {
    $id = $_GET['updatestatus_id']; // Ambil ID dari URL
    $status = $_GET['status']; // Ambil ID dari URL
    if($status=='Sudah'){
        $updateStatus = 'Belum';
    }else{
        $updateStatus = 'Sudah';
    }
    if (updateStatusTodo($pdo, $id, $updateStatus)) {
        // Jika berhasil, arahkan ulang ke halaman utama untuk refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupdate data!</div>";
    }
}
?>
