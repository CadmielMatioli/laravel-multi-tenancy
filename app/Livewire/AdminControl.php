<?php

namespace App\Livewire;

use Livewire\Component;

class AdminControl extends Component
{
    public $adminGeneral;
    public $user;

    public function updatedAdminGeneral($value) {
        $this->dispatch('toggle-admin-general', value: $value);
    }

    public function render() {
        return view('livewire.admin-control');
    }
}
