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

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
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
			'core.ucp_register_requests_after' => 'remove_agreement',
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
		$agreed = $event['agreed'];
		$agreed = true;
		$event->offsetSet('agreed', $agreed);
	}
}
