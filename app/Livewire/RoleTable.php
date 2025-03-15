<?php

namespace App\Livewire;

use App\Services\RoleService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
class RoleTable extends Component
{
    use WithPagination;

    public $loading = false;
    public $selectAll;
    public $selectedItems = [];
    public $user;
    public $perPage;
    public $refreshKey;
    public $adminGeneral;
    public $isProcessing = false;

    public function __construct() {
        $this->perPage = config('pagination.per_page');
    }

    public function toggleItem($uuid)
    {
        if (in_array($uuid, $this->selectedItems)) {
            $this->selectedItems = array_diff($this->selectedItems, [$uuid]);
        } else {
            $this->selectedItems[] = $uuid;
        }
    }
    public function getRolesProperty(): LengthAwarePaginator {
        $service = new RoleService();
        return $service->getUserUpdate($this->user)->paginate($this->perPage);
    }

    public function checkSelectAll(): bool {
        $this->refreshKey = now()->timestamp;
        $currentPageUuids = collect($this->roles->items())->pluck('uuid')->toArray();
        return count(array_intersect($this->selectedItems, $currentPageUuids)) === count($currentPageUuids);
    }

    public function toggleSelectAll(): void {
        $currentPageUuids = collect($this->roles->items())->pluck('uuid')->toArray();
        if ($this->checkSelectAll()) {
            $this->selectedItems = array_diff($this->selectedItems, $currentPageUuids);
        } else {
            $this->selectedItems = array_unique(array_merge($this->selectedItems, $currentPageUuids));
        }
    }

    public function updatedPerPage($value): void {
        $this->perPage = $value;
        $this->filterSelectedItems();
        $this->resetPage();
    }

    public function filterSelectedItems(): void {
        $currentPageUuids = collect($this->roles->items())->pluck('uuid')->toArray();
        $this->selectedItems = array_intersect($this->selectedItems, $currentPageUuids);
    }

    #[On('toggle-admin-general')]
    public function updatedAdminGeneral($value) {
        $this->adminGeneral = $value;
    }

    public function render() {
        $this->selectAll = $this->checkSelectAll();
        return view('livewire.role-table', [
            'user' => $this->user,
            'roles' => $this->roles
        ]);
    }
}
