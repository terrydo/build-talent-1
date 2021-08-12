<?php namespace Buildtalent\Course\Models;

use Model;

/**
 * Model
 */
class Tag extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_tags';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

//    public $belongsToMany = [
//        'tags' => Course::class,
//        'table' => 'buildtalent_course_tag_user',
//        'key'      => 'tag_id',
//        'otherKey' => 'user_id'
//    ];
}
