<?php

namespace Opscale\NovaWidgets\Tests;

use PHPUnit\Framework\Attributes\Test;

class ToolControllerTest extends TestCase
{
    #[Test]
    public function it_can_return_a_response()
    {
        $this
            ->get('nova-vendor/opscale-co/nova-widgets/test-case')
            ->assertStatus(403);
    }
}
