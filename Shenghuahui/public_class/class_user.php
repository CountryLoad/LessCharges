<?php
/* functions in DB
 * query_phonenumber()
 * query_username()
 * query_email()
 */

class User{
	public $username ;  	// string 
	public $phonenumber;	// string
	public $password ;		// string ****
	public $carrier ;		// string
	public $email;			// string
	public $current_pkg; 	// string	store pkgname then look up in DB
	public $rec_pkg;	 	// string	store pkgname then look up in DB
	public $sign_date;   	// string	date("Y/m/d"); 
// 	public $bill_analysis;  // string or Pkg	a pkg object detail demand
	
	//basic info not thorough
	public function __construct($un, $pn, $password, $date){
		$this->username = $un;
		$this->phonenumber = $pn;
		$this->password = $password;
		$this->email = 'mail';
		$this->sign_date = $date ;//date("Y/m/d");
		$this->current_pkg = '3G';
		$this->rec_pkg = '4G';
// 		$this->bill_analysis = '34G';
	}
	
	public function set_username($un){
		$this->username = $un;
	}
	// use api to seperately get its carrier
	public function set_phonenumber($pn){
		$this->phonenumber = $pn;
	}
	public function set_password($pwd){
		$this->password = $pwd ;
	}
	public function set_carrier($carrier){
		$this->carrier = $carrier ;
	}
	public function set_email($email){
		$this->email = $email;
	}
	public function set_currenct_pkg($current_pkg){
		$this->current_pkg = $current_pkg;
	}
	public function set_rec_pkg($rec_pkg){
		$this->rec_pkg = $rec_pkg;
	}
// 	//bill analysis is a table contents its demand and cost
// 	public function set_bill_analysis($bill_analysis){
// 		$this->bill_analysis = $bill_analysis;
// 	}
	public function set_all($un, $pn, $password, $date, $carrier, $email, $cp, $rp){
		$this->username = $un;
		$this->phonenumber = $pn;
		$this->password = $password;
		$this->sign_date = $date ;	
		$this->carrier = $carrier ;
		$this->email = $email;
		$this->current_pkg = $cp;
		$this->rec_pkg = $rp;
	}

	public function get_username(){
		return $this->username;
	}
	public function get_phonenumber(){
		return $this->phonenumber;
	}
	public function get_carrier(){
		return $this->carrier;
	}
	public function get_email(){
		return $this->email;
	}
	public function get_current_pkg(){
		return $this->current_pkg;
	}
	public function get_rec_pkg(){
		return $this->rec_pkg;
	}
	public function get_sign_date(){
		return $this->sign_date;
	}
	public function get_password(){
		return $this->password;
	}
	
	
	public function display(){
		echo '<table border="1" >';
		echo '<tr>';
		echo '<td>UserName</td><td>PhoneNumber</td><td>Password</td><td>Carrier</td><td>email</td>';
		echo '<td>Current</td><td>Recommend</td><td>SignDate</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>'.$this->username.'</td>';
		echo '<td>'.$this->phonenumber.'</td>';
		echo '<td>'.$this->passowrd.'</td>';
		echo '<td>'.$this->carrier.'</td>';
		echo '<td>'.$this->email.'</td>';
		echo '<td>'.$this->current_pkg.'</td>';
		echo '<td>'.$this->rec_pkg.'</td>';
		echo '<td>'.$this->sign_date.'</td>';
		echo '</tr>';
		echo '</table>';
	}
}
/*******************************/
// 	$date = date("Y/m/d");
// 	$user1 = new User('xyz', '15663403081', '123456', $date);
// 	$user1->set_carrier('cu');
// 	$user1->display();
?>