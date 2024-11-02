<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component {
    public $title;
    public $message;
    public $actionUrl;
    public $name;

    public function __construct($title, $message, $actionUrl, $name)
    {
        $this->title = $title;
        $this->message = $message;
        $this->actionUrl = $actionUrl;
        $this->name = $name;
    }

    public function render() {
        return view('components.modal');
    }
}
