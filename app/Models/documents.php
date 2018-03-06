<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class documents
 * @package App\Models
 * @version March 2, 2018, 10:08 pm UTC
 *
 * @property string nombre_archivo
 * @property string ruta_archivo
 * @property integer tipo_documento
 * @property string indice1
 * @property string indice2
 * @property string indice3
 * @property integer user_id
 */
class documents extends Model
{
    use SoftDeletes;

    public $table = 'documents';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_archivo',
        'tipo_documento',
        'indice1',
        'indice2',
        'indice3',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_archivo' => 'string',
        'tipo_documento' => 'integer',
        'indice1' => 'string',
        'indice2' => 'string',
        'indice3' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_archivo' => 'required',
        'ruta_archivo' => 'required|mimes:pdf',
        'tipo_documento' => 'required',
        'indice1' => 'required',
        'indice2' => 'required',
        'indice3' => 'required'
    ];

     /**
     * Get the type_documents for the document.
     */
    public function type_documents()
    {
        return $this->belongsTo('App\Models\type_documents', 'tipo_documento');
    }

    /**
    * Get the user for the document.
    */
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
    * Get the documents according to the filters entered
    */
    public function scopeFiltro($query, $request)
    {
        if($request->input('indice1') != ""){
            $query->orWhere("indice1", "like", "%{$request->input('indice1')}%");
        }

        if($request->input('indice2') != ""){
             $query->orWhere("indice2", "like", "%{$request->input('indice2')}%");
        }

        if($request->input('indice3') != ""){
            $query->orWhere("indice3", "like", "%{$request->input('indice3')}%");
        }

        if($request->input('tipo_documento') != ""){
            $query->orWhere("tipo_documento",$request->input('tipo_documento'));
        }
        return $query;
    }


}
