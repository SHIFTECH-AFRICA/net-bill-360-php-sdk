<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360TokenController
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
            ->get(netkodi_url('tokens', 'index'))
            ->json();
    }

    /**
     * Create token
     */
    public function store(array $data)
    {
        return $this->client()
            ->post(netkodi_url('tokens', 'store'), $data)
            ->json();
    }

    /**
     * Show token
     */
    public function show(int|string $account): mixed
    {
        return $this->client()
            ->get(netkodi_url('tokens', 'show', ['account' => $account]))
            ->json();
    }

    /**
     * Delete user
     */
    public function delete(int|string $account): mixed
    {
        return $this->client()
            ->delete(netkodi_url('tokens', 'delete', ['account' => $account]))
            ->json();
    }

}
