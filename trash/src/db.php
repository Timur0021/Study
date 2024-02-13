<?php
session_start();
require ('connect.php');

function test($value){
    echo '<pre>';
    print_r ($value);
    echo '<pre>';
    exit();
}

// Перевірка до бази данних
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
// Запит на отримання данних з одної таблиці
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}

// Запит на отримання одного рядка з вибраної таблиці
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();

}
// Запис в таблицю бази данних

function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value){
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" ."$value"."'";
        }else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value"."'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}
// Оновлення рядка в таблиці

function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value){
        if ($i === 0){
            $str = $str . $key . " = '" . $value ."'";
        }else{
            $str = $str .", " . $key . " = '" . $value ."'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}


// Видалення рядка в таблиці

function delete($table, $id){
    global $pdo;
    $sql = "DELETE FROM $table WHERE id = $id ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Видалення рядка в таблиці

function del($table, $id){
    global $pdo;
    $sql = "DELETE FROM $table WHERE id =" . $id ;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

//Вибірка постів з автором в адмін панель
function selectAllFromPost($table1, $table2){
    global $pdo;

    $sql = "
	SELECT 
    t1.id,
	t1.title,
	t1.img,
	t1.content,
	t1.status,
	t1.id_topic,
	t1.created_date,
	t2.username
	
	FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Виборка поста з автором на головну сторінку сайту

function selectAllFromPostOnIndex($table1, $table2){
    global $pdo;

    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Виборка поста в слайдер шоу

function selectTopFromPostOnIndex($table1){
    global $pdo;

    $sql = "SELECT * FROM $table1 WHERE id_topic = 9";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//Пошук по заголовкам і вмісту

function searchInTitle($term, $table1, $table2){
    $term = trim(strip_tags(stripcslashes(htmlspecialchars($term))));
    global $pdo;

    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1 AND p.title LIKE '%$term%' OR p.content LIKE '%$term%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//Виборка одного поста з автором для blog.php

function selectPostFromWithUserOnBlog($table1, $table2, $id){
    global $pdo;

    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}