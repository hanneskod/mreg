<?php
/**
 * 
 * This file is part of the Aura project for PHP.
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Aura\Cli;

/**
 * 
 * The CLI equivalent of a page-controller to perform a single action.
 * 
 * @package Aura.Cli
 * 
 */
abstract class AbstractCommand
{
    /**
     * 
     * A Getopt object for the Command; retains the short and long options
     * passed at the command line.
     * 
     * @var Aura\Cli\Getopt
     * 
     */
    protected $getopt;
    
    /**
     * 
     * The option definitions for the Getopt object.
     * 
     * @var array
     * 
     */
    protected $options = array();
    
    /**
     * 
     * Should Getopt be strict about how options are processed?  In strict
     * mode, passing an undefined option will throw an exception; in
     * non-strict, it will not.
     * 
     * @var bool
     * 
     */
    protected $options_strict = Getopt::STRICT;
    
    /**
     * 
     * The positional (numeric) arguments passed at the command line.
     * 
     * @var array
     * 
     */
    protected $params = array();
    
    /**
     * 
     * Constructor.
     * 
     * @param Context $context The command-line context.
     * 
     * @param Stdio $stdio Standard input/output streams.
     * 
     * @param Getopt $getopt An options processor and reader.
     * 
     */
    public function __construct(
        Context       $context,
        Stdio         $stdio,
        Getopt        $getopt
    ) {
        $this->context = $context;
        $this->stdio   = $stdio;
        $this->getopt  = $getopt;
        $this->initGetopt();
        $this->initParams();
    }
    
    /**
     * 
     * Passes the Context arguments to `$getopt`.
     * 
     * @return void
     * 
     */
    protected function initGetopt()
    {
        $this->getopt->init($this->options, $this->options_strict);
        $this->getopt->load($this->context->getArgv());
    }
    
    /**
     * 
     * Loads `$params` from `$getopt`.
     * 
     * @return void
     * 
     */
    protected function initParams()
    {
        $this->params = $this->getopt->getParams();
    }
    
    /**
     * 
     * Executes the Command.  In order, it does these things:
     * 
     * - calls `preExec()`
     * 
     * - calls `preAction()`
     * 
     * - calles `action()`
     * 
     * - calls `postAction()`
     * 
     * - calls `postExec()`
     * 
     * @see action()
     * 
     * @return void
     * 
     */
    public function exec()
    {
        $this->preExec();
        $this->preAction();
        $this->action();
        $this->postAction();
        $this->postExec();
        
        // return terminal output to normal colors
        $this->stdio->out("%n");
        $this->stdio->err("%n");
    }
    
    /**
     * 
     * Runs at the beginning of `exec()` before `preAction()`.
     * 
     * @return void
     * 
     */
    public function preExec()
    {
    }
    
    /**
     * 
     * Runs before `action()` but after `preExec()`.
     * 
     * @return mixed
     * 
     */
    public function preAction()
    {
    }
    
    /**
     * 
     * The main logic for the Command.
     * 
     * @return void
     * 
     */
    abstract protected function action();
    
    /**
     * 
     * Runs after `action()` but before `postExec()`.
     * 
     * @return mixed
     * 
     */
    public function postAction()
    {
    }
    
    /**
     * 
     * Runs at the end of `exec()` after `postAction()`.
     * 
     * @return mixed
     * 
     */
    public function postExec()
    {
    }
}
