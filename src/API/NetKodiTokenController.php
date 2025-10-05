<?php

namespace NetKodi\API;

use NetKodi\Traits\NetKodiAuthType;

class NetKodiTokenController
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
     * Create token
     */
    public function store(array $data)
    {
        return $this->client()
            ->post(netkodi_url('users', 'store'), $data)
            ->json();
    }

    /**
     * Show token
     */
    public function show(int|string $account): mixed
    {
        return $this->client()
            ->get(netkodi_url('users', 'show', ['account' => $account]))
            ->json();
    }

}
