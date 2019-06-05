<?php
/**
 * @package JournalMaker
 */

class JournalMakerDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}