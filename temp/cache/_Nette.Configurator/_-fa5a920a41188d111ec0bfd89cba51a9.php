<?php //netteCache[01]003312a:2:{s:4:"time";s:21:"0.93138100 1374620764";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkFiles";}i:1;a:52:{i:0;s:32:"/var/www/cms/app/CMS/config.neon";i:1;s:38:"/var/www/cms/app/CMS/config.local.neon";i:2;s:33:"/var/www/cms/app/Menu/config.neon";i:3;s:33:"/var/www/cms/app/Page/config.neon";i:4;s:54:"/var/www/cms/libs/Nette/DI/Extensions/PhpExtension.php";i:5;s:60:"/var/www/cms/libs/Nette/DI/Extensions/ConstantsExtension.php";i:6;s:56:"/var/www/cms/libs/Nette/DI/Extensions/NetteExtension.php";i:7;s:61:"/var/www/cms/libs/Nette/DI/Extensions/ExtensionsExtension.php";i:8;s:41:"/var/www/cms/libs/Nette/common/Object.php";i:9;s:55:"/var/www/cms/libs/Nette/DI/Extensions/NetteAccessor.php";i:10;s:53:"/var/www/cms/libs/Nette/Caching/Storages/IJournal.php";i:11;s:56:"/var/www/cms/libs/Nette/Caching/Storages/FileJournal.php";i:12;s:44:"/var/www/cms/libs/Nette/Caching/IStorage.php";i:13;s:56:"/var/www/cms/libs/Nette/Caching/Storages/FileStorage.php";i:14;s:47:"/var/www/cms/libs/Nette/Http/RequestFactory.php";i:15;s:41:"/var/www/cms/libs/Nette/Http/IRequest.php";i:16;s:40:"/var/www/cms/libs/Nette/Http/Request.php";i:17;s:42:"/var/www/cms/libs/Nette/Http/IResponse.php";i:18;s:41:"/var/www/cms/libs/Nette/Http/Response.php";i:19;s:40:"/var/www/cms/libs/Nette/Http/Context.php";i:20;s:40:"/var/www/cms/libs/Nette/Http/Session.php";i:21;s:49:"/var/www/cms/libs/Nette/Security/IUserStorage.php";i:22;s:44:"/var/www/cms/libs/Nette/Http/UserStorage.php";i:23;s:41:"/var/www/cms/libs/Nette/Security/User.php";i:24;s:51:"/var/www/cms/libs/Nette/Application/Application.php";i:25;s:57:"/var/www/cms/libs/Nette/Application/IPresenterFactory.php";i:26;s:56:"/var/www/cms/libs/Nette/Application/PresenterFactory.php";i:27;s:44:"/var/www/cms/libs/Nette/common/ArrayList.php";i:28;s:47:"/var/www/cms/libs/Nette/Application/IRouter.php";i:29;s:57:"/var/www/cms/libs/Nette/Application/Routers/RouteList.php";i:30;s:40:"/var/www/cms/libs/Nette/Mail/IMailer.php";i:31;s:47:"/var/www/cms/libs/Nette/Mail/SendmailMailer.php";i:32;s:47:"/var/www/cms/libs/Nette/Database/Connection.php";i:33;s:53:"/var/www/cms/libs/Nette/Database/SelectionFactory.php";i:34;s:53:"/var/www/cms/app/Menu/Components/Menu/MenuFactory.php";i:35;s:45:"/var/www/cms/app/CMS/Model/BaseRepository.php";i:36;s:46:"/var/www/cms/app/Page/Model/PageRepository.php";i:37;s:46:"/var/www/cms/app/Menu/Model/NodeRepository.php";i:38;s:46:"/var/www/cms/app/Menu/Model/ListRepository.php";i:39;s:40:"/var/www/cms/libs/Nette/DI/Container.php";i:40;s:64:"/var/www/cms/libs/Nette/Application/Diagnostics/RoutingPanel.php";i:41;s:53:"/var/www/cms/app/Menu/Components/Menu/MenuControl.php";i:42;s:38:"/var/www/cms/libs/Nette/Forms/Form.php";i:43;s:41:"/var/www/cms/libs/Nette/Caching/Cache.php";i:44;s:70:"/var/www/cms/libs/Nette/Database/Reflection/ConventionalReflection.php";i:45;s:44:"/var/www/cms/libs/Nette/Database/Helpers.php";i:46;s:40:"/var/www/cms/libs/Nette/Latte/Engine.php";i:47;s:40:"/var/www/cms/libs/Nette/Mail/Message.php";i:48;s:51:"/var/www/cms/libs/Nette/Templating/FileTemplate.php";i:49;s:47:"/var/www/cms/libs/Nette/Templating/Template.php";i:50;s:58:"/var/www/cms/libs/Nette/Security/Diagnostics/UserPanel.php";i:51;s:57:"/var/www/cms/libs/Nette/DI/Diagnostics/ContainerPanel.php";}i:2;i:1374620764;}}}?><?php
// source: /var/www/cms/app/CMS/config.neon 

/**
 * @property Nette\Application\Application $application
 * @property Nette\Caching\Storages\FileStorage $cacheStorage
 * @property Nette\DI\Container $container
 * @property Nette\Http\Request $httpRequest
 * @property Nette\Http\Response $httpResponse
 * @property CMS\Menu\Component\MenuFactory $menuFactory
 * @property Nette\DI\Extensions\NetteAccessor $nette
 * @property CMS\Page\Model\PageRepository $pageRepository
 * @property Nette\Application\Routers\RouteList $router
 * @property Nette\Http\Session $session
 * @property Nette\Security\User $user
 */
class SystemContainer extends Nette\DI\Container
{

	protected $meta = array(
		'types' => array(
			'nette\\object' => array(
				'nette',
				'nette.cacheJournal',
				'cacheStorage',
				'nette.httpRequestFactory',
				'httpRequest',
				'httpResponse',
				'nette.httpContext',
				'session',
				'nette.userStorage',
				'user',
				'application',
				'nette.presenterFactory',
				'router',
				'nette.mailer',
				'nette.database.default',
				'nette.database.default.selectionFactory',
				'pageRepository',
				'24_CMS_Menu_Model_NodeRepository',
				'25_CMS_Menu_Model_ListRepository',
				'container',
			),
			'nette\\di\\extensions\\netteaccessor' => array('nette'),
			'nette\\caching\\storages\\ijournal' => array('nette.cacheJournal'),
			'nette\\caching\\storages\\filejournal' => array('nette.cacheJournal'),
			'nette\\caching\\istorage' => array('cacheStorage'),
			'nette\\caching\\storages\\filestorage' => array('cacheStorage'),
			'nette\\http\\requestfactory' => array('nette.httpRequestFactory'),
			'nette\\http\\irequest' => array('httpRequest'),
			'nette\\http\\request' => array('httpRequest'),
			'nette\\http\\iresponse' => array('httpResponse'),
			'nette\\http\\response' => array('httpResponse'),
			'nette\\http\\context' => array('nette.httpContext'),
			'nette\\http\\session' => array('session'),
			'nette\\security\\iuserstorage' => array('nette.userStorage'),
			'nette\\http\\userstorage' => array('nette.userStorage'),
			'nette\\security\\user' => array('user'),
			'nette\\application\\application' => array('application'),
			'nette\\application\\ipresenterfactory' => array('nette.presenterFactory'),
			'nette\\application\\presenterfactory' => array('nette.presenterFactory'),
			'nette\\arraylist' => array('router'),
			'traversable' => array('router'),
			'iteratoraggregate' => array('router'),
			'countable' => array('router'),
			'arrayaccess' => array('router'),
			'nette\\application\\irouter' => array('router'),
			'nette\\application\\routers\\routelist' => array('router'),
			'nette\\mail\\imailer' => array('nette.mailer'),
			'nette\\mail\\sendmailmailer' => array('nette.mailer'),
			'nette\\database\\connection' => array('nette.database.default'),
			'nette\\database\\selectionfactory' => array(
				'nette.database.default.selectionFactory',
			),
			'cms\\menu\\component\\menufactory' => array('menuFactory'),
			'cms\\model\\baserepository' => array(
				'pageRepository',
				'24_CMS_Menu_Model_NodeRepository',
				'25_CMS_Menu_Model_ListRepository',
			),
			'cms\\page\\model\\pagerepository' => array('pageRepository'),
			'cms\\menu\\model\\noderepository' => array('24_CMS_Menu_Model_NodeRepository'),
			'cms\\menu\\model\\listrepository' => array('25_CMS_Menu_Model_ListRepository'),
			'nette\\di\\container' => array('container'),
		),
	);


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => '/var/www/cms/app',
			'wwwDir' => '/var/www/cms/www',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array(
				'class' => 'SystemContainer',
				'parent' => 'Nette\\DI\\Container',
				'accessors' => TRUE,
			),
			'tempDir' => '/var/www/cms/app/../temp',
			'cmsDir' => '/var/www/cms/app/CMS',
			'modulesDir' => '/var/www/cms/app/modules',
			'jsDir' => '/var/www/cms/app/CMS/templates/js',
			'cssDir' => '/var/www/cms/app/CMS/templates/css',
			'javascript' => array(
				'modernizr' => '/var/www/cms/app/CMS/templates/js/custom.modernizr.js',
				'jQuery' => '/var/www/cms/app/CMS/templates/js/jquery-2.0.3.min.js',
				'foundation' => '/var/www/cms/app/CMS/templates/js/foundation.min.js',
				'cms' => '/var/www/cms/app/CMS/templates/js/cms.js',
				'liveForm' => '/var/www/cms/app/CMS/templates/js/live-form-validation.js',
			),
			'css' => array(
				'normalize' => '/var/www/cms/app/CMS/templates/css/normalize.css',
				'foundation' => '/var/www/cms/app/CMS/templates/css/foundation.min.css',
				'fontAwesome' => '/var/www/cms/app/CMS/templates/css/font-awesome.min.css',
				'cms' => '/var/www/cms/app/CMS/templates/css/cms.css',
			),
		));
	}


	/**
	 * @return CMS\Menu\Model\NodeRepository
	 */
	public function createService__24_CMS_Menu_Model_NodeRepository()
	{
		$service = new CMS\Menu\Model\NodeRepository($this->getService('nette.database.default.selectionFactory'));
		return $service;
	}


	/**
	 * @return CMS\Menu\Model\ListRepository
	 */
	public function createService__25_CMS_Menu_Model_ListRepository()
	{
		$service = new CMS\Menu\Model\ListRepository($this->getService('nette.database.default.selectionFactory'));
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication()
	{
		$service = new Nette\Application\Application($this->getService('nette.presenterFactory'), $this->getService('router'), $this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->catchExceptions = FALSE;
		$service->errorPresenter = 'Error';
		!headers_sent() && header('X-Powered-By: Nette Framework');;
		Nette\Application\Diagnostics\RoutingPanel::initializePanel($service);
		Nette\Diagnostics\Debugger::getBar()->addPanel(new Nette\Application\Diagnostics\RoutingPanel($this->getService('router'), $this->getService('httpRequest')));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileStorage
	 */
	public function createServiceCacheStorage()
	{
		$service = new Nette\Caching\Storages\FileStorage('/var/www/cms/app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttpRequest()
	{
		$service = $this->getService('nette.httpRequestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'httpRequest\', value returned by factory is not Nette\\Http\\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttpResponse()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return CMS\Menu\Component\MenuFactory
	 */
	public function createServiceMenuFactory()
	{
		return new CMS_Menu_Component_MenuFactoryImpl_menuFactory($this);
	}


	/**
	 * @return Nette\DI\Extensions\NetteAccessor
	 */
	public function createServiceNette()
	{
		$service = new Nette\DI\Extensions\NetteAccessor($this);
		return $service;
	}


	/**
	 * @return Nette\Forms\Form
	 */
	public function createServiceNette__basicForm()
	{
		$service = new Nette\Forms\Form;
		return $service;
	}


	/**
	 * @return Nette\Caching\Cache
	 */
	public function createServiceNette__cache($namespace = NULL)
	{
		$service = new Nette\Caching\Cache($this->getService('cacheStorage'), $namespace);
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileJournal
	 */
	public function createServiceNette__cacheJournal()
	{
		$service = new Nette\Caching\Storages\FileJournal('/var/www/cms/app/../temp');
		return $service;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceNette__database__default()
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=cms', 'root', 'root', NULL);
		$service->setSelectionFactory(new Nette\Database\SelectionFactory($service, new Nette\Database\Reflection\ConventionalReflection, $this->getService('cacheStorage')));
		Nette\Diagnostics\Debugger::getBlueScreen()->addPanel('Nette\\Database\\Diagnostics\\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, TRUE, 'default');
		return $service;
	}


	/**
	 * @return Nette\Database\SelectionFactory
	 */
	public function createServiceNette__database__default__selectionFactory()
	{
		$service = $this->getService('nette.database.default')->getSelectionFactory();
		if (!$service instanceof Nette\Database\SelectionFactory) {
			throw new Nette\UnexpectedValueException('Unable to create service \'nette.database.default.selectionFactory\', value returned by factory is not Nette\\Database\\SelectionFactory type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceNette__httpContext()
	{
		$service = new Nette\Http\Context($this->getService('httpRequest'), $this->getService('httpResponse'));
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceNette__httpRequestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy(array());
		return $service;
	}


	/**
	 * @return Nette\Latte\Engine
	 */
	public function createServiceNette__latte()
	{
		$service = new Nette\Latte\Engine;
		return $service;
	}


	/**
	 * @return Nette\Mail\Message
	 */
	public function createServiceNette__mail()
	{
		$service = new Nette\Mail\Message;
		$service->setMailer($this->getService('nette.mailer'));
		return $service;
	}


	/**
	 * @return Nette\Mail\SendmailMailer
	 */
	public function createServiceNette__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Nette\Application\PresenterFactory
	 */
	public function createServiceNette__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory('/var/www/cms/app', $this);
		$service->setMapping(array('*' => 'CMS\\*\\*Presenter'));
		return $service;
	}


	/**
	 * @return Nette\Templating\FileTemplate
	 */
	public function createServiceNette__template()
	{
		$service = new Nette\Templating\FileTemplate;
		$service->registerFilter($this->createServiceNette__latte());
		$service->registerHelperLoader('Nette\\Templating\\Helpers::loader');
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\PhpFileStorage
	 */
	public function createServiceNette__templateCacheStorage()
	{
		$service = new Nette\Caching\Storages\PhpFileStorage('/var/www/cms/app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Nette\Http\UserStorage
	 */
	public function createServiceNette__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session'));
		return $service;
	}


	/**
	 * @return CMS\Page\Model\PageRepository
	 */
	public function createServicePageRepository()
	{
		$service = new CMS\Page\Model\PageRepository($this->getService('nette.database.default.selectionFactory'), $this->getService('menuFactory'));
		return $service;
	}


	/**
	 * @return Nette\Application\Routers\RouteList
	 */
	public function createServiceRouter()
	{
		$service = new Nette\Application\Routers\RouteList;
		$service[] = new Nette\Application\Routers\Route('<id .*>-page', array(
			'module' => 'Page',
			'presenter' => 'Page',
			'action' => 'view',
			'id' => array(
				'filterIn' => array(
					$this->getService('pageRepository'),
					'filterIn',
				),
				'filterOut' => array(
					$this->getService('pageRepository'),
					'filterOut',
				),
			),
		));;
		$service[] = new Nette\Application\Routers\Route('<module>[/<presenter>][/<action>][/<id>]', array(
			'module' => 'Front',
			'presenter' => 'Home',
			'action' => 'view',
		));;
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession()
	{
		$service = new Nette\Http\Session($this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->setExpiration('14 days');
		Nette\Diagnostics\Debugger::getBar()->addPanel(new Nette\Http\Diagnostics\SessionPanel);
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceUser()
	{
		$service = new Nette\Security\User($this->getService('nette.userStorage'));
		Nette\Diagnostics\Debugger::getBar()->addPanel(new Nette\Security\Diagnostics\UserPanel($service));
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		Nette\Diagnostics\Debugger::$strictMode = TRUE;
		Nette\Diagnostics\Debugger::getBar()->addPanel(new Nette\DI\Diagnostics\ContainerPanel($this));
		Nette\Caching\Storages\FileStorage::$useDirectories = TRUE;
		$this->getService("session")->exists() && $this->getService("session")->start();
		header('X-Frame-Options: SAMEORIGIN');
	}

}



final class CMS_Menu_Component_MenuFactoryImpl_menuFactory implements CMS\Menu\Component\MenuFactory
{

	private $container;


	public function __construct(Nette\DI\Container $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new CMS\Menu\Component\MenuControl($this->container->getService('25_CMS_Menu_Model_ListRepository'), $this->container->getService('24_CMS_Menu_Model_NodeRepository'));
		return $service;
	}

}
