<?php namespace Buildtalent\Course\Models;

use Model;
use RainLab\User\Models\User;

/**
 * Model
 */
class Payment extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_course_user';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasOne = [
        'user' => [User::class, 'key' => 'id'],
        'course' => [Course::class, 'key' => 'id'],
        'invoice' => [Invoice::class, 'key' => 'id'],
    ];
}
