<?php
namespace Bomeravi\uaParser;
use Bomeravi\uaParser\useragent;

class engine {
	private $useragent;
	private $name;
	private $version;
	
	private $engines = array(
	'AppleWebKit' => 'AppleWebKit',
	'Trident' => 'Trident',
'Opera'			=>	'Opera',
	'Mozilla'		=>	'Mozilla',
);
private $not_engine_versions = array(
	'i686',
	'x86_64',
	'Chromium',
	'amd64');
	
	
	public function __construct($useragent = null)
    {
        if ($useragent instanceof useragent) {
		//	echo "11111";
            $this->useragent = $useragent;
			
        } elseif ( is_string($useragent)) {
      
		    $this->useragent = new useragent($useragent);
		} 
		elseif (NULL == $useragent) {
			$this->useragent = new useragent;
		}
else		{
			    throw new InvalidArgumentException($useragent . "is not working");
        }
    }
  
  public function getName()
    {
        if (!isset($this->name)) {
            $this->detect_engine();
        }

        return $this->name;
    }
	
	public function getVersion(){
		 if (!isset($this->name)) {
            $this->detect_engine();
        }

        return $this->version;
	}
	
	
		public  function detect_engine(){
		$useragent = $this->useragent->getName();
		foreach ($this->engines as $key => $val)
			{
				//echo  $useragent;
				if (preg_match('|'.preg_quote($key).'|i', $useragent))
				{
					$this->setEngine($val);
					if (preg_match('|^'.$key.'.*?([A-Za-z0-9\.]+)|i', $useragent, $match))
				{
					
					$value = isset($match[1]) ? $match[1] : '';
					//echo $match . "<br />";
					if(in_array($value, $this->not_engine_versions)){
					}
					else {
						$this->setEngineVersion($value);
					}
				}
				break;
					//return true;
				}
			}
		
	}
	
	
	
	public function setEngine($name) {
		$this->name = (string)$name;
		  return $this;
	}
	
	public function setEngineVersion($name) {
		$this->version = (string)$name;
		  return $this;
	}
	
	public function getUseragent(){
		return $this->useragent->getName();
	}
  
}