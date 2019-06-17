<?php

namespace tests\unit\models;

use app\models\Partner;

class PartnerTest extends \Codeception\Test\Unit
{
    public function testFindPartnerById()
    {
        expect_that($partner = Partner::findOne(1));
        expect($partner->name)->equals('Partner 1');

        expect_not(Partner::findOne(100000));
    }

    public function testCreatePartner()
    {
        $name = 'Partner (test)';
        $partner = new Partner([
            'name' => $name,
            'type' => Partner::TYPE_CLIENT,
        ]);

        expect_that($partner->save());

        return $partner;
    }

    /**
     * @depends testCreatePartner
     */
    public function testUpdatePartnerWWW(Partner $partner)
    {
        $partner->www = 'www.google.com';
        expect_that($partner->save());
    }

    /**
     * @depends testCreatePartner
     */
    public function testDeletePartner(Partner $partner)
    {
        $id = $partner->id;
        $partner->delete();

        expect_not(Partner::findOne($id));
    }
}
