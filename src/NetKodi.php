<?php

namespace NetKodi;

use NetKodi\API\NetKodiIPPoolController;
use NetKodi\API\NetKodiNasController;
use NetKodi\API\NetKodiNasTypesController;
use NetKodi\API\NetKodiPlanController;
use NetKodi\API\NetKodiTokenController;
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
     * -------------------------------------------------
     * Generate tokens to be used for as bearer token
     * -------------------------------------------------
     */
    public function getTokens()
    {
        return (new NetKodiTokenController())->index();
    }

    public function createToken(array $data): mixed
    {
        return (new NetKodiTokenController())->store($data);
    }

    public function getToken(int $account)
    {
        return (new NetKodiTokenController())->show($account);
    }

    public function deleteToken(int $account)
    {
        return (new NetKodiTokenController())->delete($account);
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


    /**
     * --------------------------------------------
     * Handle nas devices
     * --------------------------------------------
     */
    public function getAllNas()
    {
        return (new NetKodiNasController())->index();
    }

    public function createNas(array $data): mixed
    {
        return (new NetKodiNasController())->store($data);
    }

    public function getNas(int $id)
    {
        return (new NetKodiNasController())->show($id);
    }

    public function updateNas(array $data, int $id): mixed
    {
        return (new NetKodiNasController())->update($data, $id);
    }

    public function deleteNas(int $id)
    {
        return (new NetKodiNasController())->delete($id);
    }

    /**
     * ----------------------------------
     * Handle Nas Pools Operations
     * ---------------------------------
     */
    public function getPools()
    {
        return (new NetKodiIPPoolController())->index();
    }

    public function getPool(int $id)
    {
        return (new NetKodiIPPoolController())->show($id);
    }

    /**
     * -------------------------------------
     * Handle Bandwidth plans
     * ------------------------------------
     */
    public function getPlans()
    {
        return (new NetKodiPlanController())->index();
    }

    public function createPlan(array $data): mixed
    {
        return (new NetKodiPlanController())->store($data);
    }

    public function getPlan(int $id)
    {
        return (new NetKodiPlanController())->show($id);
    }

    public function updatePlan(array $data, int $id): mixed
    {
        return (new NetKodiPlanController())->update($data, $id);
    }

}
