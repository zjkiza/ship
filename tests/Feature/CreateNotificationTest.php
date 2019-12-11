<?php

namespace Tests\Feature;

use App\Models\Notification;
use Illuminate\Foundation\Testing\DatabaseTransactions;
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
}
