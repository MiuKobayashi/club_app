<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Announcement;

class DesireController extends Controller
{
    
    public function adminView(User $user, Schedule $schedule, Announcement $announcement)
    {
        //部員
        $users = $user->getMembers();
        $memberNames = User::pluck('name');
        
        $times = Schedule::getTimes();
        $startTime = $times['startTime'];
        $endTime = $times['endTime'];
        $Time = $times['Time'];
        
        //来月の全体の活動日
        $attendance = $schedule ->selectNextMonthLessons()
                                ->with('desires')->get();
        
        return view('lessons.admin')->with([
            'users' => $users,
            'memberNames' => $memberNames,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'Time' => $Time,
            'attendances' => $attendance,
            'announcements' => $announcement->getPaginateByLimit(),
            ]);

    }
    
    public function adminUserUpdate(Request $request, User $user)
    {
        $input = $request->input('adminUser');
        $user
        ->where('id', $input)
        ->update([
            'admin' => true
        ]);
        return redirect('/admin');
    }
}
