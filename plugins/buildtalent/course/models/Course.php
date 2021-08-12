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
    protected $jsonable = ['reward'];

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

    public $belongsTo = [
        'category' => Category::class
    ];

    public $belongsToMany = [
        'tags' => [
            Tag::class,
            'table' => 'buildtalent_course_tag_user',
            'key'      => 'user_id',
            'otherKey' => 'tag_id'
        ],
    ];
}
