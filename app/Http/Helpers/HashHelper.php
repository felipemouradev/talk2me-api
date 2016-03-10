<?php

    function hashEncrypt($data) {

        $time = base64_encode(time()+60*60);
        $id = base64_encode($data['id']);
        $login = base64_encode($data['login']);
        $created_at = base64_encode($data['created_at']);
        $hash = base64_encode($time."@".$id."@".$login."@".$created_at);

        return $hash;
    }

    function hashDecrypt($hash) {
        $st1 = base64_decode($hash);
        $exp = explode("@",$st1);
        
        if (count($exp)==4){
            $time = base64_decode($exp[0]);
            $id = base64_decode($exp[1]);
            $login = base64_decode($exp[2]);
            $created_at = base64_decode($exp[3]);

            $data['time'] = $time;
            $data['id'] = $id;
            $data['login'] = $login;
            $data['created_at'] = $created_at;

            return $data;
        }
        return false;
    }


?>
