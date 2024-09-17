<?php

use function PHPSTORM_META\type;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    class Shell{
        protected $harga,
                $jumlah,
                $jenis,
                $tempat,
                $ppn,
                $uang;
    
            public function __construct($harga,$jumlah,$jenis,$uang){
            $this -> harga = $harga;
            $this -> jumlah = $jumlah;
            $this -> jenis = $jenis;
            $this -> ppn = 10;
            $this -> uang = $uang;
        }
        
        public function getHarga(){
            return $this -> harga;
        }
        public function getJumlah(){
            return $this -> jumlah;
        }
        public function getJenis(){
            return $this -> jenis;
        }
        
        public function getPpn(){
            return $this -> ppn;
        }
        
        public function getUang(){
            return $this -> uang;
        }
    }
    
    class Harga extends Shell{

        public function hargaTotal(){
            $total =  $this -> harga *  (int)$this -> jumlah;  
            $total += $total * $this -> ppn / 100;
            return $total;
        }
        public function bayarr(){
            $total = $this -> hargaTotal();
            $bayar = $this -> uang;
            $jmlh = $this -> getJumlah();
            $kembalian = $bayar - $total;
            echo "<hr>"; // Garis putus-putus setelah output
            echo "<div class='bukti' id='bukti' display = 'none'>";
            echo "<hr>"; // Garis putus-putus sebelum output
            echo"<div class='belah>'";
            echo "<h3>Bukti Transaksi:</h3>";
            echo "<p><strong>Anda membeli bahan bakar minyak dengan tipe :</strong> " . $this->jenis . "</p>";
            print "<p><strong>dengan jumlah :</strong> " . $this -> jumlah . " Liter</p>"; // Menambahkan kata "Liter" 
            echo "<p><strong>Total yang harus anda bayar:</strong> Rp " . number_format($this -> hargaTotal(), 2, ',', '.') . "</p>";
            echo "<hr>";
            echo"
            Anda membayar sebesar Rp. "  . number_format($this -> uang, 2, ',', '.') . " dan anda harus membayar dengan nominal Rp." .number_format($total, 2, ',', '.') . " dan anda mendapat kan kembalian dengan sebesar Rp." . number_format($kembalian, 2, ',', '.');
            echo "<hr>";
            echo"
            </div>
            
            ";
            echo "</div>";
            
            
        }
    }  
    if(isset($_POST['cash'])){ // Ubah dari submit menjadi submit
        if(isset($_POST["brg"], $_POST["BB"] , $_POST['bayar'])) { // Memeriksa ketersediaan input
            
            $jenis = $_POST["brg"];
            $jumlah = $_POST["BB"];
            $uang = $_POST["bayar"];
            $hargaBahanBakar = [
                "Shell Super" => 15420.00,
                "Shell V-Power" => 16130.00,
                "Shell V-Power Diesel" => 18310.00,
                "Shell V-Power Nitro" => 16510.00,
            ];
            
            if(array_key_exists($jenis, $hargaBahanBakar)) {
                $uang = $_POST["bayar"];
                $harga = $hargaBahanBakar[$jenis] + $jumlah;
                $beli = new Harga($harga, $jumlah, $jenis,$uang);
                $beli->bayarr();
            } else {
                echo "<p style='text-align: center;'>uang anda tidak cukup</p>";
            }
        }
    }

}