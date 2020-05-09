<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Blood;

/**
 * Class PermissionRepository.
 */
class BloodRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Blood::class;
    }
}
