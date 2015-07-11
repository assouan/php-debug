<?php namespace Test;

class Timer
{
    protected $time;
    protected $label;
    protected $list = array();

    public function __construct($label = 'first', $timestart = null)
    {
        $this->time = ($timestart) ? $timestart : microtime(true);
        $this->label= $label;
    }

    public function time($label)
    {
        $time = microtime(true);
        $this->list[] = array(
            'label' => $label,
            'time' => ( $time - $this->time )
        );
        $this->time = $time;
    }

    public function show()
    {
        $this->time('end');

        foreach ($this->list as $elem)
        {
            echo $elem['label'].' ('.$elem['time'].' secondes)'.PHP_EOL;
        }
    }
}