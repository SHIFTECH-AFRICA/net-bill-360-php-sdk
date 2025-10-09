<?php

namespace NetBill360\API;

use NetBill360\Traits\NetBill360AuthType;

class NetBill360NasTypesController
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
     * Nas types here
     */
    public function types()
    {
        return $this->client()
            ->get(netbill360_url('nas', 'types'))
            ->json();
    }
}
