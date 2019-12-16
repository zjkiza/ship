<?php

namespace Tests\Unit;

use App\Models\Activity;
use App\Models\Craw;
use App\Models\Notification;
use App\Models\Rank;
use App\Models\Read;
use App\Models\Ship;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RecordsActivityTest extends TestCase
{
    use DatabaseTransactions;

    private $notification;
    private $ship;
    private $rank;
    private $reads;
    private $user;
    private $crew;

    public function setUp(): void
    {
        parent::setUp();

        $this->rank = factory(Rank::class)->create();
        $this->ship = factory(Ship::class)->create();
        $this->notification = factory(Notification::class)->create([
            'rank_id' => $this->rank->id,
            'ship_id' => $this->ship->serial_number,
        ]);

        $this->user = factory(User::class)->create();
        $this->crew = factory(Craw::class)->create([
            'user_id' => $this->user->id,
            'rank_id' => $this->rank->id,
            'ship_id' => $this->ship->serial_number,
        ]);
    }

    /** @test */
    public function it_records_activity_when_a_read_is_create(): void
    {
        $this->singIn($this->user);

        $this->reads = factory(Read::class)->create([
            'craw_id' => $this->crew->id,
            'notification_id' => $this->notification->id,
        ]);

        $this->assertDatabaseHas('activities', [
            'type' => 'created_read',
            'user_id' => $this->user->id,
            'subject_id' => $this->reads->id,
            'subject_type' => Read::class,
        ]);

        $activity = Activity::orderBy('id', 'DESC')->first();

        $this->assertEquals($activity->subject->id, $this->reads->id);
    }
}
