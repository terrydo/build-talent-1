<?php namespace Buildtalent\Course\Models;

use Model;

/**
 * Model
 */
class Course extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'sections' => Section::class
    ];
}
