<?php
defined('C5_EXECUTE') or die("Access Denied.");

class QuickLinksBlockController extends BlockController {

	protected $btTable = 'QuickLinks';
	
	protected $btName = "Quick Links";
	
	protected $btDescription = 'Your own personal links';
	
	protected $btWrapperClass = 'ccm-ui';
	
	public $uID;
	
	public function getBlockTypeDescription() {
		return t($this->btDescription);
	}
	
	public function getBlockTypeName() {
		return t($this->btName);
	}
	
	public function setuID(){
	 	/* GET USERINFO */
		$u = new User();
		
		/* INIT 'uID' */
		$this->uID = $u->uID;
	}
	
	public function view(){
		/* SET uID */
		$this->setuID();
		
		/* INIT DB */
		$db = Loader::db();
		
		/* RUN SQL */
		$sql = $db->Execute("SELECT * FROM `QuickLinksAdded` WHERE `bID` = '".$this->bID."' AND `uID` = '".$this->uID."'");
		
		/* SET ROWS */
		$this->set('rows',$sql);
	}
	
	public function action_add_link(){
		/* SET uID */
		$this->setuID();
		
		/* INIT DB */
		$db = Loader::db();
		
		/* CHECK FIELDS */
		if(!$_POST['name'] OR !$_POST['url']){
			return false;
		}
		
		/* RUN SQL */
		$sql = $db->Execute("INSERT INTO `QuickLinksAdded` (
		`lID` ,
		`bID` ,
		`uID` ,
		`name` ,
		`url`
		)
		VALUES (
		NULL ,  '".$this->bID."',  '".$this->uID."',  '".mysql_real_escape_string($_POST['name'])."',  '".mysql_real_escape_string($_POST['url'])."'
		);");
		
		return true;
	}
}
?>