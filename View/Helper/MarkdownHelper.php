<?php

App::import('Vendor', 'Markdown');

class MarkdownHelper extends AppHelper {

	public function parse($text = '') {
		return Markdown($text);
	}

}