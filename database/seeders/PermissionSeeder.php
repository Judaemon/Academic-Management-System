<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    // potential permissions
    // enroll_student | admit_student
    // enroll_self

    public function run()
    {
        $user_permissions = [
            'view_users',
            'create_student',
            'create_account',
            'read_user',
            'update_user',
            'delete_user',
        ];

        foreach ($user_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $role_permissions = [
            'view_roles',
            'create_role',
            'read_role',
            'update_role',
            'delete_role',
            'assign_role',
        ];

        foreach ($role_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $setting_permissions = [
            'view_setting',
            'update_setting',
        ];

        foreach ($setting_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $fee_permissions = [
            'create_fee',
            'update_fee',
            'delete_fee',
            'view_fees',
        ];

        foreach ($fee_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $payment_permissions = [
            'read_payment',
            'create_payment',
            'delete_payment',
            'view_payments',
        ];

        foreach ($payment_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $academic_year_permissions = [
            'view_academic_year',
            'create_academic_year',
            'update_academic_year',
            'delete_academic_year',
        ];

        foreach ($academic_year_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $announcement_permissions = [
            'view_announcement',
            'create_announcement',
            'update_announcement',
            'delete_announcement',
        ];

        foreach ($announcement_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $grade_level_permissions = [
            'view_grade_levels',
            'create_grade_level',
            'read_grade_level',
            'update_grade_level',
            'delete_grade_level',
        ];

        foreach ($grade_level_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $section_permissions = [
            'view_sections',
            'create_section',
            'read_section',
            'update_section',
            'delete_section',
        ];

        foreach ($section_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $subject_permissions = [
            'view_subjects',
            'create_subject',
            'read_subject',
            'update_subject',
            'delete_subject',
        ];

        foreach ($subject_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $teacher_permissions = [
            //'view_grades',
            'assign_grades',
            'create_grade',
            'read_grade',
            'update_grade',
            'delete_grade',

            'view_sections',
            'read_section',

            'view_users',
            'read_user',

            'change_password',
        ];

        foreach ($teacher_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $student_permissions = [
            'view_grades',
            'read_grade',

            'view_users',
            'read_user',

            'change_password',
        ];

        foreach ($student_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
