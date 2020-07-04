<?php

class Ofuscation {

    private $loop = 0;

    private function encode($string, $type = "encode") {
        
        $final = '';
        $new_string = str_split($string);
       
        foreach ($new_string as $letter) {

            $current = ord($letter);
            if($type == "encode") {
                $string = $current + $this->loop;
            } else {
                $string = ($current + ($this->loop * -1));
            }
    
            $current = $string;
            $final .= chr($current);
        }
    
        return $final;
    }

    private function toGz($string, $tipo) {
        if ($tipo == "encode") {
            return gzencode($string);
        } else {
            return gzdecode($string);
        }
    }

    private function validateKey($key) {
        $return = false;
        $separa = explode(":", $key);
        if(is_array($separa)) {
            if(isset($separa[1])) {
                if(md5($separa[1]) == $separa[0]) {
                    $this->loop = $separa[1];
                    $return = true;
                }
            }
        }
        return $return;
    }

    public function getKey() {
        $rand = mt_rand(5, 120);
        return md5($rand) . ":" . $rand;
    }

    public function setKey($key) {
        if($this->validateKey($key)) {
            $this->loop = mt_rand(1, 4);
        } else {
            echo "A chave informada é inválida.";
        }
    }

    public function hash($string) {
        return base64_encode($this->toGz($this->encode($string), "encode"));
    }

    public function unhash($string) {
        $string = explode(":", $this->toGz(base64_decode($string), "decode"));
        return $this->encode($string[0], "decode");
    }

}

?>
