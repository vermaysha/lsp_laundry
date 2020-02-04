<?php
defined('_IN_APP_') or die('access denied !'); // keep silent

/**
 * Unauntenticated user must login first !
 */
function must_authenticated() {
    if ( 
        ! isset($_SESSION['is_login']) && 
        ! isset($_SESSION['username'])
    ) {
        header('location: ' . SITE_URL . '/login.php');
        exit(0);
    }
}

/**
 * Authenticated user cannot login again !
 */
function must_unauthenticated() {
    if (
        isset($_SESSION['is_login']) &&
        isset($_SESSION['username'])
    ) {
        header('location: ' . SITE_URL);
        exit(0);
    }
}

function have_access($feature) {
    $permisions = [
        'admin' => [
            'manage_laundry',
            'manage_customer',
            'manage_transaction',
            'print_order',
            'print_customer_card',
            'generate_report'
        ],
        'pelanggan' => [
            'check_data_laundry',
            'check_status_laundry',
            'check_detail_laundry',
            'generate_report'
        ]
    ];

    return in_array($feature, $permisions[$_SESSION['role']], true);
}