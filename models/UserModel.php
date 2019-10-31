<?php

   namespace models;
   use models\User;
   use models\Tweet;
   use core\DBManager;
   use PDO;
   class UserModel{
      private $dbManager;
      public function __construct(){
         $this->dbManager = new DBManager("localhost", "bitlab", "root", "");
      }


public function deleteTweet($id){
         try{
            $query = $this->dbManager->getConnection()->prepare("
            	UPDATE tweets SET active = :t_active             
               	WHERE id = :t_id
            	");
            $query->execute(array('t_id' => $id, 't_active' => 0));
         }catch(Exception $e){
            echo $e->getMessage();
         }
      }



public function updateTweet(Tweet $tweet){
         try{
            $query = $this->dbManager->getConnection()->prepare("
            	UPDATE tweets SET tweet = :t_tweet
           		WHERE id = :t_id
            	");
            $query->execute(array('t_tweet' => $tweet->tweet, 't_id' => $tweet->id));
         }catch(Exception $e){
            echo $e->getMessage();
         }
      }


 public function selectTweet(){
 	$result = array();
 	try {                           
            $query = $this->dbManager->getConnection()->prepare("
            SELECT tweet
            FROM tweets WHERE id=:t_id
            ");                            
            
            $query->execute(array('t_id'=>$_GET['id']));
            $result = $query->fetchAll(PDO::FETCH_CLASS, "models\Tweet")[0];
 }catch(Exception $e){
            echo $e->getMessage();
         }return $result;
     }





      public function delete(){
         try{
            $query = $this->dbManager->getConnection()->prepare("
               DELETE FROM user_data
               WHERE user_id = :u_id
            ");
            $query->execute(array('u_id'=>$_SESSION['id']));
         }catch(Exception $e){
            echo $e->getMessage();
         }
         try{
            $query = $this->dbManager->getConnection()->prepare("
               DELETE FROM userz
               WHERE id = :u_id
            ");
            $query->execute(array('u_id'=>$_SESSION['id']));
         }catch(Exception $e){
            echo $e->getMessage();
         }   
      }



      public function update(User $user){
      	try{
            $query = $this->dbManager->getConnection()->prepare("
               UPDATE user_data SET name = :u_name, surname = :u_surname, gender = :u_gender, country = :u_country, city = :u_city
               WHERE user_id = :u_id
            ");
            $query->execute(array('u_name'=>$user->name, 'u_surname'=>$user->surname, 'u_gender'=>$user->gender, 'u_country'=>$user->country, 'u_city'=>$user->city, 'u_id'=>$_SESSION['id']));
         }catch(Exception $e){
            echo $e->getMessage();
         }   
      }


      




      
public function unfollow(User $user){
	try {
        $query = $this->dbManager->getConnection()->prepare("
            DELETE FROM follows
            WHERE user_id = :u_id AND follow_id = :f_id
        ");
        $query->execute(array('u_id'=>$_SESSION['id'], 'f_id'=>$user->id));
        
    }catch (PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
    }
}


public function toFollow(User $user){
	try {
        $query = $this->dbManager->getConnection()->prepare("
            INSERT INTO follows (user_id, follow_id)
            VALUES (:u_id, :f_id)
        ");
        
        $query->execute(array('u_id'=>$_SESSION['id'], 'f_id'=>$user->id));
    }catch (PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
    }
}



public function posts(Tweet $tweet){
      	$result = array();
      	try {
	    			$query = $this->dbManager->getConnection()->prepare("
	        		SELECT *
        			FROM tweets WHERE user_id = :u_id
	        		");
	        		$query->execute(array('u_id'=>$tweet->user_id));
	        		$result = $query->fetchAll(PDO::FETCH_CLASS, "models\Tweet");
	        		
	        		
	    			}catch (PDOException $e) {
	        			echo "Error!: " . $e->getMessage() . "<br/>";
	   	 			}
	   	 			return $result;
      }





      public function search($search){
      	 	if(isset($search) && !empty($search)){
      	 		$result = array();
	   	try {
	        $query = $this->dbManager->getConnection()->prepare("
	        SELECT u.email, u.id, d.name as u_name, d.surname as u_surname, d.gender as u_gender, d.country as u_country, d.city as u_city
	        FROM userz u
	        LEFT OUTER JOIN user_data d ON d.user_id = u.id
	        WHERE u.email LIKE :u_email
	        ");
	        $query->execute(array('u_email'=>'%'.$search.'%'));
	        $result = $query->fetchAll(PDO::FETCH_CLASS, "models\User");
	        
	        
	    }catch (PDOException $e) {
	        echo "Error!: " . $e->getMessage() . "<br/>";
	    }
	    return $result;
	  		}
      }


      public function subscribe(User $user){
      	$result = null;
      	try {
      	$query = $this->dbManager->getConnection()->prepare("
				        			SELECT f.user_id, f.follow_id
				        			FROM follows f
				        			WHERE f.user_id = :host_id and f.follow_id = :f_id
							        ");							        
							        $query->execute(array('host_id'=>$_SESSION['id'], 'f_id'=>$user->id));
							        $fetch = $query->fetchAll(PDO::FETCH_CLASS, "models\User");
							        if(count($fetch)!=0){
							        	$result = $fetch[0];
							        }

							    }catch (PDOException $e) {
				        echo "Error!: " . $e->getMessage() . "<br/>";
				    }return $result;
      }



public function follow(User $user){
      	$result = array();
      	try {
		    	$query = $this->dbManager->getConnection()->prepare("
		        SELECT f.follow_id, f.user_id, u.email, u.id, d.name as u_name, d.surname as u_surname, d.gender as u_gender, d.country as u_country, d.city as u_city
		        FROM follows f
		        LEFT OUTER JOIN userz u ON u.id = f.user_id
		        LEFT OUTER JOIN user_data d ON d.user_id = u.id 
		        WHERE f.follow_id = :f_id
		        ");
		        
		        $query->execute(array('f_id'=>$user->id));
		        $result = $query->fetchAll(PDO::FETCH_CLASS, "models\User");
		    }catch (PDOException $e) {
		        echo "Error!: " . $e->getMessage() . "<br/>";
			}return $result;
      }




      public function follows(User $user){
      	$result = array();
      	try {
		    	$query = $this->dbManager->getConnection()->prepare("
		        SELECT f.follow_id, f.user_id, u.email, u.id, d.name as u_name, d.surname as u_surname, d.gender as u_gender, d.country as u_country, d.city as u_city
		        FROM follows f
		        LEFT OUTER JOIN userz u ON u.id = f.follow_id
		        LEFT OUTER JOIN user_data d ON d.user_id = u.id 
		        WHERE f.user_id = :f_id
		        ");
		        $query->execute(array('f_id'=>$user->id));
		        $result = $query->fetchAll(PDO::FETCH_CLASS, "models\User");

		    }catch (PDOException $e) {
		        echo "Error!: " . $e->getMessage() . "<br/>";
			}return $result;
      }




      public function info(User $user){
   if(isset($user->id)){
      	try {

        $query = $this->dbManager->getConnection()->prepare("
            SELECT name, surname, gender, country, city
	            FROM user_data WHERE user_id=:u_id
        ");
        $query->execute(array('u_id'=>$user->id));
        
        $result = $query->fetchAll(PDO::FETCH_CLASS, "models\User")[0];
		}catch (PDOException $e) {
	        			echo "Error!: " . $e->getMessage() . "<br/>";
	   	 			}
	   	 			return $result;
	  }
    }





      public function viewTweet(){
      	$result = array();
      	try {
	    			$query = $this->dbManager->getConnection()->prepare("
	        		SELECT *
        			FROM tweets 
	        		");
	        		$query->execute();
	        		$result = $query->fetchAll(PDO::FETCH_CLASS, "models\Tweet");
	        		
	        		
	    			}catch (PDOException $e) {
	        			echo "Error!: " . $e->getMessage() . "<br/>";
	   	 			}
	   	 			return $result;
      }



      public function addTweet(Tweet $tweet){
      		if(isset($tweet->tweet) && !empty($tweet->tweet)){
		try {
	    	$query = $this->dbManager->getConnection()->prepare("
	        INSERT INTO tweets (user_id, tweet, active, like_count)
        	VALUES (:u_id,:u_tweet,:u_active,:u_likes)
	        ");
	        $query->execute(array('u_id'=>$tweet->user_id, 'u_tweet'=>$tweet->tweet, 'u_active'=>$tweet->active, 'u_likes'=>$tweet->like_count));
	        var_dump($tweet);
	        
	    }
	    catch (PDOException $e) {
	        echo "Error!: " . $e->getMessage() . "<br/>";
	    }
	} 
      }






      public function checkUser(User $user){
      	try {



        $query = $this->dbManager->getConnection()->prepare("
            SELECT id,email, password
            FROM userz WHERE email=:u_email AND password=:u_password
        ");
        
        $query->execute(array(

        	'u_email'=>$user->email,
			'u_password'=>$user->password
    					
    	));
        $result = $query->fetchAll(PDO::FETCH_CLASS, "models\User");
        if(count($result)==0){
        	return null;
        }else{
        	$_SESSION['id']=$result[0]->id;
        	return $result;
        }
        
   
		
    	
    }catch (PDOException $e) {
         echo "Error!: " . $e->getMessage() . "<br/>";
    }
      }


     



      public function addUser(User $user){
         try {
        $query = $this->dbManager->getConnection()->prepare("
        INSERT INTO userz (email, password)
        VALUES (:u_email,:u_password)
        ");
        $query->execute(array('u_email'=>$user->email, 'u_password'=>$user->password));
    }catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
    }


try {
        $query = $this->dbManager->getConnection()->prepare( "
        SELECT id
        FROM userz
        WHERE email=:u_email AND password=:u_password
        ");
        $query->execute(array('u_email'=>$user->email, 'u_password'=>$user->password));
        $result = $query->fetchAll(PDO::FETCH_CLASS, "models\User")[0];
        $_SESSION['id']=$result->id;    
    }catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
    }


try {


        $query = $this->dbManager->getConnection()->prepare("
            INSERT INTO user_data (user_id, name, surname, gender, country, city)
            VALUES ( :u_id,:u_name, :u_surname, :u_gender, :u_country, :u_city)
        ");

        $query->execute(array('u_id'=>$_SESSION['id'], 'u_name'=>$user->name, 'u_surname'=>$user->surname, 'u_gender'=>$user->gender,'u_country'=>$user->country, 'u_city'=>$user->city));

        
    }catch (PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
    }
     }






   }
?>