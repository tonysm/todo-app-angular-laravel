<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 08/12/14
 * Time: 14:46
 */

namespace App\Exceptions;


use Illuminate\Contracts\Validation\Validator;

class ValidationFailedException extends \InvalidArgumentException {
    /**
     * @var \Illuminate\Contracts\Validation\Validator
     */
    private $validator;

    function __construct(Validator $validator)
    {
        parent::__construct("Invalid arguments");
        $this->validator = $validator;
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }
} 