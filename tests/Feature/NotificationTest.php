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

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

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

        $this->be($this->user);
    }

    /** @test */
    public function a_user_can_read_not_read_notification(): void
    {
        $this->get('/notification')
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

        $this->get('/notification/read')
            ->assertStatus(200)
            ->assertSee($this->notification->message);
    }
}
