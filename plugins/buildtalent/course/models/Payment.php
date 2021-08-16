<?php

namespace Buildtalent\Course\Models;

use Model;
use RainLab\User\Models\User;

/**
 * Model
 */
class Payment extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_course_course_user';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $belongsTo = [
        'course' => [Course::class],
        'user' => [User::class],
    ];

    public function getPaymentMethodAttribute($value)
    {
        switch ($value) {
            case 'direct_payment':
                return 'Chuyển khoản';
                break;
            default:
                return 'Không rõ';
        }
    }

    public function getPaymentStatusAttribute($value)
    {
        if ($value == 0) return 'Chưa thanh toán';
        return 'Đã thanh toán';
    }
}
