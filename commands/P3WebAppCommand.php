<?php
/**
 * WebAppCommand class file.
 *
 */

/**
 * WebAppCommand creates an Yii Web application at the specified location.
 *
 * Based on Yii Web App Command, modified for Phundament
 *
 */
Yii::import('system.cli.commands.*');
class P3WebAppCommand extends CConsoleCommand
{
    public $path;
    public $interactive = true;
    public $defaultAction = 'create';

	private $_rootPath;
	private $_frameworkPath;

	public function getHelp()
	{
		return <<<EOD
USAGE
  yiic p3webapp <action> <app-path> [<vcs>]

DESCRIPTION
  This command generates a Phundament Web Application at the specified location.

PARAMETERS
 * action: required, eg. 'create' to create a new web application .
 * app-path: required, the directory where the new application will be created.
   If the directory does not exist, it will be created. After the application
   is created, please make sure the directory can be accessed by Web users.
 * vcs: optional, version control system you're going to use in the new project.
   Application generator will create all needed files to the specified VCS
   (such as .gitignore, .gitkeep, etc.). Possible values: git, hg. Do not
   use this argument if you're going to create VCS files yourself.

EOD;
	}

	/**
	 * Execute the action.
	 * @param array $args command line parameters specific for this command
	 */
	public function actionCreate($args)
	{
		$vcs=false;
		if(isset($args[1]))
		{
			if($args[1]!='git' && $args[1]!='hg')
				$this->usageError('Unsupported VCS specified. Currently only git and hg supported.');
			$vcs=$args[1];
		}

        if(isset($args[2]))
        {
            if($args[2]=='git' && $args[1]!='hg')
                $this->usageError('Unsupported VCS specified. Currently only git and hg supported.');
            $vcs=$args[1];
        }

        if($this->path) {
            $args[0] = $this->path;
        }
		if(!isset($args[0]))
			$this->usageError('the Web application location is not specified.');
			
		$path=strtr($args[0],'/\\',DIRECTORY_SEPARATOR);
		if(strpos($path,DIRECTORY_SEPARATOR)===false)
			$path='.'.DIRECTORY_SEPARATOR.$path;
		if(basename($path)=='..')
			$path.=DIRECTORY_SEPARATOR.'.';
		$dir=rtrim(realpath(dirname($path)),'\\/');
		if($dir===false || !is_dir($dir))
			$this->usageError("The directory '$path' is not valid. Please make sure the parent directory exists.");
		if(basename($path)==='.')
			$this->_rootPath=$path=$dir;
		else
			$this->_rootPath=$path=$dir.DIRECTORY_SEPARATOR.basename($path);

		if($this->confirm("Create a Web application under '$path'?", !$this->interactive) )
		{
			$sourceDir=$this->getSourceDir();
			if($sourceDir===false)
				die("\nUnable to locate the source directory.\n");
			$ignoreFiles=array();
			$renameMap=array();
			switch($vcs)
			{
				case 'git':
					$renameMap=array('git.gitignore'=>'.gitignore','git.gitkeep'=>'.gitkeep'); // move with rename git files
					$ignoreFiles=array('hg.hgignore','hg.hgkeep'); // ignore only hg files
					break;
				case 'hg':
					$renameMap=array('hg.hgignore'=>'.hgignore','hg.hgkeep'=>'.hgkeep'); // move with rename hg files
					$ignoreFiles=array('git.gitignore','git.gitkeep'); // ignore only git files
					break;
				default:
					// no files for renaming
					$ignoreFiles=array('git.gitignore','git.gitkeep','hg.hgignore','hg.hgkeep'); // ignore both git and hg files
					break;
			}
			$list=$this->buildFileList($sourceDir,$path,'',$ignoreFiles,$renameMap);
			$this->addFileModificationCallbacks($list);
			$this->copyFiles($list);
			echo "\nSetting permissions";
			$this->setPermissions($path);
			echo "\nYour application has been created successfully under {$path}.\n";
		}
	}

	/**
	 * Adjusts created application file and directory permissions
	 *
	 * @param string $targetDir path to created application
	 */
	protected function setPermissions($targetDir)
	{
		@mkdir($targetDir.'/www/assets');
		@chmod($targetDir.'/www/assets',0777);
		@mkdir($targetDir.'/runtime');
		@chmod($targetDir.'/runtime',0777);
		@mkdir($targetDir.'/data');
		@chmod($targetDir.'/data',0777);
		@chmod($targetDir.'/data/default.db',0777);
		@chmod($targetDir.'/yiic',0755);
	}

	/**
	 * @return string path to application bootstrap source files
	 */
	protected function getSourceDir()
	{
		return realpath(dirname(__FILE__).'/views/p3-webapp');
	}

	/**
	 * Adds callbacks that will modify source files
	 *
	 * @param array $fileList
	 */
	protected function addFileModificationCallbacks(&$fileList)
	{
        $fileList['www/index.php']['callback']=array($this,'generateIndex');
		$fileList['www/index-test.php']['callback']=array($this,'generateIndex');
		$fileList['tests/bootstrap.php']['callback']=array($this,'generateTestBoostrap');
		$fileList['yiic.php']['callback']=array($this,'generateYiic');
	}

	/**
	 * Inserts path to framework's yii.php into application's index.php
	 *
	 * @param string $source source file path
	 * @param array $params
	 * @return string modified source file content
	 */
	public function generateIndex($source,$params)
	{
		$content=file_get_contents($source);
		$yii=realpath(Yii::getPathOfAlias('system').'/yii.php');
		$yii=$this->getRelativePath($yii,$this->_rootPath.DIRECTORY_SEPARATOR.'www'.DIRECTORY_SEPARATOR.'index.php');
		$yii=str_replace('\\','\\\\',$yii);
		return preg_replace('/\$yii\s*=(.*?);/',"\$yii=$yii;",$content);
	}

	/**
	 * Inserts path to framework's yiit.php into application's index-test.php
	 *
	 * @param string $source source file path
	 * @param array $params
	 * @return string modified source file content
	 */
	public function generateTestBoostrap($source,$params)
	{
		$content=file_get_contents($source);
		$yii=realpath(Yii::getPathOfAlias('system').'/yiit.php');
		$yii=$this->getRelativePath($yii,$this->_rootPath.DIRECTORY_SEPARATOR.'tests'.DIRECTORY_SEPARATOR.'bootstrap.php');
		$yii=str_replace('\\','\\\\',$yii);
		return preg_replace('/\$yiit\s*=(.*?);/',"\$yiit=$yii;",$content);
	}

	/**
	 * Inserts path to framework's yiic.php into application's yiic.php
	 *
	 * @param string $source source file path
	 * @param array $params
	 * @return string modified source file content
	 */
	public function generateYiic($source,$params)
	{
		$content=file_get_contents($source);
		$yiic=realpath(Yii::getPathOfAlias('system').'/yiic.php');
		$yiic=$this->getRelativePath($yiic,$this->_rootPath.DIRECTORY_SEPARATOR.'yiic.php');
		$yiic=str_replace('\\','\\\\',$yiic);
		return preg_replace('/\$yiic\s*=(.*?);/',"\$yiic=$yiic;",$content);
	}

	/**
	 * Returns variant of $path1 relative to $path2
	 *
	 * @param string $path1
	 * @param string $path2
	 * @return string $path1 relative to $path2
	 */
	protected function getRelativePath($path1,$path2)
	{
		$segs1=explode(DIRECTORY_SEPARATOR,$path1);
		$segs2=explode(DIRECTORY_SEPARATOR,$path2);
		$n1=count($segs1);
		$n2=count($segs2);

		for($i=0;$i<$n1 && $i<$n2;++$i)
		{
			if($segs1[$i]!==$segs2[$i])
				break;
		}

		if($i===0)
			return "'".$path1."'";
		$up='';
		for($j=$i;$j<$n2-1;++$j)
			$up.='/..';
		for(;$i<$n1-1;++$i)
			$up.='/'.$segs1[$i];

		return 'dirname(__FILE__).\''.$up.'/'.basename($path1).'\'';
	}

    public function confirm($message,$default=false)
    {
        if ($this->interactive == false) {
            return $default;
        }
        return parent::confirm($message, $default);
    }
}