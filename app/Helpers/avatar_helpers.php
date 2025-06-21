<?php

if (!function_exists('userAvatar')) {
    function userAvatar($foto)
    {
        $uploadPath = FCPATH . 'uploads/foto/' . $foto;
        if (!empty($foto) && file_exists($uploadPath)) {
            return base_url('uploads/foto/' . $foto);
        }
        return base_url('assets/images/users/user-1.jpg');
    }
}
