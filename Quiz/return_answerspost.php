<?php
	//create a function to retrieve all products


	//create a function to retrieve all products in a specific category
	
	//create a function to retrieve a single product
        require('../Quiz/database.php');
        global $conn;

        $QuestionID = $_POST['QuestionID'];

       // echo print_r($_POST);
/*       
if(!is_null($_POST['QuestionID']))
        {
            $QuestionID = $_POST['QuestionID'];
        }*/
        $sql = 'SELECT * FROM answers WHERE QuestionID = :QuestionID';		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':QuestionID', $QuestionID);
        //$statement->bindValue(':password', $_POST['password']); 
        $statement->execute();
        
        
        
		//use the fetch() method to retrieve a single row
		$result = $statement->fetchAll();
        //Close SQL statement Connection to the server & free up the connection
		$statement->closeCursor();
        $count = $statement->rowCount();
        //return json_encode($result[0][0]);
        $Json = array();

        foreach ($result as $key => $value) 
        {
        // $arr[3] will be updated with each value from $arr...
        //echo "[{$key} => {$value['QuizName']} , {$value['QuizCategory']} ]";
        
        $Json[$key]['QuestionID'] = $value['QuestionID'];
        $Json[$key]['answerID'] = $value['answerID'];
        $Json[$key]['answerText'] = $value['answerText'];
        $Json[$key]['answerCategory'] = $value['answerCategory'];
        //$Json[$key]['answerType'] = $value['answerType'];
            
        }
    //    $return["json"] = json_encode($Json);
       // return $return["json"];
        $result = $Json;
        
    $return["json"] = json_encode('{"name":"John"}');
		  $r =json_encode($result);
    print_r($r);
    return $r;//'{"name":"John"}';
      
        /*print_r($result);
        for($i=0; $i < count($result); $i++)
        {
            echo $result[i]['QuizName'];
            echo $result[i]['QuizCategory'];
            $Json[i]['name'] = $result[i]['QuizName'];
            $Json[i]['category'] = $result[i]['QuizCategory'];
        }*/
       // echo $count;
$return = $Json;
	//echo "ABC";	  

//return json_encode($return);
      
	//create a function to add a new product
    //Changes 20/03/2016 8:42 AM Jade Gorton
    //       add_product($productName, $productDescription, $productPrice, $categoryID)
	
?>

<body>
</body>