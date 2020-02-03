<?php
defined('_IN_APP_') or die('access denied !'); // keep silent

/**
 * Unauntenticated user must login first !
 */
function must_authenticated() {
    if (! isset($_SESSION['is_login']) && 
        ! isset($_SESSION['username'])) {
        header('location: ' . SITE_URL . '/login.php');
        exit(0);
    }
}

/**
 * Get the authenticated user role
 */
function get_auth_role() {
    // TODO(Ashary): Make the functions block code 
}