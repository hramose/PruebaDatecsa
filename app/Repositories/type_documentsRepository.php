<?php

namespace App\Repositories;

use App\Models\type_documents;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class type_documentsRepository
 * @package App\Repositories
 * @version March 2, 2018, 5:56 pm UTC
 *
 * @method type_documents findWithoutFail($id, $columns = ['*'])
 * @method type_documents find($id, $columns = ['*'])
 * @method type_documents first($columns = ['*'])
*/
class type_documentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return type_documents::class;
    }
}
