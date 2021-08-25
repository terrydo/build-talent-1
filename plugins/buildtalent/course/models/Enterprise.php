<?php namespace Buildtalent\Course\Models;

use Model;

/**
 * Model
 */
class Enterprise extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_enterprise';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
