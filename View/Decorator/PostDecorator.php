<?php

App::uses("AppDecorator", "View/Decorator");
App::import('Vendor', 'markdown');

class PostDecorator extends AppDecorator {

	/**
	 * Convert the body content to html using the Markdown
	 * library.
	 * 
	 * @access public
	 * @return string
	 */
	public function toHtml() {
		return Markdown($this->raw("content"));
	}

	public function toParsedHtml() {
		$content = $this->toHtml();
		$offset = 0;
		while ($pos = strpos($content, "<pre><code>", $offset)) {
			$addToOffset = 11;
			$matches = array();
			$regex = "/#!(javascript|php|ruby|python|css|html)\n/";
			preg_match($regex, $content, $matches, PREG_OFFSET_CAPTURE, $pos);
			if (!empty($matches) && isset($matches[1])) {
				$lang = $matches[1][0];
				$content = substr_replace($content, 'code data-language="'.$lang.'"', $pos + 6, 4);
				$content = preg_replace($regex, "", $content, 1);
				$addToOffset += (17 + strlen($lang));
			}
			// Find the next match
			$offset = $pos + $addToOffset;
			$pos = strpos($content, "<pre><code>", $offset);
		}
		return $content;
	}

	/**
	 * Takes the post content, converts to html, strips tags and
	 * then shortens to 300 characters.
	 * 
	 * @access public
	 * @return string
	 */
	public function description() {
		return substr(strip_tags($this->toHtml()), 0, 600) . '...';
	}

}