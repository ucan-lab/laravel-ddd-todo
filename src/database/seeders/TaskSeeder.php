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
            ['name' => '歯を磨く'],
            ['name' => '一人で北海道に旅行する'],
        ];

        Task::factory()
            ->count(3)
            ->created()
            ->sequence(...$taskNameList)
            ->create($attributes);

        $taskNameList = [
            ['name' => '一人でディズニーランドに行く'],
            ['name' => '一人で焼肉に行く'],
            ['name' => '一人で温泉旅行に行く'],
        ];

        Task::factory()
            ->count(3)
            ->undone()
            ->sequence(...$taskNameList)
            ->create($attributes);

        $taskNameList = [
            ['name' => '友達と映画を見る'],
            ['name' => '彼女と水族館へ行く'],
            ['name' => '奥さんとゲームをする'],
        ];

        Task::factory()
            ->count(3)
            ->done()
            ->sequence(...$taskNameList)
            ->create($attributes);
    }
}
