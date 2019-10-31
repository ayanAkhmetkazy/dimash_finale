<?php

namespace controllers;

use core\Controller;
use models\UserModel;
use models\User;
use models\Tweet;
class MainController extends Controller{
	private $userModel;

	public function __construct(){
		$this->userModel = new UserModel();
	}



	public function page(){
		$tweets = $this->userModel->viewTweet();
		$_REQUEST['TWEET_LIST']= $tweets;
		return 'page';
	}


	public function login(){
		
		return 'login';
	}

	public function register(){
		
		return 'register';
	}


	public function deletetweet(){
         $id = $_POST['tweet_id'];
         $this->userModel->deleteTweet($id);
         header("Location:page");
      } 

	public function updatetweet(){
         $tweet = new Tweet();
         $tweet->id = $_GET['id'];
         $tweet->tweet = $_POST['tweet'];
         $this->userModel->updateTweet($tweet);
         header("Location:page");
      }


	public function edittweet(){
 

         $_REQUEST["SELECTED"]= $this->userModel->selectTweet();
         return 'edittweet';
      }


	public function delete(){
         $this->userModel->delete();
         header("Location:login");
      }

	public function update(){
         $user = new User();
         $user->name = $_POST['name'];
         $user->surname = $_POST['surname'];
         $user->gender = $_POST['gender'];
         $user->country = $_POST['country'];
         $user->city = $_POST['city'];
         $this->userModel->update($user);
         header("Location:profile");
      }

	public function editprofile(){
		$user = new User();
		$user->id=$_SESSION['id'];
		$_REQUEST['INFO']= $this->userModel->info($user);
		return "editprofile";
	}


	public function index(){
		// $cars = $this->userModel->getAllUsers();
		// $_REQUEST['USER_LIST']= $users;
		return 'index';
	}

public function unfollow(){
		$user = new User();
		$user->id=$_POST['unfollow'];
		$this->userModel->unfollow($user);
         header("Location:else?id=".$_POST['unfollow']);
	}


	public function toFollow(){
		$user = new User();
		$user->id=$_POST['follow'];
		$this->userModel->toFollow($user);
         header("Location:else?id=".$_POST['follow']);
	}

	public function else(){
		$tweet = new Tweet();
		$user = new User();
		$tweet->user_id=$_GET['id'];
		$user->id=$_GET['id'];	
		$_REQUEST['INFO_ELSE']= $this->userModel->info($user);
		$_REQUEST['SUB'] = $this->userModel->subscribe($user);
		$_REQUEST['POSTS'] = $this->userModel->posts($tweet);
		return 'else';
	}

public function profile(){
	$user = new User();
	$user->id=$_SESSION['id'];
	$_REQUEST['INFO']= $this->userModel->info($user);
	$_REQUEST['FOLLOWS']= $this->userModel->follows($user);
	$_REQUEST['FOLLOW']= $this->userModel->follow($user);
	return 'profile';
}



	public function search(){
		$search = $_GET['search'];
		$_REQUEST['FOUND_LIST']= $this->userModel->search($search);
		return 'poisk';

	}

	public function addTweet(){
		$tweet = new Tweet();
		 $tweet->user_id = $_SESSION['id'];
		 $tweet->tweet = $_POST['tweet'];
		 $tweet->active = 1;
		 $tweet->like_count = 0;
         $this->userModel->addTweet($tweet);
         header("Location:page.php");
	}

	public function addUser(){
		$user = new User();
		 $user->email = $_POST['email'];
		 $user->password = $_POST['password'];
         $user->name = $_POST['name'];
         $user->surname = $_POST['surname'];
         $user->gender = $_POST['gender'];
         $user->country = $_POST['country'];
         $user->city = $_POST['city'];
         $this->userModel->addUser($user);
         header("Location:login.php");
	}
	public function checkUser(){
		$user = new User();
		 $user->email = $_POST['email'];
		 $user->password = $_POST['password'];
        $_REQUEST['USER']= $this->userModel->checkUser($user);
         if($_REQUEST['USER']==null){
         	header("Location:login.php");
         }else{
         	header("Location:page.php");
         }
         
	}
}





 ?>