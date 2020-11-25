<?php
ini_set("error_reporting", 0); //untuk menyembunyikan semua pesan error atau warning pada tampilan output program
session_start(); //Kegunaan dari fungsi session_start(); untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser

//Untuk mengecek apakah form sudah diinput
if(isset($_POST['submit'])){
  
  //variabel data berupa array
  $data = array();
  $data['nim'] = $_POST['nim']; //Variabel untuk menampung nilai nim
  $data['nama'] = $_POST['nama']; //Variabel untuk menampung nilai nama
  $data['nilai1'] = $_POST['nilai1']; //Variabel untuk menampung nilai 1
  $data['nilai2'] = $_POST['nilai2']; //Variabel untuk menampung nilai 2
  
  $data['jumlah_nilai'] = $data['nilai1'] + $data['nilai2']; //Variabel untuk menampung nilai jumlah nilai dan didaptkan dengan cara menambahkan variabel nilai 1 dengan nilai 2
  $data['rata_rata'] = $data['jumlah_nilai'] / 2; //Variabel untuk menampung nilai rata-rata dengan cara membagi nilai yang didapatkan dari variabel jumlah nilai dibagi 2

  //Pengecekan untuk SESSION
  if($_SESSION['data_mahasiswa']){ //session disini berupa variabel global untuk menyimpan data sementara yang berupa array

    $data_mahasiswa = $_SESSION['data_mahasiswa']; //Variabel global dengan nama data_mahasiswa
    array_push($data_mahasiswa, $data); //Fungsi array_push untuk memasukkan data array ke data session array
    $_SESSION['data_mahasiswa'] = $data_mahasiswa;
 
  }else{
    
    $_SESSION['data_mahasiswa'][] = $data;

  }

  header("location: ./index.php"); //Jika tidak ada data yang di input maka tampilan akan kembali ke halaman index.php

}

//Pemilihan untuk menambah data atau menghapus data
switch($_GET['act']){

  //Case untuk menambah data yang dibuat dalam bentuk tabel dengan 2 kolom 5 baris
  case "add":
    echo "<h1>Input Data Mahasiswa</h1>";
    echo "<table style='width:60%; text-align: left'>";
    
    //Form input ini menggunakan method (cara yang digunakan untuk mengirimkan data/nilai ke halaman lain untuk diproses) 
    //Method POST dipilih karena akan mengirimkan data atau nilai langsung ke action untuk ditampung, tanpa menampilkan pada URL
    $form = "<form action='' method='post'>"; 

    //Baris pertama untuk menampilkan form input untuk NIM dengan name yang sesuai dengan variabel array nim diatas
    $form .= "<tr><th>
                      NIM
                  </th> 
                  <td>: 
                      <input type='text' name='nim' style='width:90%; padding: 5px 5px; margin: 5px 0;background-color: #dee2e6; border: 2px solid #212529; border-radius: 2px;'>
                  </td>
                  </tr>";

    //Baris kedua untuk menampilkan form input untuk Nama dengan name yang sesuai dengan variabel array nama diatas
    $form .= "<tr><th>
                  Nama
              </th> 
              <td>: 
                  <input type='text' name='nama' style='width:90%; padding: 5px 5px; margin: 5px 0;background-color: #dee2e6; border: 2px solid #212529; border-radius: 2px;'>
              </td>
          </tr>";

    //Baris ketiga untuk menampilkan form input untuk Nilai 1 dengan name yang sesuai dengan variabel array nilai 1 diatas dan bertipe number
    $form .= "<tr><th>
                  Nilai 1 
              </th>
              <td>: 
                  <input type='number' name='nilai1' style='width:90%; padding: 5px 5px; margin: 5px 0;background-color: #dee2e6; border: 2px solid #212529; border-radius: 2px;'>
              </td>
          </tr>";

    //Baris keempat untuk menampilkan form input untuk Nilai 2 dengan name yang sesuai dengan variabel array nilai 2 diatas dan bertipe number
    $form .= "<tr><th>
                  Nilai 2 
              </th> 
              <td>: 
                  <input type='number' name='nilai2' style='width:90%; padding: 5px 5px; margin: 5px 0;background-color: #dee2e6; border: 2px solid #212529; border-radius: 2px;'>
              </td>
            </tr>";

    //Baris kelima untuk menampilkan input dengan tipe submit
    $form .= "<tr><td></td>
            <td>
                <br><input type='submit' name='submit' value='SUBMIT'  style='background-color: #242423; border-radius: 1rem; cursor: pointer; color: white; padding: 14px 40px;'>
                </form>
            </td>
        </tr>";
    echo $form;
    echo "</table>";
    break;

  //Case untuk menghapus data
  case "delete":
    $id = $_GET['id']; //Data yang dihapus akan didapatkan dengan cara menggunakan id yang ada
    unset($_SESSION['data_mahasiswa'][$id]); //Untuk menghapus data sesuai dengan id yang dipilih
    header("location: ./index.php");
    break;

  case "default":
  break;
}

//Untuk menampilkan data yang telah di input
if($_SESSION['data_mahasiswa']){ ?>
    <br>  
    <a href='?act=add'><p><b>Tambah Data [+]</b></p></a>
    <div style="text-align:center"><b>Data Nilai Mahasiswa</b></div>
    <table border="1"  style="width:100%; text-align:center; border-collapse: collapse;">
      <tr style="height:40px; background-color: #adb5bd">
        <th>No.</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Nilai 1</th>
        <th>Nilai 2</th>
        <th>Jumlah Nilai</th>
        <th>Rata-Rata</th>
        <th>Hapus Data</th>
      </tr>
    <?php $no=0; foreach ($_SESSION['data_mahasiswa'] as $key => $value) { $no++; ?>
      <tr style="height:30px;">
        <td><?php echo $no;?></td>
        <td style="text-align:left"><?php echo $value['nim'];?></td>
        <td style="text-align:left"><?php echo $value['nama'];?></td>
        <td><?php echo $value['nilai1'];?></td>
        <td><?php echo $value['nilai2'];?></td>
        <td><?php echo $value['jumlah_nilai'];?></td>
        <td><?php echo $value['rata_rata'];?></td>
        <td><button type="button" style="background-color: white; color: black; border: 2px solid #f44336; cursor: pointer;" onclick="window.location='index.php?act=delete&id=<?php echo $key;?>'">HAPUS</button></td>
      </tr>
    <?php } ?>
  
    </table>

  <!-- Jika tidak ada data yang disimpan maka user akan menambahkan data baru dengan cara menekan tulisan 'Tambah[+]' -->
  <?php }else{
    echo "<h1><b>Tidak Ada Data!</b></h1> <a href='?act=add'>Tambah[+]</a>";
  }

?>