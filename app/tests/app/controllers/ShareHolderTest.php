<?php
/**
 * Controller Test: ShareHolderTest
 * Date: 2013-10-31 10:07
 * 
 */
class ShareHolderTest extends TestCase
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
        $response = $this->call('GET', '/share-holder');    
        $this->assertResponseOk();
        $this->assertViewHas('title', 'List Share Holder');
        $this->assertViewHas('params');
        $this->assertViewHas('keywords');
        $this->assertViewHas('results');
        //$this->assertViewHas(1, $response->original['results']->getTotal());
    }
 
    public function testCreate()
    {
        $response = $this->call('GET', '/share-holder/create');
        $this->assertResponseOk();
        $this->assertViewHas('title', 'Create Share Holder');
    }

    public function testStoreSucccess()
    {
        $data = array(
            'share_holder_name' => 'share_holder_name 1383208977',
            'share_holder_address' => 'share_holder_address 1382972466',
            'share_holder_note' => 'share_holder_note 1382702594',
            'share_holder_capital' => '5',
        );
        
        
        $this->call('POST', '/share-holder', $data);
        $this->assertRedirectedToRoute('share-holder.create');
    }

    public function testStoreUnsucccess()
    {
        //with wrong data
        $data = array();
        $this->call('POST', '/share-holder', $data);
        $this->assertRedirectedToRoute('share-holder.create');
        $this->assertSessionHasErrors();
    }
    
    public function testEdit()
    {
        $response = $this->call('GET', '/share-holder/1/edit');
        $this->assertResponseOk();
        $this->assertViewHas('title', 'Edit Share Holder');
    }

    public function testUpdateSuccess()
    {
        $data = array(
            'share_holder_name' => 'share_holder_name 1382831562',
            'share_holder_address' => 'share_holder_address 1383149709',
            'share_holder_note' => 'share_holder_note 1382922645',
            'share_holder_capital' => '1',
        );
        
        
        $this->call('PATCH', '/share-holder/1', $data);
        $this->assertRedirectedToRoute('share-holder.edit', 1);
    }

    public function testUpdateUnSuccess()
    {
        //with wrong data
        $data = array();
        $this->call('PATCH', '/share-holder/1', $data);
        $this->assertRedirectedToRoute('share-holder.edit', 1);
        $this->assertSessionHasErrors();
    }
    
}