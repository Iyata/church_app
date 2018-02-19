<?php
include_once 'model/db_connect.php';

//function to respond to user selection when sending messages
function query_db($receiver){

	global $connect;

		//condition to select all contacts or select only one category
	if($receiver!='*'){
			//compose query
		$query = "SELECT phone FROM contacts WHERE 
		category='".$receiver."'";
	} else{
		$query = "SELECT phone FROM contacts";
	}

			//pass to db
	if(@$pass= mysqli_query($connect,$query)){
				//fetch numbers into array
		while($result = mysqli_fetch_array($pass)){
			$numbers[] = $result['phone'];
		}

		if(!empty($numbers)){
			foreach ($numbers as $in) {
					if($in !== '0'){ #exclude zero values
						$num[] = '0'.$in; #this appends 0 in front of each number
					}
				} 
			}else{
					$num[] = '0'; #in the event no number is in the category, assign 0
				}

				return $list = implode(',', $num);

			}

		}

		function get_cat_numbers(){
			global $connect;

			$query = "SELECT `department`.`dept_name`, `contacts`.`phone` FROM `department` INNER JOIN
			`contacts` ON `department`.`dept_id`=`contacts`.`category`";

			$numbers = [];
			if($pass = mysqli_query($connect, $query)){
				while($result = mysqli_fetch_assoc($pass)){
					$numbers[] = $result;
				}
				return $numbers;
			}
		}

		//print_r(get_cat_numbers());