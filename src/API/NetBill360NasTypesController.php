<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360NasTypesController
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
     * Nas types here
     */
    public function types()
    {
        return $this->client($this->token)
            ->get(netbill360_url('nas', 'types'))
            ->json();
    }
}
