<?php

class db
{

	var $sql_result;
	var $sql_connect;
	var $num_queries = 0;
	
	var $app_name = "dbClass";
	
	function db() { }
	
	function connect($db_host, $db_user, $db_pass, $db_database)
	{
		$this->sql_connect = @mysql_connect($db_host, $db_user, $db_pass);
		
		if ($this->sql_connect)
		{
			if(@mysql_select_db($db_database, $this->sql_connect))
				return $this->sql_connect;
			else
				die("Unable to select database");
		}
		else
		{
			die("Unable to connect to MySQL server");
		}
	}
	
	function query($sql)
	{
		$this->sql_result = @mysql_query($sql, $this->sql_connect);
		
		$this->num_queries++;
		
		return $this->sql_result;
	}
	
	function fetch_assoc($sql)
	{
		return @mysql_fetch_assoc($sql);
	}
	
	function num_rows($sql)
	{
		return @mysql_num_rows($sql);
	}
	
	// a prettier "die" function
	function error($error_msg)
	{
		die("<b>" . $this->app_name . " FATAL ERROR</b>: " . $error_msg);
	}

}

?>