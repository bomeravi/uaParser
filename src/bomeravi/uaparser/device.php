<?php
namespace Bomeravi\uaParser;

use Bomeravi\uaParser\useragent;

class device {
	private $useragent;
	private $type;//computer, iphone, ipad, tv, blackberry,Mobile, tablet, crawler.
	private $device_details;
	
	private $devices = array(
		'iphone' => 'iPhone', 
        'ipod' => 'iPod', 
        'ipad' => 'iPad', 
        'android' => 'Android Phone', 
        'blackberry' => 'BlackBerry', 
        'webos' => 'Mobile',
		'mobile' => 'Mobile',
		'Tablet' => 'Tablet'
	);

	private $not_device_versions = array(
		
		'Chromium');
	
	public function __construct($useragent = null)
    {
	
        if ($useragent instanceof useragent) {
            $this->useragent = $useragent;
			
        }
		elseif ( is_string($useragent)) {
   
		    $this->useragent = new useragent($useragent);
		} 
		elseif (NULL == $useragent) {
			$this->useragent = new useragent($useragent);
		}
else		{
          throw new InvalidArgumentException($useragent . "is not working");
        }
		$this->detect_device_type();
    }

	public function detect_device_type(){
		$useragent = $this->useragent->getName();
		foreach ($this->devices as $key => $val)
			{
				//echo  $useragent;
				if (preg_match('|'.preg_quote($key).'|i', $useragent))
				{
					$this->setDeviceType($val);
				break;
				}
			}
		
	}
	
	public function setDeviceType($name) {
		$this->type = (string)$name;
		  return $this;

	}
	public function getDeviceType() {
		return $this->type;
	}
	
}