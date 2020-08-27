<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Scriptfunction extends Command
{
    /**
     * Scriptfunction - start a specific function within the "script_functions.php" file in App/Scripts
     *
     * @var string
     */ 
 
    protected $signature = 'scriptfunc {arg : Name of the function to run} {arg2?* : argument }';

    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scriptfunction - start a specific function within the "script_functions.php" file in App//Scripts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        if((strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')){
        
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ds = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? '\\' : '/';
        
        // include the script file to run
        $pathToFolder = base_path('app' . $ds . 'Scripts' . $ds);
        $pathToFolder = base_path('app' . $ds . 'Scripts' . $ds);      //<-- forward slash on server
//      $scriptname = $this->argument('filename') . '.php';
         
        if(!$this->argument('arg')) {
            die('Error - you need to provide the name of the function.');
        }else if($this->argument('arg2')){
            $arg2 = $this->argument('arg2');
        }
         $arg = $this->argument('arg');
          
        require($pathToFolder . 'script_functions.php');
    }
}
