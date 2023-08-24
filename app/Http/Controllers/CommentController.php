<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Course;

class CommentController extends Controller
{
    public function saveReply()
{
    $this->validate([
        'replyComment' => 'required'
    ]);

    $userId = auth()->user()->id;
    $courseId = $this->course ? $this->course->id : null;
    $lessonId = $this->currentLessonId;
    $parentComment = Comment::find($this->replyToCommentId);

    Comment::create([
        'comment' => $this->replyComment,
        'user_id' => $userId,
        'course_id' => $courseId,
        'lesson_id' => $lessonId,
        'parent_comment_id' => $parentComment->id, // Establecer el parent_comment_id aquí
    ]);

    $this->replyToCommentId = null;
    $this->replyComment = '';

    session()->flash('success', '¡Respuesta guardada exitosamente!');
}

public function showComments()
{
    $comments = Comment::all(); // Obtén todos los comentarios
    $responses = $comments->whereNotNull('parent_comment_id'); // Filtra solo respuestas

    return view('studens-comments', ['responses' => $responses]);
}

}
