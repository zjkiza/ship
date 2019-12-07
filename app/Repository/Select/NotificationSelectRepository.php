<?php

namespace App\Repository\Select;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;

class NotificationSelectRepository
{
    public function getRead(int $rankId, string $shipId, int $crawId): Collection
    {
        return Notification::join('craws', 'craws.rank_id', '=', 'notifications.rank_id')
            ->join('reads', function ($join) {
                $join->on('reads.craw_id', '=', 'craws.id')
                    ->on('reads.notification_id', '=', 'notifications.id');
            })
            ->where('notifications.rank_id', $rankId)
            ->where('notifications.ship_id', $shipId)
            ->where('craws.id', $crawId)
            ->select('notifications.*')
            ->get();
    }

    public function getNotRead(int $rankId, string $shipId, int $crawId): Collection
    {
        return Notification::join('craws', function ($join) {
            $join->on('craws.rank_id', '=', 'notifications.rank_id')
                    ->on('craws.ship_id', '=', 'notifications.ship_id');
        })
            ->where('notifications.rank_id', $rankId)
            ->where('notifications.ship_id', $shipId)
            ->where('craws.id', $crawId)
            ->whereNotIn('notifications.id', static function ($query) use ($crawId) {
                $query->from('reads')
                    ->where('craw_id', $crawId)
                    ->select('notification_id');
            })
            ->select('notifications.*')
            ->get();
    }
}
