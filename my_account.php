<?php 
	session_start(); 
	if(isset($_SESSION['user'])){
		//echo("<pre>Logged in");
		//print_r($_SESSION['user']); 
	}else{
		header("Location: login.php");
		die();
	}
	
?>
<?php require_once("files/header.php"); ?> 
<br>

<?php
include 'files/functions.php';
// Mengambil data first_name dari tabel users
$user_id = $_SESSION['user']['user_id'];
$SQL = "SELECT first_name FROM users WHERE user_id = '{$user_id}'";
$result = $conn->query($SQL);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
} else {
    // Jika data first_name tidak ditemukan, Anda dapat memberikan nilai default
    $first_name = "";
}

if (isset($_GET['logout'])) {
    // Hapus semua data session
    session_destroy();
    // Redirect ke halaman login setelah logout
    header("Location: login.php");
    exit;
}
?>



<!-- Tambahkan gaya CSS untuk tombol logout -->
<style>
    .logout-btn {
        display: inline-block;
        background-color: #0063ED;
        color: #ffffff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
    }

    .logout-btn:hover {
        background-color: #2A2A41;
    }
</style>

<div class="container">
    <div class="row">
        <?php include 'files/admin_side_bar.php'; ?>
        <div class="col-md-8">
            <h2>MY account</h2>
            <p>Welcome, <?php echo $first_name; ?>!</p>
            <!-- Tambahkan tombol Logout -->
            <a href="?logout=true" class="logout-btn">Logout</a>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php require_once("files/footer.php"); ?> 

  