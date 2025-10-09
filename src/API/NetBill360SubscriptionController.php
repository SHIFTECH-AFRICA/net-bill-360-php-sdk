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
            ->get(netkodi_url('subscriptions', 'index'))
            ->json();
    }

    /**
     * Store subscriptions
     */
    public function store(array $data): mixed
    {
        return $this->client($this->token)
            ->post(netkodi_url('subscriptions', 'store'), $data)
            ->json();
    }

    /**
     * Show subscriptions
     */
    public function show(string $username): mixed
    {
        return $this->client($this->token)
            ->get(netkodi_url('subscriptions', 'show', ['username' => $username]))
            ->json();
    }

    /**
     * Update subscriptions
     */
    public function update(array $data): mixed
    {
        return $this->client($this->token)
            ->patch(netkodi_url('subscriptions', 'update'), $data)
            ->json();
    }

}
