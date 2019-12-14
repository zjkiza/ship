<?php

namespace Tests\Feature;

use App\Models\Notification;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;

class CreateNotificationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function admin_can_create_new_notification(): void
    {
        $this->singIn();

        $notification = factory(Notification::class)->make();

        $response = $this->post(
            route('admin.notification.store'),
            $notification->toArray()
        );

        $this->get($response->headers->get('Location'))
            ->assertSee($notification->message);
    }

    /** @test */
    public function a_notification_required_a_message(): void
    {
        $this->publishNotification(['message' => null])
            ->assertSessionHasErrors('message');
    }

    /** @test */
    public function a_notification_required_a_rank_id(): void
    {
        $this->publishNotification(['rank_id' => null])
            ->assertSessionHasErrors('rank_id');

        $this->publishNotification(['rank_id' => 999999])
            ->assertSessionHasErrors('rank_id');
    }

    /** @test */
    public function a_notification_required_a_ship_id(): void
    {
        $this->publishNotification(['ship_id' => null])
            ->assertSessionHasErrors('ship_id');

        $this->publishNotification(['ship_id' => 'abcd'])
            ->assertSessionHasErrors('ship_id');
    }

    public function publishNotification(array $attribute): TestResponse
    {
        $this->singIn();

        $notification = factory(Notification::class)->make($attribute);

        return $this
            ->post(route('admin.notification.store'), $notification->toArray());
    }

    /** @test */
    public function guest_may_not_create_notification(): void
    {
        $this->post(route('admin.notification.store'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guest_cannot_see_the_create_notification_page(): void
    {
        $this->get(route('admin.notification.create'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function a_notification_can_be_delete()
    {
        $this->singIn();

        $notification = factory(Notification::class)->create();

        $this->assertDatabaseHas('notifications', $notification->toArray());

        $this->delete(
            route('admin.notification.destroy', ['notification' => $notification]),
            $notification->toArray()
        );

        $this->assertDatabaseMissing('notifications', $notification->toArray());
    }

    /** @test */
    public function guests_cannot_delete_notifications()
    {
        $notification = factory(Notification::class)->create();

        $this->delete(
            route('admin.notification.destroy', ['notification' => $notification]),
            $notification->toArray())
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('notifications', $notification->toArray());
    }
}
