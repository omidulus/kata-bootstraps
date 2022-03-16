<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\Kata;

require __DIR__ . '/../vendor/autoload.php';

class KataTest extends TestCase
{

    public function testThat100LinesArePrinted()
    {
        $kata = new Kata();

        ob_start();
        $kata->doWork();
        $output = ob_get_clean();

        $this->assertNotSame(false, $output);

        $outputAsArray = explode("\n", $output);
//        var_export($outputAsArray);
        $this->assertCount(100, $outputAsArray);
    }

}
