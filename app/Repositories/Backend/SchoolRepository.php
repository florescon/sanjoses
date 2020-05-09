<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\School;

/**
 * Class PermissionRepository.
 */
class SchoolRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return School::class;
    }
}
