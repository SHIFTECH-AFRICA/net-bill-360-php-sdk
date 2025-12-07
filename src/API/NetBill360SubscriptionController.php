<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360SubscriptionController
{
    use NetBill360AuthType;

    /**
     * Constructor: always use Bearer Auth
     */
    public function __construct(?string $token = null)
    {
        $this->token = $token;
    }

    /**
     * Get subscriptions
     */
    public function index(): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('subscriptions', 'index'))
            ->json();
    }

    /**
     * Store subscriptions
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netbill360_url('subscriptions', 'store'), $data)
            ->json();
    }

    /**
     * Show subscriptions
     */
    public function show(string $username): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('subscriptions', 'show', ['username' => $username]))
            ->json();
    }

    /**
     * Update subscriptions
     */
    public function update(array $data): mixed
    {
        return $this->client($this->token)
            ->patch(netbill360_url('subscriptions', 'update'), $data)
            ->json();
    }

    /**
     * Delete subscriptions
     */
    public function delete(string $username): mixed
    {
        return $this->client($this->token)
            ->delete(netbill360_url('subscriptions', 'delete', ['username' => $username]))
            ->json();
    }

}
