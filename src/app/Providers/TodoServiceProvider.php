<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;
use Todo\Application\Boundary\MailSender;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\User\UserRepository;
use Todo\Infra\Domain\Model\ActivityReport\LogActivityReportRepository;
use Todo\Infra\Domain\Model\Task\DbTaskRepository;
use Todo\Infra\Domain\Model\User\DbUserRepository;
use Todo\Infra\Gateway\LaravelMailSender;
use Todo\Infra\Lang\ConcreteUnitOfWork;
use Todo\Infra\Lang\SystemClock;
use Todo\Lang\Clock;
use Todo\Lang\UnitOfWork;

final class TodoServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $bindings = [
        Clock::class => SystemClock::class,
        MailSender::class => LaravelMailSender::class,
        TaskRepository::class => DbTaskRepository::class,
        UserRepository::class => DbUserRepository::class,
        UnitOfWork::class => ConcreteUnitOfWork::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(LogActivityReportRepository::class)
            ->needs(LoggerInterface::class)
            ->give(fn () => Log::channel('activity-report'));
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return array_keys($this->bindings);
    }
}
