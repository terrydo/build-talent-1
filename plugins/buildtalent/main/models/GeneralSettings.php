<?php

namespace Buildtalent\Main\Models;

use Model;

/**
 * Model
 */
class GeneralSettings extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    protected $jsonable = ['general', 'home', 'aboutus'];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'buildtalent_main_general_settings';

    /**
     * @var array Validation rules
     */
    public $rules = [];
}
