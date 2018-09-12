<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Breadcrumbs {
	
	/**
	 * Breadcrumbs stack
     */
	private $breadcrumbs = array();
	 	

	public function __construct()
	{	
		$this->ci =& get_instance();
		// Load config file
		$this->ci->load->config('breadcrumbs');
		// Get breadcrumbs display options
		$this->tag_open = $this->ci->config->item('tag_open');
		$this->tag_close = $this->ci->config->item('tag_close');
		$this->divider = $this->ci->config->item('divider');
		$this->crumb_open = $this->ci->config->item('crumb_open');
		$this->crumb_last_open = $this->ci->config->item('crumb_last_open');
		$this->crumb_close = $this->ci->config->item('crumb_close');
		$this->crumb_divider = $this->ci->config->item('crumb_divider');
		
		log_message('debug', "Breadcrumbs Class Initialized");
	}
	
	// --------------------------------------------------------------------

	/**
	 * Append crumb to stack
	 */		
	function push($page, $href, $base = false)
	{
		// no page or href provided
		if (!$page OR !$href) return;
		
		// Prepend site url
		if($base === false)
		{
			$href = base_url($href);
		}
		else
		{
			$href = site_url($href);
		}
		
		// push breadcrumb
		array_push($this->breadcrumbs, array('page' => $page, 'href' => $href));
	}
	
	// --------------------------------------------------------------------
	
	function unshift($page, $href, $base = false)
	{
		// no crumb provided
		if (!$page OR !$href) return;
		
		// Prepend site url
		if($base === false)
		{
			$href = base_url($href);
		}
		else
		{
			$href = site_url($href);
		}
		
		// add at firts
		array_unshift($this->breadcrumbs, array('page' => $page, 'href' => $href));
	}
	
	// --------------------------------------------------------------------

	/**
	 * Generate breadcrumb
	 */		
	function show()
	{
		if ($this->breadcrumbs) {
		
			// set output variable
			$output = $this->tag_open;
			
			// construct output
			foreach ($this->breadcrumbs as $key => $crumb) {
				$keys = array_keys($this->breadcrumbs);
				if (end($keys) == $key) {
					$output .= $this->crumb_last_open . '<a>' . $crumb['page'] . '</a>' . $this->crumb_close;
				} else {
					$output .= $this->crumb_open.'<a href="' . $crumb['href'] . '">' . $crumb['page'] . '</a> '.$this->crumb_divider.$this->crumb_close;
				}
			}
			
			// return output
			return $output . $this->tag_close . PHP_EOL;
		}
		
		// no crumbs
		return '';
	}

}