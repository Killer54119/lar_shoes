<?php
/**
 * Controller Test: ShareHolderCostTest
 * Date: 2013-10-31 10:07
 * 
 */
class ShareHolderCostTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        \Mockery::close();
    }
    
    public function testIndex()
    {
        $response = $this->call('GET', '/share-holder-cost');    
        $this->assertResponseOk();
        $this->assertViewHas('title', 'List Share Holder Cost');
        $this->assertViewHas('params');
        $this->assertViewHas('keywords');
        $this->assertViewHas('results');
        //$this->assertViewHas(1, $response->original['results']->getTotal());
    }
 
    public function testCreate()
    {
        $response = $this->call('GET', '/share-holder-cost/create');
        $this->assertResponseOk();
        $this->assertViewHas('title', 'Create Share Holder Cost');
    }

    public function testStoreSucccess()
    {
        $data = array(
            'cost_for' => 'cost_for 1382785641',
            'cost' => '3',
        );
        
        
        $this->call('POST', '/share-holder-cost', $data);
        $this->assertRedirectedToRoute('share-holder-cost.create');
    }

    public function testStoreUnsucccess()
    {
        //with wrong data
        $data = array();
        $this->call('POST', '/share-holder-cost', $data);
        $this->assertRedirectedToRoute('share-holder-cost.create');
        $this->assertSessionHasErrors();
    }
    
    public function testEdit()
    {
        $response = $this->call('GET', '/share-holder-cost/1/edit');
        $this->assertResponseOk();
        $this->assertViewHas('title', 'Edit Share Holder Cost');
    }

    public function testUpdateSuccess()
    {
        $data = array(
            'cost_for' => 'cost_for 1383122228',
            'cost' => '2',
        );
        
        
        $this->call('PATCH', '/share-holder-cost/1', $data);
        $this->assertRedirectedToRoute('share-holder-cost.edit', 1);
    }

    public function testUpdateUnSuccess()
    {
        //with wrong data
        $data = array();
        $this->call('PATCH', '/share-holder-cost/1', $data);
        $this->assertRedirectedToRoute('share-holder-cost.edit', 1);
        $this->assertSessionHasErrors();
    }
    
}