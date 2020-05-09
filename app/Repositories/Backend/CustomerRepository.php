<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Customer;

/**
 * Class PermissionRepository.
 */
class CustomerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }
}
