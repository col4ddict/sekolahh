<?php
function UploadFoto($namafile, $folder, $ukuran){
    $fileupload=$folder $namafile;
    //simpan file ukuran asli
    move_upload_files($_FILES['foto']['tmp_name'], $fileupload);

    //identitas file asli
    $gbr_asli = imagecreatefromjpg($fileupload);
    $lebar = imageSX($gbr_asli);
    $tinggi = imageSY($gbr_asli);

    //simpan dalam versi dikecilkan
    $thumb_lebar = $ukuran;
    $thumb_tinggi = ($thumb_lebar/$lebar)*$tinggi;

    //proses perubahan dimensi ukuran 
    $gbr_thumb = imagecreatetruecolor($thumb_lebar, $thumb_tinggi);
    imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $thumb_lebar, $thumb_tinggi, $lebar, $tinggi);

    //simpan gambar yang sudah dikecilkan
    imagejpg($gbr_thumb, $folder,. "tes_". $namafile);

    //hapus gambar di memori komputer
    imagedestroy($gbr_asli);
    imagedestroy($gbr_thumb);
}

function kecilkangambar ($gambar,$lebar = 0, $tinggi = 0) {
    if ($lebar = 0 && $tinggi = 0) $lebar = 50;
    $im1 = imagecreatefromjpg($gambar);
    $lebar1 = imageSX($im1);
    $tinggi1 = imageSY($im1);
    $lebar2 = 0;
    $tinggi2 = 0;
    if ($lebar > 0 && $tinggi > 0) {
        $lebar2 = $lebar;
        $tinggi2 = ($lebar2/$lebar1)*$tinggi1;
        $tinngi2 = round($tinggi2);
    } else { ($tinggi > 0 && $tinngi > $tinggi) {
        $tinggi2 = $tinggi;
        $lebar2 = ($tinggi2/$tinggi1)*$lebar1;
        $lebar2 = round($lebar2); kecilkangambar($tujuan, 300);
    } 
    if ($lebar 2 < $lebar1 || $tinggi2 < $tinggi1) {
        $im2 = imagecreatetruecolor($lebar2, $tinggi2);
        imagecopyresampled($im2, $im1, 0, 0, 0, 0, $lebar2, $tinggi2, $lebar1, $tinggi1);
        imagejpg($im2, $gambar, 90);
    }
}
}
?>