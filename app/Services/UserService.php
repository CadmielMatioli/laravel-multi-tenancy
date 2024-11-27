<?php

namespace App\Services;

use App\Models\User;

class UserService {

    public function __construct(private readonly User $user) {}

    public function getByUuid($uuid = null){
        return $this->user->where('uuid', $uuid ?? request()->uuid)->firstOrFail();
    }

    public function get(){
        $users = $this->user
            ->where('id', '!=', auth()->user()->id)
            ->whereHas('companies', fn($query) => $query->when(auth()->user()->currentCompany(), fn($query) => $query->where('company_id', auth()->user()->currentCompany()->id)))
            ->when(request()->name, fn($query) => $query->where('name', 'like', '%' . request()->name . '%'));
        return $users->paginate(config('pagination.per_page'));
    }

    public function create() {
       $data = [
            'name' => request()->name,
            'email' => request()->email,
        ];
        if (request()->password) {
            $data['password'] = bcrypt(request()->password);
        }

        return $this->user->create($data);
    }

    public function update($user): void {
        $user = $this->getByUuid($user);
        $user->update([
            'name' => request()->name,
            'email' => request()->email,
            'password' => request()->password,
        ]);
    }

    public function delete($user){
        $this->getbyUuid($user)->delete();
    }
}
