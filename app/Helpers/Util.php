<?php

namespace App\Helpers;

use App\Models\CourseMark;
use App\Models\CourseUser;
use App\Models\CourseModule;
use Illuminate\Support\Facades\Auth;



class Util {

    public static function get_course_units()
     {
         return CourseUser::where('user_id', Auth::user()->id)->get();
     }

     public static function get_grade($mark): string
     {
        switch ($mark) {
            case ($mark > 69):
                return "A";
            case ($mark > 59):
                return "B";
            case ($mark > 49):
                return "C";
            case ($mark > 39):
                return "D";
            case ($mark < 40):
                return "E";
            default:
                return "Null";
        }
     }

     public static function get_gpa()
     {
         try
         {
             $gpa_total = self::get_gpa_total();
             $courses = self::get_course_units();
             $no_of_courses = count($courses);
             return $gpa_total / $no_of_courses;
         } catch (\Exception $e) {
             return 0;
         }
     }

     public static function get_gpa_total(): int
     {
        $courses = CourseUser::where('user_id', Auth::user()->id)->get();
        $gpa_total = 0;
        foreach ($courses as $course)
        {
            $course_modules = CourseModule::where('course_id', $course->course_id)->get();
            $total = 0;
            if($course_modules)
                {
                    foreach($course_modules as $course_module)
                    {
                        $course_mark = CourseMark::where([
                            ['course_module_id', '=', $course_module->id],
                            ['user_id', '=', Auth::user()->id],
                        ])->first();
                        if($course_mark)
                        {
                            $course_module['score'] = $course_mark->score;
                            $marks =  ($course_module['score'] * ( $course_module['weight'] * 100)) /  $course_module['maximum_score'];
                            $total += $marks;
                            $course['total'] = number_format((float)$total, 2, '.', '');
                            $course['grade'] = self::get_grade($course['total']);
                        }
                    }
                    $gpa_total += $course['total'];
                }
        }

        return  $gpa_total;
     }

}
