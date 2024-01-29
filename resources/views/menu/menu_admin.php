<?php
/* Dokumentasi Icon https://fontawesome.com/search Filter = Free */
$arr_menu = array(
    array(
        'text'     => 'Dashboard',
        'url'      => 'dashboard',
        'icon'     => 'fas fa-tachometer-alt',
        'has_sub'  => false,
        'sub_menu' => array()
    ),
    array(
        'text'     => 'Master',
        'url'      => '#',
        'icon'     => 'fas fa-database',
        'has_sub'  => true,
        'sub_menu' => array(
            array(
                'text'  => 'Pengguna',
                'url'   => 'pengguna',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            ),
            array(
                'text'  => 'Siswa',
                'url'   => 'siswa',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            )
        )
    ),
);
return $arr_menu;
