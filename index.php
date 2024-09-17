
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}

.main {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

/* Form Styles */
.form {
    background-color: #fff;
    padding: 20px;
    width: 60%;
    border-radius: 5px;
    margin-left: 300px;
}

/* Label Styles */
label {
    display: block;
    margin-bottom: 5px;
}

.select{
    display: flex; 
    margin-right: 10px;
}

/* Input Styles */
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    
}

/* Button Styles */
button[type="submit"] {
    background-color: #ffcd00;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 2px 2px 3px #DA291C;
}

button[type="submit"]:hover {
    background-color: #ffbf00;
    box-shadow: 2px 2px 3px #DA291C;
}

.ilang {
    margin-left: 300px;
}

/* Message Styles */
#p {
    margin-top: 10px;
    font-size: 14px;
    color: #007bff;
}
/* CSS untuk elemen bukti transaksi */
#bukti { 
    background-color: #f9f9f9;
    padding: 20px;
    width: 60%;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    margin-left: 300px;
}

#bukti h3 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
}

#bukti p {
    font-size: 16px;
    color: #666;
    margin-bottom: 8px;
}

#bukti hr {
    border: none;
    border-top: 1px dashed #ccc;
    margin-top: 15px;
    margin-bottom: 15px;
}

/* CSS untuk belah */
.belah {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* CSS untuk tombol tampilkan */
#tampilkan {
    background-color: #FFCD00;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#tampilkan:hover {
    background-color: #FFCD00; /* Warna latar belakang saat hover */
}

@media print{
    .form {
        display: none;
    }
}

    </style>
</head>
<body>
    <h1>Bensin Shell</h1>
    <main>
        <form action="" method="post">
                <div class="form">
            <div class="BB">
                <label for="">Masukkan Jumlah Liter</label>
                <input type="number" name="BB" id="jumlah">
            </div>
            <div class="brg">
                <label for="">Plih Tipe Bahan Bakar:</label>
                <select name="brg" id="jenis">
                    <option value="Shell Super">Shell Super</option>
                    <option value="Shell V-Power">Shell V-Power</option>
                    <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                    <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>    
                </select>
            </div> 
            <div class="select">
                <label for="">Masukan Uang:</label>
                <input type="number" name="bayar">
                <div class="btn">
                    <button type="submit" name="cash" id="bayar">Bayar</button>
                </div>
            </div>
            <div class="select">
                <button type="submit" name="cek"  id="cek">Cek Harga</button>
            </div>
            <div class="btn">
                <p id="p"></p>
            </div>
                
            
        </div>
        </form>

    <?php
    require "shell.php";
    ?>
    
    <div class="btn">
        <button type="submit" class="ilang" onclick="window.print()">Cetak Bon Ini</button>
    </div>

    </main>
    <script>
                const hargaBahanBakar = {
            "Shell Super": 15000,
            "Shell V-Power": 16000,
            "Shell V-Power Diesel": 18000,
            "Shell V-Power Nitro": 16500,
        };

        document.getElementById("cek").addEventListener("click", function(event) {
    event.preventDefault(); // Mencegah perilaku default dari form HTML (reload halaman)
    
    // Ambil nilai dari input dengan id "jenis" dan "jumlah"
    const jenis = document.getElementById("jenis").value;
    const jumlah = parseInt(document.getElementById("jumlah").value);

    // Cek apakah nilai yang dimasukkan adalah angka yang valid
    if (isNaN(jumlah)) {
        // Jika jumlah tidak valid, tampilkan pesan kesalahan
        document.getElementById("p").innerHTML = "Masukkan jumlah liter yang valid.";
    } else {
        // Jika jumlah valid, lanjutkan dengan perhitungan harga
        if (hargaBahanBakar.hasOwnProperty(jenis)) {
            const harga = hargaBahanBakar[jenis] * jumlah;
            const ppn = harga;
            const ak = ppn;
            // Tampilkan total harga yang harus dibayar di halaman HTML
            document.getElementById("p").innerHTML = 'Harga yang harus kamu bayar adalah Rp. ' + harga + ' harga belum termasuk *ppn';
        } else {
            // Jika tipe bahan bakar tidak valid, tampilkan pesan kesalahan
            document.getElementById("p").innerHTML = "Tipe bahan bakar tidak valid.";
        }
    }
});
    function pindah(){
        document.getElementById('cetak').addEventListener("click",function(url){
        })
    }

    </script>
</body>
</html>