<?php namespace RainLab\Blog\Models;

use Illuminate\Http\Request;
use Model;

/**
 * Model
 */
class FormDownload extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'rainlab_blog_form_downloads';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    protected $fillable = [
        'name',
        'sex',
        'phone',
        'email',
        'company',
        'position',
        'company_size',
        'province',
    ];
}
