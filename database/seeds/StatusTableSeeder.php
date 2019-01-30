<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = [
            [
                'id' => 1,
                'name' => 'open',
                'display_name' => 'Open',
                'display_order' => 1,
                'whose' => 'exam',
            ],
            [
                'id' => 2,
                'name' => 'close',
                'display_name' => 'Close',
                'display_order' => 2,
                'whose' => 'exam',
            ],
            [
                'id' => 3,
                'name' => 'pending',
                'display_name' => 'Pending',
                'display_order' => 1,
                'whose' => 'exam_user',
            ],
            [
                'id' => 4,
                'name' => 'ongoing',
                'display_name' => 'Ongoing',
                'display_order' => 2,
                'whose' => 'exam_user',
            ],
            [
                'id' => 5,
                'name' => 'complete',
                'display_name' => 'Complete',
                'display_order' => 3,
                'whose' => 'exam_user',
            ],
            [
                'id' => 6,
                'name' => 'expired',
                'display_name' => 'Expired',
                'display_order' => 4,
                'whose' => 'exam_user',
            ],
            [
                'id' => 7,
                'name' => 'inactive',
                'display_name' => 'Inactive',
                'display_order' => 5,
                'whose' => 'exam_user',
            ],
            [
                'id' => 8,
                'name' => 'available',
                'display_name' => 'Available',
                'display_order' => 1,
                'whose' => 'question',
            ],
            [
                'id' => 9,
                'name' => 'expired',
                'display_name' => 'Expired',
                'display_order' => 2,
                'whose' => 'question',
            ],
            [
                'id' => 10,
                'name' => 'draft',
                'display_name' => 'Draft',
                'display_order' => 1,
                'whose' => 'course',
            ],
            [
                'id' => 11,
                'name' => 'published',
                'display_name' => 'Published',
                'display_order' => 2,
                'whose' => 'course',
            ],
            [
                'id' => 12,
                'name' => 'expired',
                'display_name' => 'Expired',
                'display_order' => 3,
                'whose' => 'course',
            ],
            [
                'id' => 13,
                'name' => 'pending',
                'display_name' => 'Pending',
                'display_order' => 1,
                'whose' => 'course_user',
            ],
            [
                'id' => 14,
                'name' => 'ongoing',
                'display_name' => 'Ongoing',
                'display_order' => 2,
                'whose' => 'course_user',
            ],
            [
                'id' => 15,
                'name' => 'complete',
                'display_name' => 'Complete',
                'display_order' => 3,
                'whose' => 'course_user',
            ],
            [
                'id' => 16,
                'name' => 'expired',
                'display_name' => 'Expired',
                'display_order' => 4,
                'whose' => 'course_user',
            ],
            [
                'id' => 17,
                'name' => 'inactive',
                'display_name' => 'Inactive',
                'display_order' => 5,
                'whose' => 'course_user',
            ],
            [
                'id' => 18,
                'name' => 'complete',
                'display_name' => 'Complete',
                'display_order' => 1,
                'whose' => 'content_user',
            ],
            [
                'id' => 19,
                'name' => 'incomplete',
                'display_name' => 'Incomplete',
                'display_order' => 2,
                'whose' => 'content_user',
            ],
            [
                'id' => 20,
                'name' => 'favorited',
                'display_name' => 'Wishlist',
                'display_order' => 6,
                'whose' => 'course_user',
            ],

            [
                'id' => 21,
                'name' => 'open',
                'display_name' => 'open',
                'display_order' => 1,
                'whose' => 'liveclass',
            ],

            [
                'id' => 22,
                'name' => 'close',
                'display_name' => 'close',
                'display_order' => 2,
                'whose' => 'liveclass',
            ],

            [
                'id' => 23,
                'name' => 'pending',
                'display_name' => 'pending',
                'display_order' => 1,
                'whose' => 'liveclass_users',
            ],

            [
                'id' => 24,
                'name' => 'ongoing',
                'display_name' => 'ongoing',
                'display_order' => 2,
                'whose' => 'liveclass_users',
            ],

            [
                'id' => 25,
                'name' => 'complete',
                'display_name' => 'complete',
                'display_order' => 3,
                'whose' => 'liveclass_users',
            ],

            [
                'id' => 26,
                'name' => 'expired',
                'display_name' => 'expired',
                'display_order' => 4,
                'whose' => 'liveclass_users',
            ],
        ];
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
