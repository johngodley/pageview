<?php
/*
Plugin Name: Page View
Plugin URI: http://urbangiraffe.com/plugins/pageview/
Description: Allows the insertion of code to display an external webpage within an iframe, along with a title and description.  The tag to insert the code is: <code>&lt;!-- pageview url title description --&gt;</code>
Version: 1.4.1
Author: John Godley
Author URI: http://urbangiraffe.com

1.2   - Old version
1.3   - Update to allow templated HTML.  Allow spaces in title when using quotes.  Strip <p>
1.4.0 - Include CSS by default
1.4.1 - Change tag so it's no longer a comment

*/

include (dirname (__FILE__).'/plugin.php');

class PageView extends PageView_Plugin
{
	function PageView ()
	{
		$this->register_plugin ('pageview', __FILE__);
		
		$this->add_filter ('the_content');
		$this->add_action ('wp_head');
	}
	
	function wp_head ()
	{
		if (file_exists (dirname (__FILE__).'/pageview.css'))
		{
		?>
		<link rel="stylesheet" href="<?php echo $this->url () ?>/pageview.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<?php
		}
	}
	
	function replace ($matches)
	{
		return $this->capture ('pageview', array ('url' => $matches[1], 'title' => trim ($matches[2], '"'), 'description' => $matches[3]));
	}

	function the_content ($text)
	{
	  return preg_replace_callback ("@(?:<p>\s*)?\[pageview (.*?) (\w*|\".*?\") (.*?)\](?:\s*</p>)?@", array (&$this, 'replace'), $text);
	}
}

$pageview = new PageView;
?>
