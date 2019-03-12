<?php



/* 
To pass values from PHP to SQL statement dynamically and securely,
 *  you use the PDO prepared statement.
 */
/**
	* insert a new task into the tasks table
	 * @param string $subject
	 * @param string $description
	 * @param string $startDate
	 * @param string $endDate
	 * @return mixed returns false on failure 
	 */
  function insertSingleRow($subject,$description,$startDate,$endDate) {
		$task = array(':subject' => $subject,
					  ':description' => $description,
					  ':start_date' => $startDate,
					  ':end_date' => $endDate);

		$sql = 'INSERT INTO tasks(subject,description,start_date,end_date)
				VALUES(:subject,:description,:start_date,:end_date)';

		$q = $this->conn->prepare($sql);

		return $q->execute($task);
	}





$obj->insertSingleRow('MySQL PHP Insert Tutorial',
					  'MySQL PHP Insert using prepared statement', 
					   '2013-01-01',
					   '2013-01-02');

?>