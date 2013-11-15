<?php
/**
 * Controller Test: SellerTest
 * Date: 2013-10-31 10:07
 * 
 */
class SellerTest extends TestCase
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
        $response = $this->call('GET', '/seller');    
        $this->assertResponseOk();
        $this->assertViewHas('title', 'List Seller');
        $this->assertViewHas('params');
        $this->assertViewHas('keywords');
        $this->assertViewHas('results');
        //$this->assertViewHas(1, $response->original['results']->getTotal());
    }
 
    public function testCreate()
    {
        $response = $this->call('GET', '/seller/create');
        $this->assertResponseOk();
        $this->assertViewHas('title', 'Create Seller');
    }

    public function testStoreSucccess()
    {
        $data = array(
            'seller_name' => 'seller_name 1382614444',
            'seller_address' => 'seller_address 1382974621',
            'seller_note' => 'seller_note 1383033222',
            'paid_total' => '5',
            'debt_total' => '4',
        );
        
        
        $this->call('POST', '/seller', $data);
        $this->assertRedirectedToRoute('seller.create');
    }

    public function testStoreUnsucccess()
    {
        //with wrong data
        $data = array();
        $this->call('POST', '/seller', $data);
        $this->assertRedirectedToRoute('seller.create');
        $this->assertSessionHasErrors();
    }
    
    public function testEdit()
    {
        $response = $this->call('GET', '/seller/1/edit');
        $this->assertResponseOk();
        $this->assertViewHas('title', 'Edit Seller');
    }

    public function testUpdateSuccess()
    {
        $data = array(
            'seller_name' => 'seller_name 1382855994',
            'seller_address' => 'seller_address 1382718278',
            'seller_note' => 'seller_note 1382812274',
            'paid_total' => '3',
            'debt_total' => '1',
        );
        
        
        $this->call('PATCH', '/seller/1', $data);
        $this->assertRedirectedToRoute('seller.edit', 1);
    }

    public function testUpdateUnSuccess()
    {
        //with wrong data
        $data = array();
        $this->call('PATCH', '/seller/1', $data);
        $this->assertRedirectedToRoute('seller.edit', 1);
        $this->assertSessionHasErrors();
    }
    
}