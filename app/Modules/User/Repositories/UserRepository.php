<?php

namespace App\Modules\User\Repositories;

use App\Models\User;

class UserRepository implements IUserRepository
{
    public function fetchAll()
    {
        return User::all();
    }

    public function fetchById(int $userId)
    {
        return User::with(['orders'])->findOrFail($userId);
    }

    public function store(array $data)
    {
        $user = new User;

        $user->fill($data)->save();

        return $this->fetchById($user->id);
    }

    public function update(array $data, int $userId)
    {
        $user = User::with(['orders'])->findOrFail($userId);

        $user->update($data);

        return $user;
    }

    public function delete(int $userId): void
    {
        User::destroy($userId);
    }
}
