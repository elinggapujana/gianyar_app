<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $alamat=$_POST['alamat'];
    $desa_id=$_POST['desa_id'];
    $kecamatan_id=$_POST['kecamatan_id'];
    $nama_penerima = $_POST['nama_penerima'];
    $nomor_ktp=$_POST['nomor_ktp'];
    $nomor_kk=$_POST['nomor_kk'];
    $jenis_bantuan_id=$_POST['jenis_bantuan_id'];
    $lintang = $_POST['lintang'];
    $bujur=$_POST['bujur'];
    $keterangan=$_POST['keterangan'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE penerima_bantuan SET id='$id',alamat='$alamat',desa_id='$desa_id',kecamatan_id='$kecamatan_id',nama_penerima='$nama_penerima',nomor_ktp='$nomor_ktp',nomor_kk='$nomor_kk',jenis_bantuan_id='$enis_bantuan_id',lintang='$lintang',bujur='$bujur',keterangan='$keterangan' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penerima_bantuan WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
 

     $id = $user_data['id'];
    $alamat=$user_data['alamat'];
    $desa_id=$user_data['desa_id'];
    $kecamatan_id=$user_data['kecamatan_id'];
    $nama_penerima = $user_data['nama_penerima'];
    $nomor_ktp=$user_data['nomor_ktp'];
    $nomor_kk=$user_data['nomor_kk'];
    $jenis_bantuan_id=$user_data['jenis_bantuan_id'];
    $lintang = $user_data['lintang'];
    $bujur=$user_data['bujur'];
    $keterangan=$user_data['keterangan'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>