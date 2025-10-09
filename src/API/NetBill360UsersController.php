<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360UsersController
{
    use NetBill360AuthType;

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
            ->get(netbill360_url('users', 'index'))
            ->json();
    }

    /**
     * Store User
     */
    public function store(array $data): mixed
    {
        return $this->client()
            ->post(netbill360_url('users', 'store'), $data)
            ->json();
    }

    /**
     * Show user
     */
    public function show(int|string $account): mixed
    {
        return $this->client()
            ->get(netbill360_url('users', 'show', ['account' => $account]))
            ->json();
    }

    /**
     * Update User
     */
    public function update(array $data, int|string $account): mixed
    {
        return $this->client()
            ->patch(netbill360_url('users', 'update', ['account' => $account]), $data)
            ->json();
    }

    /**
     * Delete user
     */
    public function delete(int|string $account): mixed
    {
        return $this->client()
            ->delete(netbill360_url('users', 'delete', ['account' => $account]))
            ->json();
    }

    /**
     * Restore user
     */
    public function restore(int|string $account): mixed
    {
        return $this->client()
            ->patch(netbill360_url('users', 'restore', ['account' => $account]))
            ->json();
    }
}
