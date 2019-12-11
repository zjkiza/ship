<?php

namespace Tests\Feature;

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

    private $user;
    private $ship;
    private $rank;
    private $crew;
    private $notification;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->ship = factory(Ship::class)->create();
        $this->rank = factory(Rank::class)->create();
        $this->crew = factory(Craw::class)->create([
            'user_id' => $this->user->id,
            'rank_id' => $this->rank->id,
            'ship_id' => $this->ship->serial_number,
        ]);
        $this->notification = factory(Notification::class)->create([
            'rank_id' => $this->rank->id,
            'ship_id' => $this->ship->serial_number,
        ]);

        $this->singIn($this->user);
    }

    /** @test */
    public function a_user_can_read_not_read_notification(): void
    {
        $this->get(route('notification.not.read'))
            ->assertStatus(200)
            ->assertSee($this->notification->message);
    }

    /** @test */
    public function a_user_can_read_rad_notification(): void
    {
        factory(Read::class)->create([
            'craw_id' => $this->crew->id,
            'notification_id' => $this->notification->id,
        ]);

        $this->get(route('notification.read'))
            ->assertStatus(200)
            ->assertSee($this->notification->message);
    }
}
