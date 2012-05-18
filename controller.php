<?php     

defined('C5_EXECUTE') or die(_("Access Denied."));

class QuickLinksPackage extends Package {

	protected $pkgHandle = 'quick_links';
	protected $appVersionRequired = '5.5.1';
	protected $pkgVersion = '0.1';
	
	public function getPackageDescription() {
		return t("Quick links for users");
	}
	
	public function getPackageName() {
		return t("Quick Links");
	}
	
	public function install() {
		$pkg = parent::install();
		
		Loader::model('block_types');
		
		// install block		
		BlockType::installBlockTypeFromPackage('quick_links', $pkg);
	}

}