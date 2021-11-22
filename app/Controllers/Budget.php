<?php

namespace App\Controllers;

class Budget extends BaseController
{
    public function _remap()
    {
		if (!$this->user) return redirect()->to('/home');

        $data = [
            'accounts' => $this->getAccounts(),
        ];
        $content = view('budget/board_view', $data);

        return $this->templateMain([
            'fluid' => true,
            'content' => $content,
        ]);
    }

    protected function getAccounts() {
        return $this->db->table('accounts')
          ->get()
          ->getResult();
    }
}
