<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\GoalUser;
use App\Models\AdminGoal;
use Illuminate\Http\Request;
use App\Models\GoalUserTarget;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminReportController extends Controller
{

    // public function index(Request $request)
    // {
    //     $currentDate = Carbon::now();

    //     if (isset($request->dateRange) || isset($request->completionPercent)) {
    //         $dateRange = explode(' to ', $request->dateRange);
    //         $date_from = Carbon::parse(trim($dateRange[0]))->format('Y-m-d');
    //         $date_to = Carbon::parse(trim($dateRange[1]))->format('Y-m-d');

    //         $completionPercent = intval($request->completionPercent);

    //         $reports = AdminGoal::where('end_date', '<', $currentDate->format('Y-m-d'))
    //             ->orWhere('status', '=', 0)
    //             ->when(
    //                 $request->dateRange,
    //                 function (Builder $builder) use ($date_from, $date_to) {
    //                     $builder->whereBetween(
    //                         DB::raw('DATE(end_date)'),
    //                         [$date_from, $date_to]
    //                     );
    //                 }
    //             )
    //             ->get();

    //         // Filter reports based on completion percentage
    //         $filteredReports = [];
    //         foreach ($reports as $report) {
    //             $completedPercentage = $report->stats()['completed_percentage'];
    //             if ($completedPercentage <= $completionPercent) {
    //                 $filteredReports[] = $report;
    //             }
    //         }

    //         // Create a paginator manually for the filtered reports
    //         $perPage = 6;
    //         $currentPage = Paginator::resolveCurrentPage();
    //         $currentItems = array_slice($filteredReports, ($currentPage - 1) * $perPage, $perPage);
    //         $paginator = new LengthAwarePaginator($currentItems, count($filteredReports), $perPage);
    //         $paginator->setPath(route('admin.report')); // Set the pagination path

    //         $reports = $paginator;
    //     } else {
    //         $reports = AdminGoal::where('end_date', '<', $currentDate->format('Y-m-d'))
    //             ->orWhere('status', '=', 0)
    //             ->paginate(6);
    //     }

    //     return view('admin.Admin-report', compact('reports'));
    // }

    // public function index(Request $request)
    // {
    //     $currentDate = Carbon::now();

    //     if ($request->filled('dateRange') && $request->filled('completionPercent')) {
    //         $dateRange = explode(' to ', $request->input('dateRange'));
    //         $date_from = Carbon::parse(trim($dateRange[0]))->format('Y-m-d');
    //         $date_to = Carbon::parse(trim($dateRange[1]))->format('Y-m-d');

    //         // dd($date_from, $date_to);

    //         $completionPercent = intval($request->input('completionPercent'));

    //         $query = AdminGoal::where('end_date', '<', $currentDate->format('Y-m-d'))
    //             ->orWhere('status', '=', 0);

    //         if ($request->filled('dateRange')) {
    //             $query->whereBetween(DB::raw('end_date'), [$date_from, $date_to]);
    //         }

    //         $reports = $query->get();

    //         // Filter reports based on completion percentage
    //         $filteredReports = [];
    //         foreach ($reports as $report) {
    //             $completedPercentage = $report->stats()['completed_percentage'];
    //             if ($completedPercentage <= $completionPercent) {
    //                 $filteredReports[] = $report;
    //             }
    //         }

    //         // Create a paginator manually for the filtered reports
    //         $perPage = 6;
    //         $currentPage = Paginator::resolveCurrentPage();
    //         $currentItems = array_slice($filteredReports, ($currentPage - 1) * $perPage, $perPage);
    //         $paginator = new LengthAwarePaginator($currentItems, count($filteredReports), $perPage);
    //         $paginator->setPath(route('admin.report')); // Set the pagination path

    //         $reports = $paginator;
    //     } elseif ($request->filled('completionPercent') && !$request->filled('dateRange')) {
    //         $reports = AdminGoal::all();
    //         // Filter reports based on completion percentage
    //         $filteredReports = [];
    //         $completionPercent = intval($request->input('completionPercent'));
    //         foreach ($reports as $report) {
    //             $completedPercentage = $report->stats()['completed_percentage'];
    //             if ($completedPercentage <= $completionPercent) {
    //                 $filteredReports[] = $report;
    //             }
    //         }
    //     } elseif ($request->filled('dateRange') && !$request->filled('completionPercent')) {
    //         $dateRange = explode(' to ', $request->dateRange);
    //         $date_from = Carbon::parse(trim($dateRange[0]))->format('Y-m-d');
    //         $date_to = Carbon::parse(trim($dateRange[1]))->format('Y-m-d');

    //         $reports = AdminGoal::where('end_date', '<', $currentDate->format('Y-m-d'))
    //             ->orWhere('status', '=', 0)
    //             ->when(
    //                 $request->dateRange,
    //                 function (Builder $builder) use ($date_from, $date_to) {
    //                     $builder->whereBetween(
    //                         DB::raw('DATE(end_date)'),
    //                         [$date_from, $date_to]
    //                     );
    //                 }
    //             )
    //             ->paginate(6);
    //     } else {
    //         $reports = AdminGoal::where('end_date', '<', $currentDate->format('Y-m-d'))
    //             ->orWhere('status', '=', 0)
    //             ->paginate(6);
    //     }

    //     return view('admin.Admin-report', compact('reports'));
    // }

    public function index(Request $request)
    {
        $currentDate = Carbon::now();
        $query = AdminGoal::where('status', '=', 0);

        if ($request->filled('dateRange')) {
            $dateRange = explode(' to ', $request->input('dateRange'));
            $date_from = Carbon::parse(trim($dateRange[0]))->format('Y-m-d');
            $date_to = Carbon::parse(trim($dateRange[1]))->format('Y-m-d');
            $query->whereBetween(DB::raw('end_date'), [$date_from, $date_to]);
        }

        if ($request->filled('completionPercent')) {
            $completionPercent = intval($request->input('completionPercent'));
            $reports = $query->get();

            // Filter reports based on completion percentage
            $filteredReports = $reports->filter(function ($report) use ($completionPercent) {
                $completedPercentage = $report->stats()['completed_percentage'];
                return $completedPercentage <= $completionPercent;
            });

            $perPage = 6;
            $paginator = new LengthAwarePaginator(
                $filteredReports->forPage(Paginator::resolveCurrentPage(), $perPage),
                $filteredReports->count(),
                $perPage
            );
            $paginator->setPath(route('admin.report')); // Set the pagination path

            $reports = $paginator;
        } else {
            $query->orWhere('end_date', '<', $currentDate->format('Y-m-d'));
            $reports = $query->paginate(5);
        }

        return view('admin.Admin-report', compact('reports'));
    }




    public function reportInfo($id)
    {
        $currentDate = Carbon::now();
        $upcomingGoal = AdminGoal::where('id', $id)->first();

        // Retrieve goalUsers and their related users with first_name and last_name
        $goalUsers = GoalUser::where('goal_id', $upcomingGoal->id)
            ->with('user:id,first_name,last_name') // Load the user's first_name and last_name
            ->paginate(5);

        return view('admin.Report-info', compact('upcomingGoal', 'goalUsers'));
    }


    public function reportDetails($id, $userId, $goalId)
    {

        $recruitDetails = GoalUserTarget::where('goal_user_id', $id)
            ->where('goal_id', $goalId)
            ->paginate(5);

        $goal = GoalUser::where('goal_id', $goalId)->where('user_id', $userId)->first();

        $stats = $goal->stats();
        $user = User::where('id', $userId)->first();
        $upcomingGoal = AdminGoal::where('id', $goalId)->first();

        return view('admin.Report-details', compact('recruitDetails', 'user', 'upcomingGoal', 'stats'));
    }
}
