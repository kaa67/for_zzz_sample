<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        $this->db->table('ci_sessions')
        ->where('id', session_id())
        ->set('user_id', null)
        ->update();

        return redirect()->to('/home');
    }
}
