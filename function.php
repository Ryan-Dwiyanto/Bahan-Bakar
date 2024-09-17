<?php 
session_start();
class Sheell
{
    protected $jumlah;
    protected $jenis;
    protected $ppn;
    protected $data_harga = [
        "S Super" => 15420,
        "S V-Power" => 16130,
        "S V-Power Diesel" => 18310,
        "S V-Power Nitro" => 16510
    ];

    public function __construct($jumlah, $jenis)
    {
        $this->jumlah = $jumlah;
        $this->jenis = $jenis;
        $this->ppn = 0.10;
    }

    public function getPPN()
    {
        return $this->ppn * $this->getHargaDasar();
    }

    public function getJumlah()
    {
        return $this->jumlah;
    }

    public function getJenis()
    {
        return $this->jenis;
    }

    public function getHargaJenis()
    {
        return $this->data_harga[$this->jenis];
    }

    public function getHargaDasar()
    {
        return $this->data_harga[$this->jenis] * $this->jumlah;
    }
}

//membuat class beli yang mewarisi kelas sheell
class Beli extends Sheell
{
    public function getTotal()
    {
        return $this->getHargaDasar() * (1 + $this->ppn);
    }

}