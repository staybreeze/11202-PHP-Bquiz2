<?php
date_default_timezone_set("asia/taipei");
session_start();
class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=''";
    protected $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    function a2s($array)
    {
        foreach ($array as $col => $val) {
            $tmp[] = "`$col`='$val'";
        }
        return $tmp;
    }
    function sql_all($sql, $array, $other)
    {
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($array)) {
                $tmp = $this->ass($array);
                $sql .= "where" . join("&&", $tmp);
            } elseif (is_numeric($array)) {
                $sql .= "$array";
            }
            $sql .= $other;
            return $sql;
        }
    }
    function q($sql)
    {return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function all($array='',$other='')
    {
        $sql="select * from `$this->table`";
        $sql=$this->sql_all($sql,$array,$other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETECH_ASSOC);
    }
    function count($array='',$other='')
    {$sql="select count(*) from `$this->table`";
        $sql=$this->sql_all($sql,$array,$other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function find($id)
    {$sql="select * from  `$this->table`";
        if(is_array($id)){
            $tmp=$this->a2s($id);
            $sql.="where".join("&&",$tmp);
        }elseif(is_numeric($id)){
            $sql.="where `id`='$id'";
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function save($array)
    {
        if(isset($array['id'])){
            $sql="update `$this->table` set";
            if(!empty($array)){
                $tmp=$this->a2s($array);
            }
            $sql.=join("&&",$tmp);
            $sql="where `id`='{$array['id']}'";

        }else{
            $sql="insert into from `$this->table`";
            $cols="(`".join("`,`",array_keys($array))."`)";
            $vals="('".join("','",$array)."')";
            $sql=$sql.$cols."values".$vals;
        }
        return $this->pdo->exec($sql);
    }
    function del($id)
    {
        $sql="delete from `$this->table`";
        if(is_array($id)){
            $tmp=$this->a2s($id);
            $sql.="where".join("&&",$tmp);
        }elseif(is_numeric($id)){
            $sql.="where `id`='$id";
        }
        return $this->pdo->exec($sql);
    }
    function math($math,$col,$array='',$other='')
    {$sql="select $math($col) fomr `$this->table`";
        $sql=$this->sql_all($sql,$array,$other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function sum($col='',$array='',$other='')
    {return $this->math('sum',$col,$array,$other);
    }
    function max()
    {
    }
    function mix()
    {
    }
}
function dd()
{
}
function to()
{
}
