<?php
namespace jf;
/**
 * Entry point for a jFramework Application.
 * This has functions for handling main application events and objects for handling framework tasks.
 * @version 3.0
 */
class BaseFrontController
{
	
	protected function GenerateRequestID()
	{
		$this->RequestID = "";
		for($i = 0; $i < 10; ++ $i)
			$this->RequestID .= mt_rand ( 0, 9 );
		return $this->RequestID;
	}

	
	function __construct()
	{
		if (!jf::$App)
			jf::$App = $this;
		else
			throw new Exception("FrontController already instantiated.");
		$this->GenerateRequestID();
	}
	
	/**
	 * Loads necessary files to initialize jframework.
	 */
	protected function LoadCoreModules()
	{
		jf::import ( "jf/config/main" ); #jf pre-config

		jf::import ("jf/model/core/autoload");
		Autoload::Register();
				
		jf::import ( "jf/config/constants" );

		
		jf::$ErrorHandler = new ErrorHandler ();
		
		//TODO: 
		jf::import ( "jf/model/functions" ); //convenient function helpers
		
		jf::import ( "jf/model/namespace/public/all" ); //global namespace names
	
	}
	/**
	 * load application specific configurations
	 */
	protected function LoadApplicationConfiguration()
	{
		//Application specific config
		jf::import ( "config/application" );
	}
	
	/**
	 * Loads necessary jframework libraries, which provide most of the functionality of framework 
	 * 
	 */
	Protected function LoadLibraries()
	{
		jf::$Profiler=new Profiler();
		
		jf::$Log = new LogManager ();
		
		jf::$User = new UserManager ();
		
		jf::$Session = new SessionManager ();
		
		jf::$Options = new SettingManager ();
		
		jf::$Security = new SecurityManager ();
		
		jf::$RBAC = new RBACManager ();
		
		jf::$Services = new ServiceManager ();

	}
	

	static $IndexPage="main"; //default page
	/**
	 * Handles a whole web request to this jFramework Application
	 *
	 */
	public function Start($Request)
	{
		jf::$Request=$Request;

		$this->LoadCoreModules (); //core modules

		$this->LoadApplicationConfiguration ();

		$this->LoadLibraries ();

		$this->Started = true;
		
		return $this->Run ();

	}
	
	/**
	 * After loading jFramework and libraries, use this function to run a request type
	 * @param $Request
	 * @param $RequestType
	 */
	public function Run($Request = null)
	{
		if (! $this->Started)
		{
			throw new Exception( "You should start jFramework before trying to run a request" );
			return false;
		}
		if ($Request === null)
			$Request = jf::$Request;
		
		$Parts=explode("/",$Request);
		$Type=array_shift($Parts);

		$isFile = array_key_exists ( $Type, FileLauncher::$StaticContentPrefix );
		if ($Type == "app") 
			return new ApplicationLauncher( $Request );
		elseif ($isFile) 
			return new FileLauncher($Request);
		elseif ($Type == "service") 
			return new ServiceLauncher($Request);
		elseif ($Type == "sys") 
			return new SystemLauncher($Request);
		elseif ($Type == "test") 
			return new TestLauncher( $Request );
		else //if jFramework receives an unknown type of request, it assumes application type
		{
			if (!$Request) $Request=self::$IndexPage;
			$Request = "app/" . $Request;
			return new ApplicationLauncher ($Request);
		}
	}

}
class FrontController extends BaseFrontController
{
	

	static function GetSingleton()
	{
		if (FrontController::$singleton === null)
			FrontController::$singleton = new FrontController ();
		return FrontController::$singleton;
	}
	private static $singleton = null;
}
