<?php
/**
 * @package JournalMaker
 */

class JournalMakerActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}