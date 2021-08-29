<?php

namespace RainLab\Blog\Models;

use Model;

/**
 * Model
 */
class FormDownload extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SimpleTree;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'rainlab_blog_form_downloads';

    /**
     * @var array Validation rules
     */
    public $rules = [];
    protected $fillable = [
        'name',
        'sex',
        'phone',
        'email',
        'company',
        'position',
        'company_size',
        'province',
        'post_id'
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'post' => [Post::class]
    ];

    function getSexAttribute($value)
    {
        return $value == '0' ? 'Nam' : 'Nữ';
    }
}
