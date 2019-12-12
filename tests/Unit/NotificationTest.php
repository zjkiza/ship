<?php

namespace Tests\Unit;

use App\Models\Notification;
use App\Models\Rank;
use App\Models\Ship;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use DatabaseTransactions;

    private $notification;
    private $ship;
    /** @var Rank */
    private $rank;

    public function setUp(): void
    {
        parent::setUp();

        $this->rank = factory(Rank::class)->create();
        $this->ship = factory(Ship::class)->create();
        $this->notification = factory(Notification::class)->create([
                'rank_id' => $this->rank->id,
                'ship_id' => $this->ship->serial_number,
        ]);
    }

    /** @test */
    public function a_notification_has_a_rank(): void
    {
        $this->assertInstanceOf(Rank::class, $this->notification->rank);
    }

    /** @test */
    public function a_notification_has_a_rank_values(): void
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
    public function a_notification_has_a_ship_values(): void
    {
        $this->assertEquals(
            $this->ship->toArray(),
            $this->notification->ship->toArray()
        );
    }
}
