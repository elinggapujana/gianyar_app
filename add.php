<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Id</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td>Desa ID</td>
                <td><input type="text" name="desa_id"></td>
            </tr>
            <tr> 
                <td>Kecamatan ID</td>
                <td><input type="text" name="kecamatan_id"></td>
            </tr>
            <tr> 
                <td>Nama Penerima</td>
                <td><input type="text" name="nama_penerima"></td>
            </tr>
               <tr> 
                <td>Nomor KTP</td>
                <td><input type="text" name="nomor_ktp"></td>
            </tr>
               <tr> 
                <td>Nomor KK</td>
                <td><input type="text" name="nomor_kk"></td>
            </tr>
             <tr> 
                <td>Jenis bantuan ID</td>
                <td><input type="text" name="jenis_bantuan_id"></td>
            </tr>
             <tr> 
                <td>Lintang</td>
                <td><input type="text" name="lintang"></td>
            </tr>
             <tr> 
                <td>Bujur</td>
                <td><input type="text" name="bujur"></td>
            </tr>
            <tr> 
                <td>Keterangan</td>
                <td><input type="text" name="keterangan"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $alamat = $_POST['alamat'];
        $desa_id = $_POST['desa_id'];
         $kecamatan_id = $_POST['kecamatan_id'];
        $nama_penerima = $_POST['nama_penerima'];
        $nomor_ktp = $_POST['nomor_ktp'];
        $nomor_kk = $_POST['nomor_kk'];
        $jenis_bantuan_id = $_POST['jenis_bantuan_id'];
        $lintang = $_POST['lintang'];
        $bujur = $_POST['bujur'];
        $keterangan = $_POST['keterangan'];


        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penerima_bantuan(id,alamat,desa_id,kecamatan_id,nama_penerima,nomor_ktp,nomor_kk,jenis_bantuan_id,lintang,bujur,keterangan) VALUES('$id','$email','$alamat','$desa_id','$kecamatan_id','$nama_penerima','$nomor_ktp,'$nomor_kk','$jenis_bantuan_id','$lintang','$bujur','$keterangan')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>
