<?php
//blueprint for object
// access pdo 
class User{
    //visible variable / function in all classes 
    protected $pdo;
    
    public function __construct($pdo){
	$this->pdo = $pdo;
}
    
    //  for special char
    public function checkInput($var){
        $var = htmlspecialchars($var);
        $var = trim($var);
        $var = stripslashes($var);
        return $var;
    }    

    // login query
    public function login($email, $password){
        $passwordHash = md5($password);
        $stmt = $this->pdo->prepare('SELECT `id` FROM `users` WHERE `email` = :email AND `password` = :password');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();	
        
        if($count > 0){
            $_SESSION['id'] = $user->id;
            //redirect to home page
			header('Location: home.php');
		}else{
            //not found in database
			return false;
		}
    }
    // visible screenname / email / username using id
    public function userData($user_id){
		$stmt = $this->pdo->prepare('SELECT * FROM `users` WHERE `id` = :id');
		$stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ);
    }  

    //Register Query
    public function register($email, $screenName, $password){
    $passwordHash = md5($password);
    $stmt = $this->pdo->prepare("INSERT INTO `users` (`email`, `password`, `screenname`) VALUES (:email, :password, :screenname)");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $passwordHash,  PDO::PARAM_STR);
        $stmt->bindParam(":screenname", $screenName,  PDO::PARAM_STR);
        $stmt->execute();
        
        $user_id = $this->pdo->lastInsertId();
        $_SESSION['id'] = $user_id;
    }

    // Check Email
	public function checkEmail($email){
        $stmt = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
        
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        //count effected row if data found in db then retrun true
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

    // Check username Exists or not
	public function checkUsername($username){
		$stmt = $this->pdo->prepare("SELECT `username` FROM `users` WHERE `username` = :username");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
    }
    
    // Logout Query
	public function logout(){

        $_SESSION = array();
		session_destroy();
		header('Location: ../index.php');
    }	
    
}
?>