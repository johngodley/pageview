<?php
/*
Plugin Name: Page View
Plugin URI: http://urbangiraffe.com/plugins/pageview/
Description: Allows the insertion of code to display an external webpage within an iframe, along with a title and description.  The tag to insert the code is: <code>[pageview url "title" description]</code>
Version: 1.4.4
Author: John Godley
Author URI: http://urbangiraffe.com
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
		$tmp = strpos ($matches[1], ' ');
		if ($tmp)
		{
			// Because the regex is such a nuisance
			$url  = substr ($matches[1], 0, $tmp);
			$rest = substr ($matches[1], strlen ($url));
			
			$title       = '';
			$description = '';
			
			if (strpos ($rest, '"') !== false || strpos ($rest, '&#8220;') !== false)
			{
				$start = strpos ($rest, '"');
				if ($start === false)
					$start = strpos ($rest, '&#8220;') + 7;
					
				$end = strpos ($rest, '"', $start + 1);
				if ($end === false)
					$end = strpos ($rest, '&#8221;', $start + 1);
					
				$title       = substr ($rest, $start, $end);
				$description = substr ($rest, $end);
				
				$title       = trim (str_replace ('&#8221;', '', $title));
				$description = trim (str_replace ('&#8221;', '', $description));
			}
			else
			{
				$parts = array_values (array_filter (explode (' ', $rest)));
				$title = $parts[0];
				
				unset ($parts[0]);
				$description = implode (' ', $parts);
			}

			$title = trim ($title, '"');
			$title = trim ($title);
			$description = trim ($description, '"');
			$description = trim ($description);
			
			return $this->capture ('pageview', array ('url' => $url, 'title' => trim ($title, '"'), 'description' => $description));
		}
		
		return '';
	}

	function the_content ($text)
	{
	  return preg_replace_callback ("@(?:<p>\s*)?\[pageview\s*(.*?)\](?:\s*</p>)?@", array (&$this, 'replace'), $text);
	}
}

$pageview = new PageView;
?>
