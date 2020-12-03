<?php

namespace App\Services;

use App\Lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CalendarServiceForTeacher
{
    public function generateCalendarData($weekDays,$EMP_ID)
    {
      //  dd($weekDays);
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
    // dd($timeRange);
    $lessons= DB::table('kelex_timetables')
    ->leftJoin('kelex_employees', 'kelex_timetables.EMP_ID', '=', 'kelex_employees.EMP_ID')
    ->leftJoin('kelex_classes', 'kelex_timetables.CLASS_ID', '=', 'kelex_classes.Class_id')
    ->leftJoin('kelex_sections', 'kelex_timetables.SECTION_ID', '=', 'kelex_sections.Section_id')
    ->leftJoin('kelex_subjects', 'kelex_timetables.SUBJECT_ID', '=', 'kelex_subjects.SUBJECT_ID')
    ->where('kelex_timetables.EMP_ID', '=',$EMP_ID)
    ->where('kelex_sections.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))
    ->select('kelex_classes.*','kelex_employees.*','kelex_timetables.*','kelex_subjects.SUBJECT_NAME')
    ->get();
        // dd($lessons);
        foreach ($timeRange as $time)
        {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];

            foreach ($weekDays as $index => $day)
            {
                $lesson = $lessons->where('DAY', $index)->where('TIMEFROM', $time['start'])->first();
            // dd($lesson);
                if ($lesson)
                { 
                    
                    array_push($calendarData[$timeText], [
                        'class_name'   => $lesson->Class_name,
                        'teacher_name' => $lesson->EMP_NAME,
                        'subject_name' => $lesson->SUBJECT_NAME,
                      
                    ]);
                   
                }
                else if (!$lessons->where('DAY', $index)->where('TIMEFROM', '<', $time['start'])->where('TIMETO', '>=', $time['end'])->count())
                {

                    array_push($calendarData[$timeText], 1);
                  
                }
                else
                {
                    array_push($calendarData[$timeText], 0);
                    
                } //dd($calendarData);
            }
        }
 //dd($calendarData);
        return $calendarData;
    }
}
