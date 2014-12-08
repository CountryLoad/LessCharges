<?php
class User{
	public $user_name ;
	public $phone_number;
	public $carrier ;
	public $email;
	public $current_pkg; // store pkgname then look up in DB
	public $rec_pkg;	 // store pkgname then look up in DB
	public $sign_date;   // date("Y/m/d");
	public $bill_analysis; // detail demand;
	
	public function __construct($user_name, $phone_number, $email,$date){
		$this->user_name = $user_name;
		$this->phone_number = $phone_number;
		$this->email = 'mail';
		$this->sign_date = $date ;//date("Y/m/d");
		$this->current_pkg = '3G';
		$this->rec_pkg = '4G';
		$this->bill_analysis = '34G';
	}
	
	public function set_un($user_name){
		$this->user_name = $user_name;
	}
	public function set_pn($phone_number){
		
	}
	public function set_email($email){
		
	}
	public 
}
?>