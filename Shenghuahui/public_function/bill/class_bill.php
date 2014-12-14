<?php
/* functions in DB
 * query_phonenumber()
 */

class BillAnalysis {
	public $phonenumber; 	//string
	public $pkgname; 		// string
	public $call; 			// int
	public $data; 			// float
	public $text; 			// int
	// public $extra;
	public function __construct($pn,$pkg, $call, $data, $text) {
		$this->phonenumber = $pn;
		$this->pkgname = $pkg;
		$this->call = $call;
		$this->data = $data;
		$this->text = $text;
	}
	public function set_phonenumber($pn){
		$this->phonenumber = $pn;
	}
	public function set_pkgname($pkg) {
		$this->pkgname = $pkg;
	}
	public function set_call($data) {
		$this->call = $call;
	}
	public function set_data($data) {
		$this->data = $data;
	}
	public function set_text($text) {
		$this->text = $text;
	}
	
	public function get_phonenumber(){
		return $this->phonenumber;
	}
	public function get_pkgname() {
		return $this->pkgname;
	}
	public function get_call() {
		return $this->call;
	}
	public function get_data() {
		return $this->data;
	}
	public function get_text() {
		return $this->text;
	}
	
	public function display(){
		echo '<table border="1" >';
		echo '<tr>';
		echo '<td>PhoneNumber</td><td>PkgName</td><td>Call</td><td>Data</td><td>Text</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>'.$this->phonenumber.'</td>';
		echo '<td>'.$this->pkgname.'</td>';
		echo '<td>'.$this->call.'</td>';
		echo '<td>'.$this->data.'</td>';
		echo '<td>'.$this->text.'</td>';
		echo '</tr>';
	    echo '</table>';
	  }
}
/******************************/
// 	$bill = new BillAnalysis('15663403081','4G-NC', 200, 200, 100);
// 	$bill->display();
?>