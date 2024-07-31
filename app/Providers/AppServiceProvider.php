<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Repositories\BatchRepository;
use App\Repositories\BranchRepository;
use App\Repositories\SubjectRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\QuestionRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\Interfaces\BatchRepositoryInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
    $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
    $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
    $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
    $this->app->bind(BatchRepositoryInterface::class, BatchRepository::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Gate::before(function ($user, $ability) {
      return $user->hasRole('super-admin') ? true : null;
    });
  }
}
