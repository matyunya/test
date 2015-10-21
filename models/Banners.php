<?php

namespace app\models;

class Banners extends \yii\base\Object
{
    public $name;
    public $count;

    private $countRemains;
    private $file;

    public $config = [
        'superbanner' => 100,
        'superbanner2' => 200,
        'superbanner3' => 300
    ];

    public function get($name, $count)
    {
        if (!in_array($name, array_keys($this->config))) {
            throw new \Exception("Template is not found");
        }

        $this->name = $name;
        $this->file = file_get_contents(__dir__.'/banners/'.$name.'.php');
        $this->count = $this->getCount($count);
        $this->config[$this->name] -= $this->count;

        //echo $this->count;
        
        for ($i = 0; $i < $this->count; $i++) {
            echo $this->file;
        }
        
    }

    private function getCount($count)
    {
        $remains = $this->config[$this->name];

        if ($count >= $remains && is_int($count)) {
            throw new \Exception("Trying to display too many banners");
        }

        if (!strpos($count, '%')) {
            return $count;
        }

        $percent = intval($count);

        return intval($remains*$percent/100);
    }
}
