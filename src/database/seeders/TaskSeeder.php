<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

final class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $demoUser = User::where('email', 'demo@example.com')->firstOrFail();
        $attributes = ['user_id' => $demoUser->id];

        $taskNameList = [
            ['name' => '朝食を作る'],
            ['name' => '散歩する'],
            ['name' => '北海道に旅行する'],
        ];

        Task::factory()
            ->count(3)
            ->created()
            ->sequence(...$taskNameList)
            ->create($attributes);

        $taskNameList = [
            ['name' => '山田さんと会う'],
            ['name' => '動物園に行く'],
            ['name' => '温泉に行く'],
        ];

        Task::factory()
            ->count(3)
            ->undone()
            ->sequence(...$taskNameList)
            ->create($attributes);

        $taskNameList = [
            ['name' => '映画を見る'],
            ['name' => '水族館へ行く'],
            ['name' => 'ゲームをする'],
        ];

        Task::factory()
            ->count(3)
            ->done()
            ->sequence(...$taskNameList)
            ->create($attributes);
    }
}
