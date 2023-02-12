<?php

// namespace FormClasses;

require_once 'TypedInput.php';
require_once 'SelectInput.php';
require_once 'FormInputWrap.php';

// use \FormClasses\TypedInput;
// use \FormClasses\SelectInput;
// use \FormClasses\FormInputWrap;

class Form
{
    public array $inputList;

    public function addInput(FormInput|FormInputWrap $input): void
    {
        $this->inputList[] = $input;
    }

    public function display(string $id, string $method): string
    {
        $generatedContent = [];

        foreach ($this->inputList as $input) {
            $generatedContent[] = $input->generate();
        }
        return sprintf('<form id="%s" method="%s" action="">%s</form>', $id, $method, implode($generatedContent));
    }
}