<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Alias agar URL /login tidak lagi menghasilkan 404.
 * Login asli project berada di controller administrator/login.
 */
class Login extends CI_Controller
{
    public function index()
    {
        redirect('administrator/login');
    }
}
