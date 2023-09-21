<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Project;
use App\Models\ProjectEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectEmployee>
 */
class ProjectEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $employeeIds = Employee::all()->pluck('id');
        $projectIds = Project::all()->pluck('id');

        $projectEmployees = [];

        foreach ($employeeIds as $employeeValue) {
            foreach ($projectIds as $projectValue) {
                array_push($projectEmployees, $employeeValue . '-' . $projectValue);
            }
        }

        $employeeIdProjectId = fake()->unique()->randomElement($projectEmployees);
        $employeeIdProjectId = explode('-', $employeeIdProjectId);
        $employeeId = $employeeIdProjectId[0];
        $projectId = $employeeIdProjectId[1];

        $start_date = fake()->dateTimeBetween('-3 years', '1 years');
        $end_date = fake()->dateTimeBetween('-2 years', '1 years');
        if ($end_date < $start_date) {
            $end_date = $start_date;
        }

        return [
            'employee_id' => $employeeId,
            'project_id' => $projectId,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => rand(1, 2),
        ];
    }
}
