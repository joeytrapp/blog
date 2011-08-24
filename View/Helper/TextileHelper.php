<?php

App::import('Vendor', 'Textile');

class TextileHelper extends AppHelper {

	public $settings = array(
        'lite' => '',
        'encode' => '',
        'noimage' => '',
        'strict' => '',
        'rel' => '',
    );
	
	public $Textile;

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @param mixed $config
	 * @return void
	 */
	public function __construct($config) {
		$this->Textile = new Textile();
		$this->settings = Set::merge($this->settings, $config);
	}
	
	/**
	 * parse textile string
	 *
	 * @param string $text
	 * @param array  $options
	 * @return string
	 */
	public function parse($text = '', $options = array()) {
	    extract(Set::merge($this->settings, $options));
	    return $this->Textile->TextileThis($text, $lite, $encode, $noimage, $strict, $rel);
	}

}