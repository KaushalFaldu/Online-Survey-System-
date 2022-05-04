<?php
session_start();
//data.php
$connect = new PDO("mysql:host=localhost;dbname=login", "root", "");
if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$data = array(
			':answer'		=>	$_POST["answer"]
		);

		$query = "
		INSERT INTO survey_table ,
		(answer,user_id) VALUES (:answer,user_id)
		";
		
		$statement = $connect->prepare($query);

		$statement->execute($data);

		echo 'done';
	}

	if($_POST["action"] == 'fetch')
	{
		$quesId = $_POST["quesId"];
		$query = "
		SELECT answer, COUNT(survey_id) AS Total,user_id 
		FROM survey_table 
		GROUP BY answer HAVING user_id = $quesId
		";
		// $query = "
		//  SELECT answer, COUNT(survey_id) AS Total,user_id 
		//  FROM survey_table 
		//  GROUP BY answer
		//  ";
		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'answer'		=>	$row["answer"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data);
	}
}


?>