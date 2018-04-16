<?php

function getInfoSM($field){
    $ci = get_instance();
    $ci->db->where('id_lembaga',1);
    $rs = $ci->db->get('tbl_profil_lembaga')->row_array();
    return $rs[$field];
}



/* fungsi untuk mendapatkan value dari sebuah tabel
 * $table nama tabel yang digunakan
 * $field nama field yang ingin ditampilkan
 * $key ingin ditampilkan berdasarkan field yang mana
 * $value = berdasrkan apa
 */
function getFieldValue($table,$field,$key,$value){
    $ci = get_instance();
    $ci->db->where($key,$value);
    $data = $ci->db->get($table)->row_array();
    return $data[$field];
}


?>
