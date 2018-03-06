<?php

namespace App\Repositories;

use App\Models\documents;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class documentsRepository
 * @package App\Repositories
 * @version March 2, 2018, 10:08 pm UTC
 *
 * @method documents findWithoutFail($id, $columns = ['*'])
 * @method documents find($id, $columns = ['*'])
 * @method documents first($columns = ['*'])
*/
class documentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_archivo',
        'tipo_documento',
        'indice1',
        'indice2',
        'indice3',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return documents::class;
    }
}
