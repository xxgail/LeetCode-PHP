<?php

/**
 * Class EightQueue
 * 八皇后
 */
class EightQueue{
    public $res = [];

    function __construct($res)
    {
        $this->res = $res;
    }

    function CalEightQueue($row){
        if($row == 8){
            print_r($this->res);
            $this->PrintQueue();
            return;
        }

        for ($column = 0; $column < 8; $column++){
            if ($this->IsOk($row,$column)){
                $this->res[$row] = $column;
                $this->CalEightQueue($row+1);
            }
        }
    }

    function IsOk($row,$column){
        $left = $column - 1;
        $right = $column + 1;

        for ($i = $row - 1; $i >= 0; $i--){
            if($this->res[$i] == $column){
                return false;
            }

            if($left >= 0 && $this->res[$i] == $left){
                return false;
            }

            if($right < 8 && $this->res[$i] == $right){
                return false;
            }

            $left --;
            $right ++;
        }
        return true;
    }

    function PrintQueue(){
        for ($row = 0; $row < 8; $row++){
            for ($column = 0; $column < 8; $column++){
                if($this->res[$row] == $column){
                    print_r(' Q ');
                }else{
                    print_r(' * ');
                }
            }
            echo "\r\n";
//            echo PHP_EOL;
            # 两种换行
        }
    }
}