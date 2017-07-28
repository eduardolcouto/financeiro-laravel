<?php

namespace Finlaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Finlaravel\Repositories\BankRepository;
use Finlaravel\Models\Bank;
use Finlaravel\Validators\BankValidator;

/**
 * Class BankRepositoryEloquent
 * @package namespace Finlaravel\Repositories;
 */
class BankRepositoryEloquent extends BaseRepository implements BankRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bank::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
