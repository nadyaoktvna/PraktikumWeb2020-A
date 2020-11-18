//parseFloat berfungsi  fungsi parseFloat juga akan mengubah non-float (tanpa desimal) menjadi float (dengan desimal). 
//--> artinya jika bilangan didalamnya mengandung desimal maka akan ditampilkan semua nilainya.
//document.getElemenById digunakan untuk mengambil suatu value dari form input yang pastinya dari element HTML dimana element tersebut sudah kita buatkan id

//function ini digunakan untuk melakukan operasi aritmatik tambah
function tambah() {
    var bil1 = parseFloat(document.getElementById("bil1").value); //variabel untuk bilangan pertama yang diinput
    var bil2 = parseFloat(document.getElementById("bil2").value); // variabel untuk bilangan kedua yang di input
    var hasil = document.getElementById("hasil"); //variabel untuk menyimpan hasil
    var total; //variabel total menampung nilai penjumlahan dari bil1 dan bil2
    total=bil1+bil2; //operasi aritmatik dengan memanggil var bil1 dan bil2
    hasil.value=total; //nilai yang disimpan akan ditampung di variabel hasil
}

//function untuk operasi aritmatik pengurangan
function kurang() {
    var bil1 = parseFloat(document.getElementById("bil1").value);
    var bil2 = parseFloat(document.getElementById("bil2").value);
    var hasil = document.getElementById("hasil");
    var total;
    total=bil1-bil2;
    hasil.value=total;
}

//function untuk operasi aritmatik perkalian
function kali() {
    var bil1 = parseFloat(document.getElementById("bil1").value);
    var bil2 = parseFloat(document.getElementById("bil2").value);
    var hasil = document.getElementById("hasil");
    var total;
    total=bil1*bil2;
    hasil.value=total;
}

//function untuk operasi aritmatik pembagian
function bagi() {
    var bil1 = parseFloat(document.getElementById("bil1").value);
    var bil2 = parseFloat(document.getElementById("bil2").value);
    var hasil = document.getElementById("hasil");
    var total;
    total=bil1/bil2;
    hasil.value=total;
}    