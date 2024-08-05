<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.comments.';
    public function index()
    {
        $data = Comment::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            return redirect()->route('comments.index')->with('success', 'Xóa thành công comment');
        } catch (\Exception $e) {
            Log::error('Lỗi xóa comment: ' . $e->getMessage());
            return back()->with('error', 'Lỗi xóa comment');
        }
    }
}
