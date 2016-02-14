<?php

namespace WFA\Auth;

/**
* This class handles the User-Authentication.
*/
class Login {

	/**
	* It stores the hostname required to connect to MySQL.
	*
	* @var string
	*/
	protected $db_hostname = 'localhost';

	/**
	* It stores the username required to connect to MySQL. The coder is expected to changes
	* here, if required.
	*
	* @var string
	*/
	protected $db_username = 'root';

	/**
	* It stores the password required to connect to MySQL. The coder is expected to changes
	* here, if required.
	*
	* @var string
	*/
	protected $db_password = '';

	/**
	* It stores the name of the database specified by the coder.
	*
	* @var string
	*/
	protected $db_name;

	/**
	* It stores the name of the table within database specified by the coder.
	*
	* @var string
	*/
	protected $table_name;

	/**
	* It stores the name of the column corresponding to username in table.
	*
	* @var string
	*/
	protected $user_column;

	/**
	* It stores the name of the column corresponding to password in table.
	*
	* @var string
	*/
	protected $pass_column;

	/**
	* It stores encryption-type of password. 0 for plain-text and 1 for md-5.
	*
	* @var int
	*/
	protected $hash_type;

	/**
	* Function to set the values of the variables required for the purpose of accessing User-Auth database.
	*
	* @param string $db_name
	* 
	* @param string $table_name
	* 
	* @param string $user_column
	*
	* @param string $pass_column
	*
	* @param int $hash_type
	*/
	function __construct($db_name, $table_name, $user_column, $pass_column, $hash_type) {
		$this->db_name = $db_name;
		$this->table_name = $table_name;
		$this->user_column = $user_column;
		$this->pass_column = $pass_column;
		$this->hash_type = $hash_type;
	}

	/**
	* Function to connect to the database.
	*
	* @return connection_object Returns an object representing the connection to the MySQL server.
	*/
	public function connectDB() {
		$conn = mysqli_connect($this->db_hostname, $this->db_username, $this->db_password, $this->db_name);
		if ($conn->connect_error) {
			die("Connection Failed: ".$conn->connect_error);
		}
		return $conn;
	}

	/**
	* Function to disconnect from the database.
	*
	* @param connection_object Object representing the connection to the MySQL server
	*/
	public function disconnectDB($conn) {
		mysqli_close($conn);
	}


}


?>