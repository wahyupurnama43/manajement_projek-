<?php


class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        // if(isset($))
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    public static function flash($ret_obj = false)
    {
        if (isset($_SESSION['flash'])) {
            $data = $_SESSION['flash'];
            unset($_SESSION['flash']);
            // menghapus session dan hanya di gunakkan sekali
            // echo '<script>alert("test")</script>';
            if ($ret_obj) return htmlspecialchars(json_encode($data), ENT_QUOTES,  'UTF-8');
            return $data['aksi'];
        }
    }
}
