<?php
    //funções de CRUD do banco de dados

    //importar funções de conexão com banco
    require 'connection.php';

    //gravar registros do banco
    function DBCreate($table,$data){
        $data = DBEscape($data);
        $fields = implode(', ',array_keys($data));
        $values = "'".implode("', '",array_values($data))."'";
        $query = "INSERT INTO {$table}(${fields}) VALUES ({$values})";
        return DBExecute($query);

    }

    //ler registros do banco
    function DBRead($table,$params=null,$fields='*'){
        $query = "select {$fields} from {$table} {$params}";
        $result = DBExecute($query);
        if(!mysqli_num_rows($result)){
            return 'false';
        } else {
            while($res = mysqli_fetch_assoc($result)) {
                $data[] = $res;
            }
            return $data;
        }
    }

    //alterar registros do banco
    function DBUpdate($table,array $data,$condition=null){
        foreach ($data as $key => $value){
            $fields[] = "{$key} = '{$value}'";
        }
        $fields = implode(', ',$fields);
        $condition = ($condition) ? "WHERE {$condition}" : null;

        $query = "UPDATE {$table} SET {$fields} {$condition}";
        return DBExecute($query);
    }

    //deletar registros do banco
    function DBDelete($table,$condition=null){
        $condition = ($condition) ? "WHERE {$condition}" : null;
        $query = "DELETE FROM {$table} {$condition}";
        return DBExecute($query);
    }

?>