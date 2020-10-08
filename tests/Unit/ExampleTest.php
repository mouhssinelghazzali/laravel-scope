<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Phone;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
       $data = [10,20,30];
       $result = array_sum($data);
       $this->assertEquals(60,$result);
    }

 
}
