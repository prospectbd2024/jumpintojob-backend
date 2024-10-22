<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookMark;

class BookMarkController extends Controller
{
    // Fetch bookmarks for a specific user
    public function getBookMark($user_id)
    {
        $bookmarks = BookMark::where('user_id', $user_id)->get();

        return response()->json([
            'data' => $bookmarks,
            'message' => 'Bookmarks fetched successfully.'
        ], 200);
    }

    // Update bookmarks for a specific user
    public function updateBookMark(Request $request, $user_id)
    {
        // Assuming `job_id` is passed in the request for updating the bookmark
        $job_id = $request->input('job_id');

        $bookmark = BookMark::where('user_id', $user_id)
            ->where('job_id', $job_id)
            ->first();

        // If bookmark exists, delete it (unbookmark), otherwise create a new bookmark
        if ($bookmark) {
            $bookmark->delete();
            $message = 'Bookmark removed successfully.';
        } else {
            BookMark::create([
                'user_id' => $user_id,
                'job_id' => $job_id,
            ]);
            $message = 'Bookmark added successfully.';
        }

        // Return updated bookmarks
        $bookmarks = BookMark::where('user_id', $user_id)->get();

        return response()->json([
            'data' => $bookmarks,
            'message' => $message
        ], 200);
    }
}
