<?php

namespace Tests\Feature;

use App\Http\Livewire\EmitTest;
use Livewire\Livewire;
use Tests\TestCase;

class EmitTestTest extends TestCase
{
    /** @test */
    public function event_is_emitted_but_page_is_not_updated()
    {
        $component = Livewire::test(EmitTest::class)
            ->call('emitEvent');

        $component->assertEmitted('emitted-event');
        // This will fail.
        $component->assertSee('successfully emitted');
    }

    /** @test */
    public function you_can_hack_this_by_checking_for_emit_and_manually_emitting()
    {
        $component = Livewire::test(EmitTest::class)
            ->call('emitEvent');

        // Check to see if it is emitted, and then emit.
        $component->assertEmitted('emitted-event');
        $component->emit('emitted-event');

        // This works
        $component->assertSee('successfully emitted');
    }
}
