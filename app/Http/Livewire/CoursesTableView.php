<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Actions\DeleteAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use LaravelViews\Actions\RedirectAction;
use Illuminate\Database\Eloquent\Builder;

class CoursesTableView extends TableView
{
    protected $paginate = 20;

    public $searchBy = ['code', 'name', 'year'];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
         return Course::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('Code')->sortBy('code'),
            Header::title('Name')->sortBy('name'),
            Header::title('Year')->sortBy('year'),
            Header::title('Credits')->sortBy('credits'),
            Header::title('Group')->sortBy('group'),
            Header::title('Semester')->sortBy('semester'),
            ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(Course $course): array
    {
        return [
            $course->code,
            $course->name,
            $course->year,
            $course->credits,
            $course->group,
            $course->semester,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new RedirectAction('courses.register', 'Register course', 'clipboard'),
            new RedirectAction('courses.show', 'See course', 'maximize-2'),
            new RedirectAction('courses.edit', 'Edit course', 'edit'),
            new DeleteAction(),
        ];
    }

}
