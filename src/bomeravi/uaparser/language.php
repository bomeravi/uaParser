<?php
namespace Bomeravi\uaParser;
use Bomeravi\uaParser\useragent;

class language {
	public $useragent;
	private $name;
	private $accept_languages = array();
	
	
	private $languages = array(
	'af' => 'Afrikaans',
	'sq' => 'Albanian',
	'am' => 'Amharic',
	'ar-dz' => 'Arabic (Algeria)',
	'ar-bh' => 'Arabic (Bahrain)',
	'ar-eg' => 'Arabic (Egypt)',
	'ar-iq' => 'Arabic (Iraq)',
	'ar-jo' => 'Arabic (Jordan)',
	'ar-kw' => 'Arabic (Kuwait)',
	'ar-lb' => 'Arabic (Lebanon)',
	'ar-ly' => 'Arabic (Libya)',
	'ar-ma' => 'Arabic (Morocco)',
	'ar-om' => 'Arabic (Oman)',
	'ar-qa' => 'Arabic (Qatar)',
	'ar-sa' => 'Arabic (Saudi Arabia)',
	'ar-sy' => 'Arabic (Syria)',
	'ar-tn' => 'Arabic (Tunisia)',
	'ar-ae' => 'Arabic (U.A.E.)',
	'ar-ye' => 'Arabic (Yemen)',
	'ar' => 'Arabic',
	'hy' => 'Armenian',
	'as' => 'Assamese',
	'az' => 'Azeri',
	'eu' => 'Basque',
	'be' => 'Belarusian',
	'bn' => 'Bengali',
	'bs' => 'Bosnian',
	'bg' => 'Bulgarian',
	'my' => 'Burmese',
	'ca' => 'Catalan',
	'zh-cn' => 'Chinese (China)',
	'zh-hk' => 'Chinese (Hong Kong SAR)',
	'zh-mo' => 'Chinese (Macau SAR)',
	'zh-sg' => 'Chinese (Singapore)',
	'zh-tw' => 'Chinese (Taiwan)',
	'zh' => 'Chinese',
	'hr' => 'Croatian',
	'cs' => 'Czech',
	'da' => 'Danish',
	'div' => 'Divehi',
	'nl' => 'Dutch (Netherlands)',
	'nl-be' => 'Dutch (Belgium)',
	'en-au' => 'English (Australia)',
	'en-bz' => 'English (Belize)',
	'en-ca' => 'English (Canada)',
	'en-cb' => 'English (Caribbean)',
	'en-in' => 'English (India)',
	'en-ie' => 'English (Ireland)',
	'en-jm' => 'English (Jamaica)',
	'en-nz' => 'English (New Zealand)',
	'en-ph' => 'English (Philippines)',
	'en-za' => 'English (South Africa)',
	'en-tt' => 'English (Trinidad)',
	'en-gb' => 'English (United Kingdom)',
	'en-us' => 'English (United States)',
	'en-zw' => 'English (Zimbabwe)',
	'en' => 'English',
	'us' => 'English (United States)',
	'et' => 'Estonian',
	'fo' => 'Faeroese',
	'fa' => 'Farsi',
	'fi' => 'Finnish',
	'fr-be' => 'French (Belgium)',
	'fr-ca' => 'French (Canada)',
	'fr-lu' => 'French (Luxembourg)',
	'fr-mc' => 'French (Monaco)',
	'fr-ch' => 'French (Switzerland)',
	'fr' => 'French (France)',
	'mk' => 'FYRO Macedonian',
	'gd' => 'Gaelic',
	'ka' => 'Georgian',
	'de-at' => 'German (Austria)',
	'de-li' => 'German (Liechtenstein)',
	'de-lu' => 'German (Luxembourg)',
	'de-ch' => 'German (Switzerland)',
	'de' => 'German (Germany)',
	'el' => 'Greek',
	'gn' => 'Guarani (Paraguay)',
	'gu' => 'Gujarati',
	'he' => 'Hebrew',
	'hi' => 'Hindi',
	'hu' => 'Hungarian',
	'is' => 'Icelandic',
	'id' => 'Indonesian',
	'it-ch' => 'Italian (Switzerland)',
	'it' => 'Italian (Italy)',
	'ja' => 'Japanese',
	'kn' => 'Kannada',
	'ks' => 'Kashmiri',
	'kk' => 'Kazakh',
	'km' => 'Khmer',
	'kok' => 'Konkani',
	'ko' => 'Korean',
	'kz' => 'Kyrgyz',
	'lo' => 'Lao',
	'la' => 'Latin',
	'lv' => 'Latvian',
	'lt' => 'Lithuanian',
	'ms-bn' => 'Malay (Brunei)',
	'ms-my' => 'Malay (Malaysia)',
	'ms' => 'Malay',
	'ml' => 'Malayalam',
	'mt' => 'Maltese',
	'mi' => 'Maori',
	'mr' => 'Marathi',
	'mn' => 'Mongolian (Cyrillic)',
	'ne' => 'Nepali (India)',
	'nb-no' => 'Norwegian (Bokmal)',
	'nn-no' => 'Norwegian (Nynorsk)',
	'no' => 'Norwegian (Bokmal)',
	'or' => 'Oriya',
	'pl' => 'Polish',
	'pt-br' => 'Portuguese (Brazil)',
	'pt' => 'Portuguese (Portugal)',
	'pa' => 'Punjabi',
	'rm' => 'Rhaeto-Romanic',
	'ro-md' => 'Romanian (Moldova)',
	'ro' => 'Romanian',
	'ru-md' => 'Russian (Moldova)',
	'ru' => 'Russian',
	'sa' => 'Sanskrit',
	'sr' => 'Serbian',
	'sd' => 'Sindhi',
	'si' => 'Sinhala',
	'sk' => 'Slovak',
	'ls' => 'Slovenian',
	'so' => 'Somali',
	'sb' => 'Sorbian',
	'es-ar' => 'Spanish (Argentina)',
	'es-bo' => 'Spanish (Bolivia)',
	'es-cl' => 'Spanish (Chile)',
	'es-co' => 'Spanish (Colombia)',
	'es-cr' => 'Spanish (Costa Rica)',
	'es-do' => 'Spanish (Dominican Republic)',
	'es-ec' => 'Spanish (Ecuador)',
	'es-sv' => 'Spanish (El Salvador)',
	'es-gt' => 'Spanish (Guatemala)',
	'es-hn' => 'Spanish (Honduras)',
	'es-mx' => 'Spanish (Mexico)',
	'es-ni' => 'Spanish (Nicaragua)',
	'es-pa' => 'Spanish (Panama)',
	'es-py' => 'Spanish (Paraguay)',
	'es-pe' => 'Spanish (Peru)',
	'es-pr' => 'Spanish (Puerto Rico)',
	'es-us' => 'Spanish (United States)',
	'es-uy' => 'Spanish (Uruguay)',
	'es-ve' => 'Spanish (Venezuela)',
	'es' => 'Spanish (Traditional Sort)',
	'sx' => 'Sutu',
	'sw' => 'Swahili',
	'sv-fi' => 'Swedish (Finland)',
	'sv' => 'Swedish',
	'syr' => 'Syriac',
	'tg' => 'Tajik',
	'ta' => 'Tamil',
	'tt' => 'Tatar',
	'te' => 'Telugu',
	'th' => 'Thai',
	'bo' => 'Tibetan',
	'ts' => 'Tsonga',
	'tn' => 'Tswana',
	'tr' => 'Turkish',
	'tk' => 'Turkmen',
	'uk' => 'Ukrainian',
	'ur' => 'Urdu',
	'uz' => 'Uzbek',
	'vi' => 'Vietnamese',
	'cy' => 'Welsh',
	'xh' => 'Xhosa',
	'yi' => 'Yiddish',
	'zu' => 'Zulu'
);
private $not_languages = array(
	'i686',
	'x86_64',
	'Chromium',
	'amd64');
	
	
	public function __construct($useragent = null)
    {
			//var_dump($useragent);
		//echo "OS Class initialized $useragent <br />";
		//var_dump($useragent instanceof useragent);
        if ($useragent instanceof useragent) {
		//	echo "11111";
            $this->useragent = $useragent;
			
        } elseif ( is_string($useragent)) {
      
		    $this->useragent = new useragent($useragent);
		} 
		elseif (NULL == $useragent) {
			$this->useragent = new useragent($useragent);
		}
else		{
			//echo "44";
		//	var_dump($useragent);
        //    throw new InvalidArgumentException($useragent . "is not working");
        }
		
		$this->detect_language();
		$this->check_languages();
    }
  
  public function getName()
    {
        if (!isset($this->name)) {
         
        }
		return '';

        return $this->name;
    }
	
	public function detect_language(){
		$useragent = $this->useragent->getName();
		//echo $useragent;
		foreach ($this->languages as $key => $val)
			{
				//echo  $useragent;
				if (preg_match('|'.$key.'|i', $useragent))
				//if (preg_match('|'.preg_quote($key).'|i', $useragent))
				{
					
					$this->setLanguage($val);
				
				}
				
				return true;
			}
		return false;
		
		
	}
	
	public static function detect($useragent=null){
		$language = new language($useragent);
		$useragent = $language->useragent->getName();
		//echo $useragent;
		foreach ($language->languages as $key => $val)
			{
				//echo  $useragent;
				if (preg_match('|'.$key.'|i', $useragent))
				//if (preg_match('|'.preg_quote($key).'|i', $useragent))
				{
					$language->setLanguage($val);
				return $language;
				}
				
				
				}
		return false;
	}
	public function check_languages(){
		
		$languages_header = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : 'en_US';
		$languages_header = explode(',', $languages_header);
		$all_languages_eval = array();
		 
		foreach($languages_header as $language_header){
		  $language_name = preg_replace('/([^;]+);.*$/', '${1}', $language_header); //extract actuall language string
		 
		  $language_significance = preg_replace('/^[^q]*q=([^\,]+)*$/', '${1}', $language_header);      //extract evaluation as string
		  $language_significance = is_numeric($language_significance) ? floatval($language_significance) : 1.0; //parse evaluation, if no q=__ (first language is like "1"), then we will use 1.0
		 
		  $all_languages_eval[ $language_name ] = $language_significance;
		}
		 
		array_multisort($all_languages_eval, SORT_DESC , SORT_NATURAL);//SORT_DESC: higher-value is on top (vs. SORT_ASC).
		 $this->accept_languages = $all_languages_eval;
	}
	
	public function setLanguage($name) {
		$this->name = (string)$name;
		  return $this;
	}
	
	public function setUseragent(useragent $useragent){
		//var_dump($useragent);
		$this->useragent =  $useragent;
		return $this;
	}
	
	public function getAcceptLanguages(){
		return $this->accept_languages;
	}
	
	public function getUseragent()
    {
		//var_dump($this->useragent);
        return $this->useragent;
    }
	
	public function getFullName($lang){
		foreach($this->languages as $key => $value){
			if($key == strtolower($lang)){
				return $value;
			}
		}
		return $lang;
	}
	
  
  
}