<?php
namespace BM\Demo\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "BM.Demo".               *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class StandardController extends \TYPO3\Flow\Mvc\Controller\ActionController {

	/**
	 * @Flow\InjectConfiguration(package="TYPO3.Flow", type="Settings", path="persistence.backendOptions")
	 * @var array $flowSettings
	 */
	protected $flowSettings;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Cache\CacheManager
	 */
	protected $cacheManager;

	/**
	 * @param string $foo
	 * @return void
	 */
	public function indexAction($foo = NULL) {
		$this->view->assign('foos', array(
			'bar', $this->flowSettings['driver']
		));
	}

	public function helloAction() {
		switch ($this->request->getFormat()) {
			case 'html':
				return 'Hello World!';
			case 'json':
				return 'JSON World!';
			default:
				return 'something else?';
		}
	}

}