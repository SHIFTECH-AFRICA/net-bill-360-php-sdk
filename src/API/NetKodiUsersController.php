<?php

namespace NetKodi\API;

use NetKodi\Traits\NetKodiAuthType;

class NetKodiUsersController
{
    use NetKodiAuthType;

    /**
     * Constructor: always use Basic Auth
     */
    public function __construct()
    {
        $this->isBasic = true;
    }

    /**
     * Get users
     */
    public function index(): mixed
    {
        return $this->client()
            ->get(netkodi_url('users', 'index'))
            ->json();
    }

    /**
     * Store User
     */
    public function store(array $data): mixed
    {
        return $this->client()
            ->post(netkodi_url('users', 'store'), $data)
            ->json();
    }

    /**
     * Show user
     */
    public function show(int|string $account): mixed
    {
        return $this->client()
            ->get(netkodi_url('users', 'show', ['account' => $account]))
            ->json();
    }

    /**
     * Update User
     */
    public function update(array $data, int|string $account): mixed
    {
        return $this->client()
            ->patch(netkodi_url('users', 'update', ['account' => $account]), $data)
            ->json();
    }

    /**
     * Delete user
     */
    public function delete(int|string $account): mixed
    {
        return $this->client()
            ->delete(netkodi_url('users', 'delete', ['account' => $account]))
            ->json();
    }

    /**
     * Restore user
     */
    public function restore(int|string $account): mixed
    {
        return $this->client()
            ->patch(netkodi_url('users', 'restore', ['account' => $account]))
            ->json();
    }
}
