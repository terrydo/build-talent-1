<?php namespace Buildtalent\Course\Models;

use Model;

/**
 * Model
 */
class Expert extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_expert';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
