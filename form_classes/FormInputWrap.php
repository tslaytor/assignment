<?php  

class FormInputWrap
{
    private string $cssClass;
    private string $instruction = '';
    private array $content;

    public function __construct(string $cssClass, string $instruction = '')
    {
        $this->cssClass = $cssClass;
        if($instruction){
            $this->instruction = '<div class="instruction">' . $instruction . '</div>';
        }
    }
    
    public function InputElements(array $elements): void
    { 
        foreach($elements as $element){
            $this->content[] = $element->generate();
        }
    }

    public function generate(): string
    {
        return sprintf('<div class="%s">
                            %s
                            %s
                        </div>', $this->cssClass, implode($this->content), $this->instruction);
    }
}
