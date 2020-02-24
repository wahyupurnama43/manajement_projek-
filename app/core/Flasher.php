<?php 


class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
           
           echo $_SESSION['flash']['aksi'];
            // menghapus session dan hanya di gunakkan sekali
            unset($_SESSION['flash']);
        }
    }

}


 ?>