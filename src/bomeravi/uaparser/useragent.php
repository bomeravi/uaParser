<?php
namespace Bomeravi\uaParser;

class useragent {
	public $useragent;
	public function __construct($name = null){
	//	echo "it is executed";
	if(null !== $name){
		$this->setName($name);
	}
	else {
		$this->createName();
	}
	
	}
	public function setName($useragent)
  {
	
		$this->useragent = (string) $useragent;
		return $this;
  }
  
   public function getName()
    {
        if (null === $this->useragent) {
            $this->createName();
        }

        return $this->useragent;
    }
	
	public function createName($useragent= ''){
		if($useragent == null){
		$useragent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
		}
			 $this->setName($useragent);
	 return $this;
	}
}