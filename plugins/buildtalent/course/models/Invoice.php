<?php namespace Buildtalent\Course\Models;

use Model;

/**
 * Model
 */
class Invoice extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_invoice';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getStatusAttribute($value)
    {
        return 'aaa' . $value;
    }
}
