<?php namespace Buildtalent\Course\Models;

use Model;

/**
 * Model
 */
class Lesson extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_lessons';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'video' => 'System\Models\File'
    ];

    public $belongsTo = [
        'section' => Section::class
    ];
}
