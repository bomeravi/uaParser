<?php
namespace Bomeravi\uaParser;

use Bomeravi\uaParser\useragent;

class os {
	private $useragent;
	private $name;
	private $version;
	private $bit;
	
	private $platforms = array(
	'windows phone'		=>	'Windows',
	'windows nt 10.0'	=> 'Windows 10',
	'windows nt 6.3'	=> 'Windows 8.1',
	'windows nt 6.2'	=> 'Windows 8',
	'windows nt 6.1'	=> 'Windows 7',
	'windows nt 6.0'	=> 'Windows Vista',
	'windows nt 5.2'	=> 'Windows 2003',
	'windows nt 5.1'	=> 'Windows XP',
	'Windows CE'		=> 'Windows CE',
	'windows nt 5.0'	=> 'Windows 2000',
	'windows nt 4.0'	=> 'Windows NT 4.0',
	'winnt4.0'			=> 'Windows NT 4.0',
	'winnt 4.0'			=> 'Windows NT',
	'winnt'				=> 'Windows NT',
	'windows 98'		=> 'Windows 98',
	'win98'				=> 'Windows 98',
	'windows 95'		=> 'Windows 95',
	'win95'				=> 'Windows 95',
	//'windows phone'			=> 'Windows Phone',
	'windows'			=> 'Windows OS',
	'android'			=> 'Android',
	'blackberry'		=> 'BlackBerry',
	'ipod'				=> 'iOS (IPod)',
	'iphone'			=> 'iOS (IPhone)',
	'ipad'				=> 'iOS (IPad)',
	'mac os x'			=> 'Mac OS X',
	'macintosh'			=> 'Mac OS',
	'mac_powerpc'		=> 'Mac OS 9', 
	'ppc mac'			=> 'Power PC Mac',
	'freebsd'			=> 'FreeBSD',
	'ppc'				=> 'Macintosh',
	'Ubuntu'			=> 'Ubuntu',
	'Fedora'			=> 'Fedora',
	'linux'				=> 'Linux',
	'debian'			=> 'Debian',
	'sunos'				=> 'Sun Solaris',
	'beos'				=> 'BeOS',
	'apachebench'		=> 'ApacheBench',
	'aix'				=> 'AIX',
	'irix'				=> 'Irix',
	'osf'				=> 'DEC OSF',
	'hp-ux'				=> 'HP-UX',
	'netbsd'			=> 'NetBSD',
	'bsdi'				=> 'BSDi',
	'openbsd'			=> 'OpenBSD',
	'gnu'				=> 'GNU/Linux',
	'unix'				=> 'Unknown Unix OS',
	'symbian' 			=> 'Symbian OS'
);
private $not_os_versions = array(
	'i686',
	'x86_64',
	'Chromium',
	'amd64');
	
private $os_bits = array(
	'WOW64' => '64',
	'x64'	=> '64',
	'Win64'	=> '64',
	'x86_64'	=> '64',
	'x86'	=> '32',
	'i([0-9])?86'	=> '32',
	'amd64'			=> '64'
	);
	
	private $os_default_bits = array(
//	'windows phone'		=>	'Windows',
	'windows nt 10.0'	=> '32',
	'windows nt 6.3'	=> '32',
	'windows nt 6.2'	=> '32',
	'windows nt 6.1'	=> '32',
	'windows nt 6.0'	=> 'Windows Vista',
	/*'windows nt 5.2'	=> 'Windows 2003',
	'windows nt 5.1'	=> 'Windows XP',
	'Windows CE'		=> 'Windows CE',
	'windows nt 5.0'	=> 'Windows 2000',
	'windows nt 4.0'	=> 'Windows NT 4.0',
	'winnt4.0'			=> 'Windows NT 4.0',
	'winnt 4.0'			=> 'Windows NT',
	'winnt'				=> 'Windows NT',
	'windows 98'		=> 'Windows 98',
	'win98'				=> 'Windows 98',
	'windows 95'		=> 'Windows 95',
	'win95'				=> 'Windows 95',
	//'windows phone'			=> 'Windows Phone',
	'windows'			=> 'Windows OS',
	'android'			=> 'Android',
	'blackberry'		=> 'BlackBerry',
	'ipod'				=> 'iOS (IPod)',
	'iphone'			=> 'iOS (IPhone)',
	'ipad'				=> 'iOS (IPad)',
	'mac os x'			=> 'Mac OS X',
	'macintosh'			=> 'Mac OS',
	'mac_powerpc'		=> 'Mac OS 9', 
	'ppc mac'			=> 'Power PC Mac',
	'freebsd'			=> 'FreeBSD',
	'ppc'				=> 'Macintosh',
	'Ubuntu'			=> 'Ubuntu',
	'Fedora'			=> 'Fedora',
	'linux'				=> 'Linux',
	'debian'			=> 'Debian',
	'sunos'				=> 'Sun Solaris',
	'beos'				=> 'BeOS',
	'apachebench'		=> 'ApacheBench',
	'aix'				=> 'AIX',
	'irix'				=> 'Irix',
	'osf'				=> 'DEC OSF',
	'hp-ux'				=> 'HP-UX',
	'netbsd'			=> 'NetBSD',
	'bsdi'				=> 'BSDi',
	'openbsd'			=> 'OpenBSD',
	'gnu'				=> 'GNU/Linux',
	'unix'				=> 'Unknown Unix OS',
	'symbian' 			=> 'Symbian OS'
	*/
	);
	
	
	public function __construct($useragent = null)
    {
			//var_dump($useragent);
		//var_dump($useragent instanceof uaParser);
        if ($useragent instanceof useragent) {
		//	echo "11111";
            $this->useragent = $useragent;
			
        }
		elseif ( is_string($useragent)) {
   
		    $this->useragent = new useragent($useragent);
		} 
		elseif (NULL == $useragent) {
			$this->useragent = new useragent($useragent);
		}
else		{
		//	var_dump($useragent);
          throw new InvalidArgumentException($useragent . "is not working");
        }
		$this->detect_os();
		$this->detect_os_bit();
    }
  
  public function getName()
    {
        if (!isset($this->name)) {
            os::detect($this,$this->getUseragent()->getName());
        }

        return $this->name;
    }
	
	public function getVersion(){
		 if (!isset($this->name)) {
            os::detect($this, $this->getUseragent()->getName());
        }

        return $this->version;
	}
	
	public function detect_os_bit(){
	$useragent = $this->useragent->getName();
		if (is_array($this->os_bits) && count($this->os_bits) > 0)
		{
			foreach ($this->os_bits as $key => $val)
			{
				if (preg_match('|'.$key.'.*?([0-9\.]+)?|i',$useragent, $match))
				{
				$this->setOsBit($val);
				//	$this->_set_mobile();
					return TRUE;
				}
			}
			
		}
		if (is_array($this->os_default_bits) && count($this->os_default_bits) > 0)
		{
			foreach ($this->os_default_bits as $key => $val)
			{
				if (preg_match('|'.$key.'|i',$useragent))
				{
				$this->setOsBit($val);
				//	$this->_set_mobile();
					return TRUE;
				}
			}
			
		}

		return FALSE;
	}
	
	public static function detect(useragent $agent = null){
	$os = new os($agent);
		//$useragent = '';

		$useragent = $os->useragent->getName();
		foreach ($os->platforms as $key => $val)
			{
				//echo  $useragent;
				if (preg_match('|'.preg_quote($key).'|i', $useragent))
				{
					$os->setOs($val);
					//echo $val;
					if (preg_match('|'.$key.' .*?([a-zA-Z0-9\._]+)|i', $useragent, $match))
				{
					
					$value = isset($match[1]) ? $match[1] : '';
					//echo $value . "<br />";
					if(in_array($value, $os->not_os_versions)){
					}
					else {
						$os->setOsVersion($value);
					}
				}
				break;
					//return true;
				}
			}
		//return false;
		return $os;
		//$os->setOs('Windows 10');
		//$os->setOsVersion('Windows 10');
		
	}
	
	public function detect_os(){
		$useragent = $this->useragent->getName();
		foreach ($this->platforms as $key => $val)
			{
				//echo  $useragent;
				if (preg_match('|'.preg_quote($key).'|i', $useragent))
				{
					$this->setOs($val);
					//echo $val;
					if (preg_match('|'.$key.' .*?([a-zA-Z0-9\._]+)|i', $useragent, $match))
				{
					
					$value = isset($match[1]) ? $match[1] : '';
					//echo $value . "<br />";
					if(in_array($value, $this->not_os_versions)){
						//$os->setOsVersion($value);
					//$this->has_os_version = false;
					}
					else {
						$this->setOsVersion($value);
					//$this->set_os_version($value);
					//$this->has_os_version = true;
					//return TRUE;
					}
				}
				break;
					//return true;
				}
			}
		//return false;
		//$os->setOs('Windows 10');
		//$os->setOsVersion('Windows 10');
		
	}
	
	public function setOs($name) {
		$this->name = (string)$name;
		  return $this;
	}
	public function setOsVersion($name) {
		$this->version = (string)$name;
		  return $this;
	}
	
	
	
	public function setOsBit($bit){
		$this->bit = $bit;
		return $this;
	}
	public function getOsBit(){
		if(isset($this->bit))
		return $this->bit ; //. " bits";
		else {
			$this->detect_os_bit();
			return $this->bit ;
		}
	}
	
  
  
}