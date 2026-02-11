<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360FairUsagePolicyController
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
     * Get Data Usage for customer
     */
    public function dataUsage(array $data): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('fup', 'data-usage'), $data)
            ->json();
    }

    /**
     * Get Time Usage for customer
     */
    public function timeUsage(array $data): mixed
    {
        return $this->client($this->token)
            ->get(netbill360_url('fup', 'time-usage'), $data)
            ->json();
    }

}
