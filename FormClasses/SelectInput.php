<?php

// namespace FormClasses;

class SelectInput extends FormInput
{
    protected string $id;
    protected string $label;
    protected array $options;

    public function __construct($id, $label, $options)
    {
        parent::__construct($id, $label);
        $this->options = $options;
    }

    private function optionStringGenerator()
    {
        $optionList = [];
        foreach ($this->options as $option) {
            $optionList[] = sprintf('<option value="%s">%s</option>', $option, ucwords($option));
        }
        return implode($optionList);
    }

    public function generate(): string
    {
        return sprintf('
        <div class="selectGroup">
            <label for="%s">%s</label>
            <select id="%s" name="%s">
                %s
            </select>
        </div>', $this->id, $this->label, $this->id, $this->id, $this->optionStringGenerator());
    }
}