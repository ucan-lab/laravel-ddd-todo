<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Todo\Domain\Model\Task\Status;

final class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(10),
            'status' => $this->faker->randomElement(array_column(Status::cases(), 'value')),
            'due_date' => $this->faker->dateTimeBetween('-1 year'),
            'post_pone_count' => $this->faker->numberBetween(0, 3),
        ];
    }

    /**
     * 新しいタスクが作成されたデータ
     */
    public function created(): Factory
    {
        return $this->state(fn () => [
            'status' => Status::Undone->value,
            'due_date' => $this->faker->dateTimeBetween('now', '+2 week')->format('Y-m-d'),
            'post_pone_count' => 0,
        ]);
    }

    /**
     * タスクが未完了のデータ
     */
    public function undone(): Factory
    {
        return $this->state(fn () => [
            'status' => Status::Undone->value,
            'due_date' => $this->faker->dateTimeBetween('now', '+2 week')->format('Y-m-d'),
        ]);
    }

    /**
     * タスクが完了されたデータ
     */
    public function done(): Factory
    {
        return $this->state(fn () => [
            'status' => Status::Done->value,
        ]);
    }
}
