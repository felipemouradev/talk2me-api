<?php
    /**
     * [hashEncrypt pega do $data login e created_at, para montar um hash ]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    function hashEncrypt($data) {

        $time = base64_encode(time()+60*60);
        $login = base64_encode($data['login']);
        $created_at = base64_encode($data['created_at']);
        $hash = base64_encode($time."@".$login."@".$created_at);

        return $hash;
    }

    function hashDecrypt($hash) {
        $st1 = base64_decode($hash);
        $exp = explode("@",$st1);
        if (count($exp)==3){
            $time =
            $login = base64_decode($exp[1]);
            $created_at = base64_decode($exp[2]);

            $data['time'] = base64_decode($exp[0]);
            $data['login'] = base64_decode($exp[1]);
            $data['created_at'] = base64_decode($exp[2]);

            return $data;
        }
        return false;
    }


?>
