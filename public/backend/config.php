<?php
class Config
{
    private $dir;
    private $val = array();

    function __construct($dir){
        $this->dir = $dir;
        self::getConfig();
    }

    // Public Properties
    public function getValue(){
        return $this->val;
    }

    // Private Properties
    private function getConfig(){
        try {
            $fh = fopen($this->dir, 'r');
            $ctr = 0;
            while ($line = fgets($fh)) {
                $this->val[$ctr] = $line;
                $ctr++;
            }
            fclose($fh);
        } catch (Exception $th) {
            return 501;
        }
    }
}
