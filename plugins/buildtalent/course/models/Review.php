<?php namespace Buildtalent\Course\Models;

use Model;
use RainLab\User\Models\User;

/**
 * Model
 */
class Review extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_reviews';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    protected $fillable = [
        'user_id',
        'course_id',
        'comment',
        'rating',
        'helpful',
    ];

    public $belongsTo = [
        'course' => [Course::class],
        'user' => [User::class],
    ];
}
