<?php

namespace tests\unit\models;

use app\models\Sale;

class SaleTest extends \Codeception\Test\Unit
{
    public function testFindSaleById()
    {
        expect_that($sale = Sale::findOne(1));
        expect($sale->name)->equals('Sale #1');

        expect_not(Sale::findOne(10000));
    }

    public function testCreateSale()
    {
        $name = 'Sale (test)';
        $sale = new Sale([
            'name' => $name,
            'created_at' => time(),
            'start_at' => time(),
            'end_at' => time() + 3600 * 60 * 60,
            'close_at' => 0,
            'number' => 'N1',
        ]);

        expect_that($sale->save());

        return $sale;
    }

    /**
     * @depends testCreateSale
     */
    public function testUpdateSaleNumber(Sale $sale)
    {
        $sale->number = 'N99';
        expect_that($sale->save());
    }

    /**
     * @depends testCreateSale
     */
    public function testDeleteSale(Sale $sale)
    {
        $id = $sale->id;
        $sale->delete();

        expect_not(Sale::findOne($id));
    }
}
