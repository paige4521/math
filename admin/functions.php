 <?php
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    
    require_once($_SERVER['DOCUMENT_ROOT'].DS.'work'.DS.'neely'.DS.'admin'.DS.'session'.DS.'session.php');
    $data = Session::getInstance();
    
    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }

    $min = isset($data->minVal)? $data->minVal : 2;
    $max = isset($data->maxVal)? $data->maxVal : 10;

    function genNumber(){
        $res = array();
        GLOBAL $min, $max;
        for($i = 0; $i < 20; ++$i){
            $res[$i]['first'] = rand($min,$max);
            $res[$i]['second'] = rand($min,$max);
            $res[$i]['res'] = $res[$i]['first'] + $res[$i]['second'];
        }
        return $res;
    }
    function genSubNumber(){
        $res = array();
        GLOBAL $min, $max;
        for($i = 0; $i < 20; ++$i){
            $res[$i]['first'] = rand(($max / 2),$max);
            $res[$i]['second'] = rand($min,($max / 2));
            $res[$i]['res'] = $res[$i]['first'] - $res[$i]['second'];
        }
        return $res;
    }
    function genMulNumber(){
        $res = array();
        GLOBAL $min, $max;
        for($i = 0; $i < 20; ++$i){
            $res[$i]['first'] = rand($min,$max);
            $res[$i]['second'] = rand($min,$max);
            $res[$i]['res'] = $res[$i]['first'] * $res[$i]['second'];
        }
        return $res;
    }
    function genDivNumber(){
        $res = array();
        GLOBAL $min, $max;
        for($i = 0; $i < 20; ++$i){
            $res[$i]['res'] = rand($min,$max);
            $res[$i]['second'] = rand($min,$max);
            $res[$i]['first'] = $res[$i]['res'] * $res[$i]['second'];
        }
        return $res;
    }