<?php
/* functions in DB
 * query_feed_time()
 * query_phonenumber()
 */

class Feedback {
  public $username;		//string
  public $phonenumber;	//string 
  public $feed_info;	//string
  public $feed_time;	//string
  
  public function __construct($un, $pn,$fi){
    $this->username = $un;
    $this->phonenumber = $pn;
    $this->feed_info = $fi;
    $this->feed_time = date("Y/m/d");
  } 
  public function set_username($un){
    $this->username = $un;
  }
  public function set_phonenumber($pn){
    $this->phonenumber = $pn;
  }
  public function set_feed_info($fi){
    $this->feed_info = $fi;
  }
  
  public function get_username(){
    return $this->username;
  }
  public function get_phonenumber(){
    return $this->phonenumber;
  }
  public function get_feed_info(){
    return $this->feed_info;
  }
  public function get_feed_time(){
    return $this->feed_time;
  }
  
  public function display(){
//     echo 'This is a feedback'.'</br>';
//     echo 'UserName '.$this->username.'</br>' ;
//     echo 'PhoneNumber: '.$this->phonenumber.'</br>' ;
//     echo 'Comments '.$this->feed_info.'</br>' ;
//     echo 'Subtime '.$this->feed_time.'</br>' ;
  	echo '<table border="1" >';
    echo '<tr>';
    echo '<td>UserName</td><td>PhoneNumber</td><td>Comments</td><td>Subtime</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>'.$this->username.'</td>';
    echo '<td>'.$this->phonenumber.'</td>';
    echo '<td>'.$this->feed_info.'</td>';
    echo '<td>'.$this->feed_time.'</td>';
    echo '</tr>';
    echo '</table>';
  }
  
}
?>
