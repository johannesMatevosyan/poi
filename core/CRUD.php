<?php
include_once 'core/config.php';

class CRUD {

	private $table;
	protected static $_instance;
    public function __construct($table = null)
    {
		$this->table = $table;
		if(self::$_instance === null)		
        self::$_instance = new PDO(Config::DSN,Config::DB_USERNAME,Config::DB_PASSWORD);
    }
	//create
	public function create($arr)
    {
        $query ='INSERT '.$this->table;
            // implode keys of $array...
        $query .= " (`".implode("`, `", array_keys($arr))."`)";
            // implode values of $array...
        $query .= " VALUES ('".implode("', '", $arr)."') ";
        self::$_instance->exec($query);
	}
	//read
	public function find($id)
    {
        $string = "";
        if(is_array($id)) {
            foreach($id as $key => $value)
            {
                $string.='&& '.$key."='".$value."' ";
            }
            $string = substr($string, 2,-1);
            $query ='SELECT * FROM '.$this->table.' WHERE '.$string;
        }
        else
        {
            $query ='SELECT * FROM '.$this->table.' WHERE id ='.$id;
        }

	    return self::$_instance->query($query);
	}
	//update
	public function update($arr,$id)
    {
        $string = "";
        foreach($arr as $key => $value)
        {
            $string.=', '.$key."='".htmlspecialchars($value, ENT_QUOTES)."' ";
        }
        $string = substr($string, 2, -1);
        $query ="UPDATE {$this->table} SET {$string} WHERE id ={$id}";
        echo "<br/>";
        self::$_instance->exec($query);
	}
	//delete
	public function delete($id)
    {
    	$query ="DELETE FROM {$this->table} WHERE id ={$id}";
    	self::$_instance->exec($query);
	}
	//replace
	public function replace($arr)
    {
        $query ='REPLACE INTO  '.$this->table;
        // implode keys of $array...
        $query .= " (`".implode("`, `", array_keys($arr))."`)";
        // implode values of $array...
        $query .= " VALUES ('".implode("', '", $arr)."') ";
        //echo $query;
        return self::$_instance->query($query);
	}
	//read all 
	public function findAll()
    {
        $query ='SELECT * FROM '.$this->table;
        return self::$_instance->query($query);
	}
	public function __call($name, $arguments)
    {
	    return call_user_func_array(array(self::$_instance, $name), $arguments);
    }
}