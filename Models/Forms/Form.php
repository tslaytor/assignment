<?php

require_once 'FormInputWrap.php';

class Form
{
    public array $inputList;

    public function addInput(FormInput|FormInputWrap $input): void
    {
        $this->inputList[] = $input;
    }

    public function generate(string $id, string $method): string
    {
        $generatedContent = [];

        foreach ($this->inputList as $input) {
            $generatedContent[] = $input->generate();
        }
        return sprintf('<form id="%s" method="%s" action="">%s</form>', $id, $method, implode($generatedContent));
    }
}