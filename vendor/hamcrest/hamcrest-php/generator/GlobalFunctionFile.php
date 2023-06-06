<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

class GlobalFunctionFile extends FactoryFile
{
    /**
     * @var string containing function definitions
     */
    private $functions;

    public function __construct($file)
    {
        parent::__construct($file, '    ');
        $this->functions = '';
    }

    public function addCall(FactoryCall $call)
    {
<<<<<<< HEAD
        $this->functions .= "\n" . $this->generateFactoryCall($call);
=======
        $this->functions .= PHP_EOL . $this->generateFactoryCall($call);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function build()
    {
        $this->addFileHeader();
        $this->addPart('functions_imports');
        $this->addPart('functions_header');
        $this->addCode($this->functions);
        $this->addPart('functions_footer');
    }

    public function generateFactoryCall(FactoryCall $call)
    {
<<<<<<< HEAD
        $code = "if (!function_exists('{$call->getName()}')) {\n";
=======
        $code = "if (!function_exists('{$call->getName()}')) {";
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $code.= parent::generateFactoryCall($call);
        $code.= "}\n";

        return $code;
    }
}
