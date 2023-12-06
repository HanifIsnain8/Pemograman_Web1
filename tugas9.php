<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .error{
        color: #FF0000;
      }
    </style>
</head>
<body>
    
<?php
$nim=$nama=$alamat=$email=$nohp=$prodi="";
$nimErr=$namaerr=$alamaterr=$emailerr=$nohpErr=$prodiErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST" 
    && isset($_POST["nim"]) 
    && isset($_POST["nama"]) 
    && isset($_POST["alamat"]) 
    && isset($_POST["email"]) 
    && isset($_POST["nohp"]) 
    && isset($_POST["prodi"])) {
        $nama= $_POST ["nim"];
        $nama= $_POST ["nama"];
        $alamat= $_POST ["alamat"];
        $email= $_POST ["email"];
        $email= $_POST ["nohp"];
        $email= $_POST ["prodi"];
  }
?>

<?php
    $nim=$nama=$alamat=$email=$nohp=$prodi="";
    $nimErr=$namaErr=$alamatErr=$emailErr=$nohpErr=$prodiErr="";
    if ($_SERVER["REQUEST_METHOD"] == "POST" 
        && isset($_POST["nim"]) 
        && isset($_POST["nama"]) 
        && isset($_POST["alamat"]) 
        && isset($_POST["email"]) 
        && isset($_POST["nohp"]) 
        && isset($_POST["prodi"])) {
            if (empty($_POST["nim"])) {
                $nimErr = "Nim kosong";
            } else {
                $nim = test_input($_POST["nim"]);
            }
            if (empty($_POST["nama"])) {
                $namaErr = "Name kosong";
            } else {
                $nama = test_input($_POST["nama"]);
            }
            if (empty($_POST["alamat"])){
                $alamatErr = "Alamat kosong";
            } else {
                $alamat = test_input($_POST["alamat"]);
            }
            if (empty($_POST["email"])) {
                $emailErr = "Email kosong";
            } else {
                $email = test_input($_POST["email"]);
            }
            if (empty($_POST["nohp"])) {
                $nohpErr = "NO HP kosong";
            } else {
                $nohp = test_input($_POST["nohp"]);
            }
            if (empty($_POST["prodi"])) {
                $prodiErr = "Prodi kosong";
            } else {
                $prodi = test_input($_POST["prodi"]);
            }
        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
  Nim : <input type ="text" value="22090122" name="nim"><span class="error">* <?php echo $nimErr;?></span><br><br>
  Nama : <input type ="text" value="Muhammaf Hanif isnain" name="nama"><span class="error">* <?php echo $namaErr;?></span><br><br>
  Alamat : <input type = "text" value="kaligangsa,tegal" name="alamat"><span class="error">* <?php echo $alamatErr;?></span><br><br>
  Email : <input type ="text" value="hanifisnain8@gmail.com" name="email"><span class="error">* <?php echo $emailErr;?></span><br><br>
  NO HP : <input type ="text" value="0895*********" name="nohp"><span class="error">* <?php echo $nohpErr;?></span><br><br>
  Prodi : <input type ="text" value="Teknik Informatika" name="prodi"><span class="error">* <?php echo $prodiErr;?></span><br><br>
  <input type="submit">
</form>


<?php

    echo "Nim:";
    echo $nim;
    echo "<br>";
    echo "Nama:";
    echo $nama;
    echo "<br>";
    echo "Alamat:"; 
    echo $alamat;
    echo "<br>";
    echo "Email:"; 
    echo $email;
    echo "<br>";
    echo "NO HP:"; 
    echo $nohp;
    echo "<br>";
    echo "Prodi:"; 
    echo $prodi;
    echo "<br>";


?>

</body>
</html>