<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function _remap()
    {
        $content = empty($this->user)
            ? 'Hello guest'
            : "Hello тебе {$this->user->email}!";

        return $this->templateMain([
            'content' => $content,
        ]);
    }
}
