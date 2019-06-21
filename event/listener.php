<?php
/**
*
* @package Remove Agreement Extension
* @copyright (c) 2016 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\removeagreement\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use phpbb\template\template;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\template\template */
	protected $template;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string PHP extension */
	protected $phpEx;

	/**
	* Constructor for listener
	*
	* @param \phpbb\template\template	$template	Template object
	* @param string 					$root_path	phpBB root path
	* @param string 					$php_ext	phpBB ext
	*
	* @access public
	*/
	public function __construct(template $template, $root_path, $php_ext)
	{
		$this->template		= $template;
		$this->root_path	= $root_path;
		$this->phpEx		= $php_ext;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'	=> 'remove_agreement',
		);
	}

	/**
	* Remove the agreement
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function remove_agreement($event)
	{
		$this->template->assign_var('U_REGISTER', append_sid("{$this->root_path}ucp.$this->phpEx", 'mode=register&agreed=true'));
	}
}
