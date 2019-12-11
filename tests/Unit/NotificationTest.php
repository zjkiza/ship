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

    public function setUp(): void
    {
        parent::setUp();

        $this->notification = factory(Notification::class)->create();
    }

    /** @test */
    public function a_notification_has_a_user(): void
    {
        $this->assertInstanceOf(Rank::class, $this->notification->rank);
    }

    /** @test */
    public function a_notification_has_a_ship(): void
    {
        $this->assertInstanceOf(Ship::class, $this->notification->ship);
    }
}
