<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM penerima_bantuan ORDER BY id DESC");
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New User</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>ID</th> 
        <th>Alamat</th> 
        <th>Desa ID</th> 
        <th>Kecamatan ID</th>
        <th>Nama Penerima</th> 
        <th>Nomor KTP</th>
        <th>Nomor KK<th> 
        <th>Jenis Bantuan ID</th> 
        <th>Lintang</th> 
        <th>Bujur</th>
        <th>Keterangan</th> 
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['alamat']."</td>";
        echo "<td>".$user_data['desa_id']."</td>";  
        echo "<td>".$user_data['kecamatan_id']."</td>";
        echo "<td>".$user_data['nama_penerima']."</td>";
        echo "<td>".$user_data['nomor_ktp']."</td>";   
        echo "<td>".$user_data['nomor_kk']."</td>";
        echo "<td>".$user_data['jenis_bantuan_id']."</td>";
        echo "<td>".$user_data['lintang']."</td>";  
        echo "<td>".$user_data['bujur']."</td>";
        echo "<td>".$user_data['keterangan']."</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>