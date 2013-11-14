<?php
include 'data\DatabaseData.php';

class TestCase extends Illuminate\Foundation\Testing\TestCase
{

    public function setUp()
    {
        parent::setUp();        
        $this->prepareForTests();
    }

    /**
     * Creates the application.
     *
     * @return Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;
        $testEnvironment = 'testing';
        if (isset($_SERVER['USERDOMAIN']) && strpos($_SERVER['USERDOMAIN'], 'PU-'))
        {
            $testEnvironment = 'localhost';
        }
        return require __DIR__ . '/../../bootstrap/start.php';
    }

    private function prepareForTests()
    {
         if (!Session::get('setDb')) 
        {
            Artisan::call('migrate');
            Artisan::call('db:seed');
            //new DatabaseData();
            Session::set('setDb', true);
        }
    }

}
