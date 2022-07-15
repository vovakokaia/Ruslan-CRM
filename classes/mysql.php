<?php
function connect($operation,$mode = 0, $file = '', $line = '') {
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DB_TABLE);

    $message = $operation;

    if($file) $message = $operation . '<br>IN FILE - ('.$file.')';
    if($line) $message .= ' AT LINE : '.$line . '<br><br>';

    if($mode) echo $message;

    return mysqli_query($conn, $operation);
}
    
function insert($table,
                $fields = '',
                $fields_values = '',
                $mode = 0,
                $file = '',
                $line = '') {

    $operation = "INSERT INTO ".$table." (".$fields.") VALUES ('".$fields_values."')";
    
    return connect($operation, $mode, $file, $line);
}
    
function update($table,
                $fields_and_values,
                $condition = '',
                $mode = 0,
                $file = '',
                $line = '') {

    if($condition) {
        $condition = "WHERE ".$condition;
    }
    
    $operation = "UPDATE ".$table." SET ".$fields_and_values." ".$condition;

    $result = connect($operation, $mode, $file, $line);
    return $result;
}
    
function select($table,
                $condition = '',
                $mode = 0,
                $file = '',
                $line = '',
                $sorting = '',
                $fields = '*',
                $limit = '') {
                    
    if($condition) {
        $condition = "WHERE ".$condition;
    }
    
    if($sorting) {
        $sorting = "ORDER BY ".$sorting;
    }
    
    if($limit) {
        $limit = "LIMIT ".$limit;
    }
    
    $operation = "SELECT ".$fields." FROM ".$table." ".$condition." ".$sorting." ".$limit;
    
    $result = connect($operation, $mode, $file, $line);
    
    $query_array = array();

    if($result) {
        while($rows = $result -> fetch_assoc()) {
            $query_array[] = $rows;
        }
    } else {
        echo 'Select problem:<br>
            table: '.$table.'<br>
            fields: '.$fields.'<br>
            condition: '.$condition.'<br>
            limit: '.$limit.'<br>
            File - ('.$file.')<br>
            Line - ('.$line.')<br>';
    }
    
    return $query_array;
}
    
function select_one($table,
                    $condition = '',
                    $mode = 0,
                    $file = '',
                    $line = '',
                    $fields = '*') {

    if($condition) {
        $condition = "WHERE ".$condition;
    }
    
    $limit = "LIMIT 1";
    
    $operation = "SELECT ".$fields." FROM ".$table." ".$condition." ".$limit;
    
    $result = connect($operation, $mode, $file, $line);
    $row = false;
    
    if($result) {
        $row = $result -> fetch_assoc();
    } else {
        echo 'Select one problem:<br>
              table: '.$table.'<br>
              fields: '.$fields.'<br>
              condition: '.$condition.'<br>
              limit: '.$limit.'<br>
              File - ('.$file.')<br>
              Line - ('.$line.')<br>';
    }

    return $row;
}

function delete($table,
                $condition,
                $mode = 0,
                $file = '',
                $line = '') {
		
    $operation = "DELETE FROM ".$table." WHERE ".$condition;
    $result =  connect($operation, $mode, $file, $line);

    return $result;
}

function get_max($max,
                 $table,
                 $condition = '') {

    $result = select($table,$condition,'','MAX('.$max.') AS '.$max.'');

    return $result[0]["'".$max."'"];
}

function get_min($min,
                 $table,
                 $condition = '') {

    $result = select($table,$condition,'','MIN('.$min.') AS '.$min.'');

    return $result[0]["'".$min."'"];
}

function alter_table($name,
                     $column_name,
                     $column_type,
                     $column_length,
                     $mode = 0,
                     $file = '',
                     $line = '') {

    return connect("ALTER TABLE ".$name." ADD ".$column_name." ".$column_type."(".$column_length.")", $mode, $file, $line);
}

function delete_column($db_table,
                       $column_name,
                       $mode = 0,
                       $file = '',
                       $line = '') {

    return connect("ALTER TABLE ".$db_table." DROP ".$column_name, $mode, $file, $line);
}

function delete_table($table,
                      $step = 0,
                      $mode = 0,
                      $file = '',
                      $line = '') {

    if($step == 0) {
        $operation = "DROP TABLE ".$table;
        
        $result =  connect($operation, $mode);
    } else {
        for($k = 0; $k <= $step;$k++) {
            $operation = "DROP TABLE ".$table.'_step_'.$k;

            $result = connect($operation, $mode, $file, $line);
        }
    }

    return $result;
}