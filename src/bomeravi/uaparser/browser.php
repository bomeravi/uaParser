<?php
namespace Bomeravi\uaParser;
use Bomeravi\uaParser\useragent;

class browser {
	private $useragent;
	private $name;
	private $version;
	private $bit;
	private $major;
	private $minor;
	private $patch;
	
	private $browsers = array(
	'Trident.*?rv' => 'Internet Explorer',  //Trident/7.0; rv:11.0/
	'Edge'			=> 'Edge',
	'OPR'			=> 'Opera',
	'YaBrowser'		=>	'Yandex Browser',
	'Flock'			=> 'Flock',
	'Maxthon'		=> 'Maxthon',
	'MxBrowser'	=> 'Maxthon Browser',
	'Chrome'		=> 'Google Chrome',
	// Opera 10+ always reports Opera/9.80 and appends Version/<real version> to the user agent string
	'Opera.*?Version'	=> 'Opera',
	//'Opera'			=> 'Opera',
	'MSIE'			=> 'Internet Explorer',
	'Internet Explorer'	=> 'Internet Explorer',
	//'Trident\/[0-9] rv'	=> 'Internet Explorer',
	'Shiira'		=> 'Shiira',
	'SeaMonkey'		=> 'SeaMonkey',
	'Firefox'		=> 'Mozilla Firefox',
	'Chimera'		=> 'Chimera',
	'Phoenix'		=> 'Phoenix',
	'Firebird'		=> 'Firebird',
	'Camino'		=> 'Camino',
	'Netscape'		=> 'Netscape',
	'OmniWeb'		=> 'OmniWeb',
	'UCBrowser'		=> 'UC Browser',
	'Epiphany'		=> 'Epiphany',
	'Arora'			=> 'Arora',
	'Safari'		=> 'Safari',
	'Konqueror'		=> 'Konqueror',
	'icab'			=> 'iCab',
	'Lynx'			=> 'Lynx',
	'Links'			=> 'Links',
	'hotjava'		=> 'HotJava',
	'amaya'			=> 'Amaya',
	'IBrowse'		=> 'IBrowse',
	'Ubuntu'		=> 'Ubuntu Web Browser',
	'Namoroka'		=> 'Namoroka'
);
private $not_browser_versions = array(
	'i686',
	'x86_64',
	'Chromium',
	'amd64');
	private $browser_bits = array(
	'WOW64' => '64'
	);
	
	private $browser_default_bits = array();
	
	
	
	
	public function __construct($useragent = null)
    {
			
        if ($useragent instanceof useragent) {
		//	echo "11111";
          $this->useragent = $useragent;
			
        } elseif ( is_string($useragent)) {
      
		    $this->useragent = new useragent($useragent);
		} 
		elseif (NULL == $useragent) {
			 $this->useragent = new useragent($useragent);
		}
		else{
		
            throw new InvalidArgumentException($useragent . "is not working");
        }
		$this->detect_browser();
		$this->detect_browser_bit();
    }
  
  public function getName()
    {
        if (!isset($this->name)) {
            $this->detect_browser();
        }

        return $this->name;
    }
	
	public function getVersion(){
		 if (!isset($this->version)) {
            $this->detect_browser();
        }

        return $this->version;
	}
	
	public function detect_browser(){
		$useragent = $this->useragent->getName();
		foreach ($this->browsers as $key => $val)
			{
				//echo  $useragent;
				if (preg_match('|'.$key.'|i', $useragent))
				//if (preg_match('|'.preg_quote($key).'|i', $useragent))
				{
					$this->setBrowser($val);
				
					if (preg_match('/'.$key.'.*?([A-Za-z0-9\.]+)/i', $useragent, $match))
				{
					
					$value = isset($match[1]) ? $match[1] : '';
					//echo $match . "<br />";
					if(in_array($value, $this->not_browser_versions)){

					}
					else {
						$this->setBrowserVersion($value);
					
					}
				}
				
				break;
					//return true;
				}
				if(strpos($useragent, 'Trident/7.0; rv:11.0')){
					$this->setBrowser('Internet Explorer');
					$this->setBrowserVersion('11.0');
				}
			}
		
	}
	
		public function detect_browser_bit(){
	$useragent = $this->useragent->getName();
		if (is_array($this->browser_bits) && count($this->browser_bits) > 0)
		{
			foreach ($this->browser_bits as $key => $val)
			{
				if (preg_match('|'.$key.'.*?([0-9\.]+)?|i',$useragent, $match))
				{
				$this->setBrowserBit($val);
				//	$this->_set_mobile();
					return TRUE;
				}
			}
			
		}
		if (is_array($this->browser_default_bits) && count($this->browser_default_bits) > 0)
		{
			foreach ($this->browser_default_bits as $key => $val)
			{
				if (preg_match('|'.$key.'|i',$useragent))
				{
				$this->setBrowserBit($val);
				//	$this->_set_mobile();
					return TRUE;
				}
			}
			
		}

		return FALSE;
	}
	
	public function setBrowser($name) {
		$this->name = (string)$name;
		  return $this;
	}
	public function setBrowserVersion($name) {
		$this->version = (string)$name;
		  return $this;
	}
	public function setBrowserBit($bit){
		$this->bit = $bit;
		return $this;
	}
	public function getBit(){
		if(isset($this->bit))
		return $this->bit ; //. " bits";
		else {
			$this->detect_browser_bit();
			return $this->bit ;
		}
	}
	
	public function getUseragent(){
		return $this->useragent->getName();
	}
  
  
}