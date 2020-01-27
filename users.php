<?php 
	class Users
	{
		
		function __construct()
		{
			$this->phone = "";
			$this->name = "";
			$this->confirmed = "";
			$this->changed = "";
		}


		public function setPhone($con,$prevphone,$phone){
			if($this->get($con,$prevphone) == NULL){
				return 0;
			}
			$query = "
				Update users
				SET phone = '$phone' 
				where phone = '$prevphone'
				";
			$result = mysqli_query($con,$query) or die(mysqli_error());
			if($result){
				return 1;
			}else{
				return 0;
			}
		}

		public function confirm($con, $phone){
			if($this->get($con,$phone) == NULL){
				return 0;
			}
			$query = "
				Update users
				SET confirmed = '1' 
				where phone = '$phone'
				";
			// echo $query;
			$result = mysqli_query($con,$query) or die(mysqli_error());
			// print_r($result);
			// echo "<br>";
			if($result){
				return 1;
			}else{
				return 0;
			}
		}

		public function get($con, $phone)
		{
			$query = "
				select * from users
				where phone = '$phone'";
			$result = mysqli_query($con,$query) or die(mysqli_error());
			$rows = mysqli_num_rows($result);
			$u = new Users();
			if($row = mysqli_fetch_assoc($result)){
                $u->phone = $row['phone'];
                $u->name = $row['name']; 
                $u->confirmed = $row['confirmed']; 
			}else{ 
				return NULL;
			}
			return $u;

		}

		public function getoriginal($con, $name)
		{
			$query = "
				select * from original
				where name = '$name'";
			$result = mysqli_query($con,$query) or die(mysqli_error());
			$rows = mysqli_num_rows($result);
			$u = new Users();
			if($row = mysqli_fetch_assoc($result)){
                $u->phone = $row['phone'];
                $u->name = $row['name']; 
			}else{ 
				return NULL;
			}
			return $u;

		}

		public function getall($con){
			$query = "select * from users";
			$result = mysqli_query($con,$query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
			$all_users = array();
			while($row = mysqli_fetch_assoc($result)){
				$usr = new Users();
				$usr->name = $row["name"];
				$usr->phone= $row["phone"]; 
				$usr->confirmed = $row['confirmed']; 
				$u = $this->getoriginal($con, $usr->name);
				if($u->phone == $usr->phone){
					$usr->changed = "No";
				}else{
					$usr->changed = "Yes";
				}
				array_push($all_users, $usr);

			}
			return $all_users;
		}
	}
?>
