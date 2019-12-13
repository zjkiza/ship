<?php

namespace Tests\Unit;

use App\Models\Craw;
use App\Models\Notification;
use App\Models\Rank;
use App\Models\Read;
use App\Models\Ship;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use DatabaseTransactions;

    private $notification;
    private $ship;
    private $rank;
    private $reads;

    public function setUp(): void
    {
        parent::setUp();

        $this->rank = factory(Rank::class)->create();
        $this->ship = factory(Ship::class)->create();
        $this->notification = factory(Notification::class)->create([
                'rank_id' => $this->rank->id,
                'ship_id' => $this->ship->serial_number,
        ]);

        $user = factory(User::class)->create();
        $crew = factory(Craw::class)->create([
            'user_id' => $user->id,
            'rank_id' => $this->rank->id,
            'ship_id' => $this->ship->serial_number,
        ]);

        $this->reads = factory(Read::class, 2)->create([
            'craw_id' => $crew->id,
            'notification_id' => $this->notification->id,
        ]);
    }

    /** @test */
    public function a_notification_has_a_rank(): void
    {
        $this->assertInstanceOf(Rank::class, $this->notification->rank);
    }

    /** @test */
    public function a_notification_has_input_a_rank_values(): void
    {
        $this->assertEquals(
            $this->rank->toArray(),
            $this->notification->rank->toArray()
        );
    }

    /** @test */
    public function a_notification_has_a_ship(): void
    {
        $this->assertInstanceOf(Ship::class, $this->notification->ship);
    }

    /** @test */
    public function a_notification_has_input_ship_values(): void
    {
        $this->assertEquals(
            $this->ship->toArray(),
            $this->notification->ship->toArray()
        );
    }

    /** @test */
    public function a_notification_has_some_reads(): void
    {
        $this->assertInstanceOf(Read::class, $this->notification->reads[0]);
        $this->assertCount(2, $this->notification->reads);
    }

    /** @test */
    public function a_notification_has_input_reads_value(): void
    {
        $this->assertEquals(
            $this->reads->toArray(),
            $this->notification->reads->toArray()
        );
    }
}
