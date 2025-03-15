<?php

namespace App\Services;

use App\Models\User;

class UserService {

    public function __construct(private readonly User $user, private readonly RoleService $roleService) {}

    public function getByUuid($uuid = null){
        return $this->user->with("companies")->where('uuid', $uuid ?? request()->uuid)->firstOrFail();
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
//        dd(request()->all());
        $user = $this->getByUuid($user);
        $item = [
            'name' => request()->name,
            'email' => request()->email,
        ];
        if(request()->has('password')){
            $item['password'] = bcrypt(request()->password);
        }

        if(request()->has('is_admin')){
            $item['is_admin'] = request()->is_admin;
            $user->roles()->detach();
        }else{
            if($user->is_admin){
                $item['is_admin'] = false;
            }
        }

        $user->update($item);

        if (request()->has('roles')) {
            $roles = collect(request()->roles)->map(fn($roleUuid) => $this->roleService->getByUuid($roleUuid)->id);
            $user->roles()->sync($roles);
        }
    }

    public function delete($user){
        $this->getbyUuid($user)->delete();
    }
}
