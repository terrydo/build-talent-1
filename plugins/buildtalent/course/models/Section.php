<?php

namespace Buildtalent\Course\Models;

use Model;

/**
 * Model
 */
class Section extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    protected $jsonable = ['documents'];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_sections';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $belongsTo = [
        'course' => Course::class,
    ];

    public $hasMany = [
        'lessons' => Lesson::class,
    ];
}
