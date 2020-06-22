<?php
    //Importar configurações de conexão
    require 'dbconfig.php';

    //Abre conexão com mysql
    function DBConnect(){
        $link = @mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE)
        or die(mysqli_connect_error());
        mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
        return $link;
    }

    //Fecha conexão com mysql
    function DBDisconnect($link){
        @mysqli_close($link) or die(mysqli_error($link));
    }

    //Executar querys no banco
    function DBExecute($query){
        $link = DBConnect();
        $result = @mysqli_query($link,$query) or die(mysqli_error($link));
        DBDisconnect($link);
        return $result;
    }

    //Protege contra SQL Injection
    function DBEscape($dados){
        $link = DBConnect();

        if(!is_array($dados)) {
            $dados = mysqli_real_escape_string($link,$dados);
        } else {
            $arr = $dados;

            foreach($arr as $key => $value) {
                $key   = mysqli_real_escape_string($link,$key);
                $value = mysqli_real_escape_string($link,$value);
                $dados[$key] = $value; 
            }
        }
        DBDisconnect($link);
        return $dados;
    }

?>