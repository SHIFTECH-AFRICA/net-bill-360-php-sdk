<?php

namespace NetKodi;

use NetKodi\API\NetKodiNasTypesController;
use NetKodi\API\NetKodiUsersController;

class NetKodi
{
    /**
     * ---------------------------------------
     * Handle all that relates to users
     * --------------------------------------
     */
    public function getUsers(): mixed
    {
        return (new NetKodiUsersController())->index();
    }

    public function createUser(array $data): mixed
    {
        return (new NetKodiUsersController())->store($data);
    }

    public function getUser(int $account)
    {
        return (new NetKodiUsersController())->show($account);
    }

    public function updateUser(array $data, int $account): mixed
    {
        return (new NetKodiUsersController())->update($data, $account);
    }

    public function deleteUser(int $account)
    {
        return (new NetKodiUsersController())->delete($account);
    }

    public function restoreUser(int $account)
    {
        return (new NetKodiUsersController())->restore($account);
    }


    /**
     * ----------------------------------------------
     * Handle all that relates to nas
     * ----------------------------------------------
     */
    public function nasTypes()
    {
        return (new NetKodiNasTypesController())->types();
    }
}
