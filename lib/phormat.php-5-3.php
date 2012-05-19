<?php

class phormat {
	
	private $rules = [
		'xxx-xxxx',
		'(xxx) xxx-xxxx',
		'+x (xxx) xxx-xxxx'
	];
	
	function __construct(array $rules = array()) {
		
		if ($rules)
			$this->rules = $rules;
		
		$indexed_rules = array();
		foreach ($this->rules as $rule) {
			$count = substr_count($rule, 'x');
			$indexed_rules[$count] = $rule;
		}
		
		$this->rules = $indexed_rules;
		
	}
	
	function phone($number) {
		
		$ret = $digits = $this->_extract_digits($number);
		$digits_length = strlen($digits);
		
		if (isset($this->rules[$digits_length])) {
			
			$rule = $this->rules[$digits_length];
			for ($i = 0; $i != $digits_length; $i++) {
				$pos = strpos($rule, 'x');
				$rule[$pos] = $digits[$i];
			}
			
			$ret = $rule;
			
		}
		
		return $ret;
		
	}
	
	private function _extract_digits($string) {
		
		$ret = '0';
		
		if (preg_match_all('/(\d+)/', $string, $array))
			$ret = implode('', $array[1]);
		
		return $ret;
		
	}
	
}
