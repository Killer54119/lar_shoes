<?php
/**
 * Controller Test: SellerInvoiceTest
 * Date: 2013-10-31 10:07
 * 
 */
class SellerInvoiceTest extends TestCase
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
        $response = $this->call('GET', '/seller-invoice');    
        $this->assertResponseOk();
        $this->assertViewHas('title', 'List Seller Invoice');
        $this->assertViewHas('params');
        $this->assertViewHas('keywords');
        $this->assertViewHas('results');
        //$this->assertViewHas(1, $response->original['results']->getTotal());
    }
 
    public function testCreate()
    {
        $response = $this->call('GET', '/seller-invoice/create');
        $this->assertResponseOk();
        $this->assertViewHas('title', 'Create Seller Invoice');
    }

    public function testStoreSucccess()
    {
        $data = array(
            'seller_id' => '1',
            'quality' => '5',
            'cost_price' => '5',
            'selling_price' => '2',
            'profits' => '3',
            'payment' => '2',
            'debt_total' => '1',
            'invoice_note' => 'invoice_note 1382711463',
        );
        
        
        $this->call('POST', '/seller-invoice', $data);
        $this->assertRedirectedToRoute('seller-invoice.create');
    }

    public function testStoreUnsucccess()
    {
        //with wrong data
        $data = array();
        $this->call('POST', '/seller-invoice', $data);
        $this->assertRedirectedToRoute('seller-invoice.create');
        $this->assertSessionHasErrors();
    }
    
    public function testEdit()
    {
        $response = $this->call('GET', '/seller-invoice/1/edit');
        $this->assertResponseOk();
        $this->assertViewHas('title', 'Edit Seller Invoice');
    }

    public function testUpdateSuccess()
    {
        $data = array(
            'seller_id' => '4',
            'quality' => '1',
            'cost_price' => '5',
            'selling_price' => '3',
            'profits' => '3',
            'payment' => '4',
            'debt_total' => '3',
            'invoice_note' => 'invoice_note 1383101467',
        );
        
        
        $this->call('PATCH', '/seller-invoice/1', $data);
        $this->assertRedirectedToRoute('seller-invoice.edit', 1);
    }

    public function testUpdateUnSuccess()
    {
        //with wrong data
        $data = array();
        $this->call('PATCH', '/seller-invoice/1', $data);
        $this->assertRedirectedToRoute('seller-invoice.edit', 1);
        $this->assertSessionHasErrors();
    }
    
}