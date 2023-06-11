<?php

session_start();

const BASE_URL          = 'http://visitcianjur-travel.rf.gd/';
const APP_NAME          = 'Travel Website';
const ACCOUNT_NUMBER    = '223040046';
const ACCOUNT_NAME      = 'A.N Muhammad Rifki Ramadhani';


function connectDB() {
    $host     = "sql101.infinityfree.com"; 
    $username = "if0_34401864"; 
    $password = "rmVk9g03rz"; 
    $database = "223040046_tubes"; 
    
    $conn = mysqli_connect($host, $username, $password, $database);
    
    // Cek koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }
    
    return $conn;
}

function getAll($table) {
    $conn = connectDB();
    
    $query = "SELECT * FROM $table";
    
    $result = mysqli_query($conn, $query);
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    mysqli_close($conn);
    
    return $records;
}

function add($table, $data) {
    $conn = connectDB();
    
    $sanitizedData = array_map('strip_tags', $data);

    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", $sanitizedData) . "'";

    $query = "INSERT INTO $table ($columns) VALUES ($values)";

    mysqli_query($conn, $query);

    mysqli_close($conn);

    return 1;
}


function find($table, $id) {
    $conn = connectDB();

    $stmt = $conn->prepare("SELECT * FROM $table WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
  
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
  
    mysqli_close($conn);
  
    return $data;
}

function update($table, $id, $data) {
    $conn = connectDB();
    
    $set = "";
    
    foreach ($data as $column => $value) {
        $replaceValue = strip_tags($value);
        $set .= "$column = '$replaceValue', ";
    }
    
    $set = rtrim($set, ", ");

    $query = "UPDATE $table SET $set WHERE id = $id";

    mysqli_query($conn, $query);
    
    mysqli_close($conn);

    return 1;
}

function destroy($table, $id) {
    $conn = connectDB();
    
    $query = "DELETE FROM $table WHERE id = $id"; 
    
    mysqli_query($conn, $query);
    
    mysqli_close($conn);
    return 1;
}

function getPackageLimit() {
    $conn = connectDB();
    
    $query = "SELECT * FROM packages LIMIT 6"; 
    
    $result = mysqli_query($conn, $query);
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    mysqli_close($conn);
    
    return $records;
}

// live search packages
function getFilterPackages($keyword) {
    $conn = connectDB();
    
    $query = "SELECT * FROM packages WHERE packages.name LIKE '%{$keyword}%'"; 
    // dd($query);
    $result = mysqli_query($conn, $query);
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    mysqli_close($conn);
    
    return $records;
}
// status pembayaran user
function getBookingUser($id) {
    $conn = connectDB();

    $waitingPayment = '<span class="badge alert-warning">Menunggu Pembayaran</span>';
    $process = '<span class="badge alert-primary">Dalam Proses</span>';
    $success = '<span class="badge alert-success">Berhasil</span>';
    $void = '<span class="badge alert-danger">Dibatalkan</span>';

    $sql = "SELECT 
        bookings.*, 
        CASE
            WHEN status = 0 THEN '$waitingPayment'
            WHEN status = 1 THEN '$process'
            WHEN status = 2 THEN '$success'
            WHEN status = 3 THEN '$void'
        END AS booking_status,
        packages.name as package_name 
    FROM bookings 
    LEFT JOIN packages ON bookings.package_id = packages.id
    WHERE user_id = $id";

    $result = $conn->query($sql);
  
    if ($result && $result->num_rows > 0) {
      $records = $result->fetch_all(MYSQLI_ASSOC);
      return $records;
    } else {
      return array();
    }
  
    $conn->close();
}
// notif verivikasi admin
function getBookingAdmin() {
    $conn = connectDB();

    $waitingPayment = '<span class="badge alert-warning">Menunggu Pembayaran</span>';
    $process = '<span class="badge alert-primary">Dalam Proses</span>';
    $success = '<span class="badge alert-success">Berhasil</span>';
    $void = '<span class="badge alert-danger">Dibatalkan</span>';

    $sql = "SELECT 
        bookings.*, 
        CASE
            WHEN status = 0 THEN '$waitingPayment'
            WHEN status = 1 THEN '$process'
            WHEN status = 2 THEN '$success'
            WHEN status = 3 THEN '$void'
        END AS booking_status,
        packages.name as package_name,
        full_name
    FROM bookings 
    LEFT JOIN packages ON bookings.package_id = packages.id
    LEFT JOIN users ON bookings.user_id = users.id";

    $result = $conn->query($sql);
  
    if ($result && $result->num_rows > 0) {
      $records = $result->fetch_all(MYSQLI_ASSOC);
      return $records;
    } else {
      return array();
    }
  
    $conn->close();
}

function getBookingDetail($id) {
    $conn = connectDB();

    $sql = "SELECT bookings.*,
        packages.name as package_name,
        price
    FROM bookings 
    LEFT JOIN packages ON bookings.package_id = packages.id
    WHERE bookings.id = $id";

    $result = $conn->query($sql);
  
    if ($result && $result->num_rows > 0) {
      $records = $result->fetch_all(MYSQLI_ASSOC);
      return $records;
    } else {
      return array();
    }
  
    $conn->close();
}
// notif pembayaran user
function getPaymentUser($id) {
    $conn = connectDB();

    $waitingVerification = '<span class="badge alert-primary">Menunggu Verifikasi</span>';
    $success = '<span class="badge alert-success">Berhasil</span>';
    $rejected = '<span class="badge alert-danger">Ditolak</span>';
    
    $sql = "SELECT 
        payments.*, 
        CASE
            WHEN payments.status = 0 THEN '$waitingVerification'
            WHEN payments.status = 1 THEN '$success'
            WHEN payments.status = 2 THEN '$rejected'
        END AS payment_status,
        total_price,
        packages.name as package_name,
        bookings.code as booking_code
    FROM payments 
    LEFT JOIN bookings ON payments.booking_id = bookings.id
    LEFT JOIN packages ON bookings.package_id = packages.id
    WHERE bookings.user_id = $id";

    $result = $conn->query($sql);
  
    if ($result && $result->num_rows > 0) {
      $records = $result->fetch_all(MYSQLI_ASSOC);
      return $records;
    } else {
      return array();
    }
  
    $conn->close();
}
// status pembayaran admin
function getPaymentAdmin() {
    $conn = connectDB();

    $waitingVerification = '<span class="badge alert-primary">Menunggu Verifikasi</span>';
    $success = '<span class="badge alert-success">Berhasil</span>';
    $rejected = '<span class="badge alert-danger">Ditolak</span>';
    
    $sql = "SELECT 
        payments.*, 
        CASE
            WHEN payments.status = 0 THEN '$waitingVerification'
            WHEN payments.status = 1 THEN '$success'
            WHEN payments.status = 2 THEN '$rejected'
        END AS payment_status,
        total_price,
        packages.name as package_name,
        users.full_name as customer_name,
        bookings.code as booking_code
    FROM payments 
    LEFT JOIN bookings ON payments.booking_id = bookings.id
    LEFT JOIN packages ON bookings.package_id = packages.id
    LEFT JOIN users ON bookings.user_id = users.id";

    $result = $conn->query($sql);
  
    if ($result && $result->num_rows > 0) {
      $records = $result->fetch_all(MYSQLI_ASSOC);
      return $records;
    } else {
      return array();
    }
  
    $conn->close();
}
// detail pembayaran user di admin
function getPaymentDetailAdmin($id) {
    $conn = connectDB();

    $waitingVerification = '<span class="badge alert-primary">Menunggu Verifikasi</span>';
    $success = '<span class="badge alert-success">Berhasil</span>';
    $rejected = '<span class="badge alert-danger">Ditolak</span>';

    $stmt = $conn->prepare("SELECT 
        payments.*, 
        CASE
            WHEN payments.status = 0 THEN '$waitingVerification'
            WHEN payments.status = 1 THEN '$success'
            WHEN payments.status = 2 THEN '$rejected'
        END AS payment_status,
        total_price,
        packages.name as package_name,
        users.full_name as customer_name,
        bookings.code as booking_code,
        bookings.check_in_date,
        bookings.check_out_date,
        bookings.quantity,
        bookings.total_price,
        users.full_name,
        users.phone_number,
        users.address
        
    FROM payments 
    LEFT JOIN bookings ON payments.booking_id = bookings.id
    LEFT JOIN packages ON bookings.package_id = packages.id
    LEFT JOIN users ON bookings.user_id = users.id
    WHERE payments.id = ?");

    $stmt->bind_param("i", $id);
    $stmt->execute();
  
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
  
    mysqli_close($conn);
  
    return $data;
}

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  die;
  echo "</pre>";
}

function formatRupiah($angka) {
    $rupiah = number_format($angka, 0, ',', '.');
    return 'Rp ' . $rupiah;
}

