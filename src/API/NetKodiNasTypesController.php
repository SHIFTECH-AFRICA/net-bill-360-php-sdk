<?php

namespace NetKodi\API;

use NetKodi\Traits\NetKodiAuthType;

class NetKodiNasTypesController
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
     * Nas types here
     */
    public function types()
    {
        return $this->client()
            ->get(netkodi_url('nas', 'types'))
            ->json();
    }
}
