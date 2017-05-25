<?php
if(!defined('GNUSOCIAL')){ exit(1); }

class XmppClientPlugin extends Plugin{
	//public $prebind_path = Plugin::staticPath('XmppClient', '')."prebind.php";
	public function initialize(){
		return true;
	}
	static function settings($setting)
	{
		$settings['bosh_url'] = '';
		$settings['xmpp_domain'] = '';
		// config.php settings override the settings in this file
		$configphpsettings = common_config('site','xmppclient') ?: array();
		foreach($configphpsettings as $configphpsetting=>$value) {
			$settings[$configphpsetting] = $value;
		}
		if(isset($settings[$setting])) {
			return $settings[$setting];
		}
		else {
			return false;
		}
	}

	public function onPluginVersion(array &$versions){
        	$versions[] = array('name' => 'XmppClientPlugin',
            'version' => '1.0',
            'author' => 'Mitchell Urgero <info@urgero.org>',
            'homepage' => 'https://github.com/mitchellurgero/PaUpdate',
            'rawdescription' => _m('XMPP for Qvitter!'), );
        	return true;
	}
        public function onEndShowScripts($input){
                print '<script src="https://cdn.conversejs.org/dist/converse.min.js"></script>';
                print '';
                if(!common_current_user()){ return true; }

?>
<script>
    converse.initialize({
        bosh_service_url: '<?php echo self::settings('bosh_url'); ?>',
        show_controlbox_by_default: false,
                allow_registration: false,
                default_domain: '<?php echo self::settings('xmpp_domain'); ?>',

            });
</script>
<?php
                return true;
        }
	public function onQvitterEndShowScripts($input){
		print '<script src="https://cdn.conversejs.org/dist/converse.min.js"></script>';
		print '';
		if(!common_current_user()){ return true; }

?>
<script>
    converse.initialize({
        bosh_service_url: '<?php echo self::settings('bosh_url'); ?>',
        show_controlbox_by_default: false,
		allow_registration: false,
		default_domain: '<?php echo self::settings('xmpp_domain'); ?>',
	
	    });
</script>
<?php
		return true;
	}
        function onEndShowStyles($input){
//                print '<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.conversejs.org/css/converse.min.css">';
		$input->cssLink('https://cdn.conversejs.org/css/converse.min.css');
              return true;
        }
	function onQvitterEndShowHeadElements($input){
		print '<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.conversejs.org/css/converse.min.css">';
		return true;
	}
}


?>
