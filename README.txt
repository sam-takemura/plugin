=== Plugin Name ===
Contributors: Masahito Takemura
Donate link: https://www.linkedin.com/in/mtakemura/
Tags: comments, spam
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This is the very first Wordpress plugin I have ever created. This is a journal entry plugin, where all your entries are collated all in one place and not mixed with other posts. 

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `journal-maker.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==

= How does it work? =
From the menu select Journal Entry. This will open a list of journal entries. If there are no previous journal entries the list will be empty.

Each Journal entry will create a permalink that can be used to redirect users to the journal entry.