<?php

namespace App\Modules\User\Repositories;

interface IUserRepository
{
    public function fetchAll();

    public function fetchById(int $userId);

    public function store(array $data);

    public function update(array $data, int $userId);

    public function delete(int $userId): void;
}
