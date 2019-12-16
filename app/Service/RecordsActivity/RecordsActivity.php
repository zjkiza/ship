<?php

namespace App\Service\RecordsActivity;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use ReflectionClass;
use ReflectionException;

trait RecordsActivity
{
    protected static function bootRecordsActivity(): void
    {
        if (auth()->guest()) {
            return;
        }

        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(static function ($model) use ($event) {
                /* @var RecordsActivity $model */
                $model->recordActivity($event);
            });
        }
    }

    /**
     * @return array
     */
    protected static function getActivitiesToRecord(): array
    {
        return ['created', 'updated', 'deleted'];
    }

    /**
     * @param string $event
     *
     * @throws ReflectionException
     */
    protected function recordActivity(string $event): void
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event),
        ]);
    }

    public function activity(): MorphMany
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    /**
     * @param string $event
     *
     * @throws ReflectionException
     *
     * @return string
     */
    protected function getActivityType(string $event): string
    {
        return sprintf('%s_%s',
            $event,
            strtolower((new ReflectionClass($this))->getShortName())
        );
    }
}
