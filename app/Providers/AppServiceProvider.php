<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Repositories\BatchRepository;
use App\Repositories\BranchRepository;
use App\Repositories\RoutineRepository;
use App\Repositories\StudentRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\TrainerRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\QuestionRepository;
use App\Repositories\AttendanceRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\TimeScheduleRepository;
use App\Repositories\Interfaces\BatchRepositoryInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Repositories\Interfaces\RoutineRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Repositories\Interfaces\TrainerRepositoryInterface;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\Interfaces\TimeScheduleRepositoryInterface;

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
    $this->app->bind(TrainerRepositoryInterface::class, TrainerRepository::class);
    $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
    $this->app->bind(TimeScheduleRepositoryInterface::class, TimeScheduleRepository::class);
    $this->app->bind(RoutineRepositoryInterface::class, RoutineRepository::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Gate::before(function ($user, $ability) {
      return $user->hasRole('super-admin') ? true : null;
    });

    Paginator::useBootstrapFive();
  }
}
