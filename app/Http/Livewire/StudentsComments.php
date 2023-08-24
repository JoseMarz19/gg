<?php


namespace App\Http\Livewire;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class StudentsComments extends Component
{
    use WithFileUploads;

    public $course, $currentLessonId, $comments;
    public $newComment, $editCommentId, $editedComment, $image, $replyToCommentId;
    public $replyComment = '';


    public function mount(Course $course, $currentLessonId)
    {
        $this->course = $course;
        $this->currentLessonId = $currentLessonId;
    }

    public function render()
    {
        // Simplificar la consulta utilizando el método where
        $this->comments = Comment::where('course_id', $this->course->id)
            ->where('lesson_id', $this->currentLessonId)
            ->get();

        return view('livewire.students-comments');
    }

    public function saveComment()
    {
        $this->validate([
            'newComment' => 'required'
        ]);

        $userId = auth()->user()->id;
        $courseId = $this->course ? $this->course->id : null;
        $lessonId = $this->currentLessonId;
        $imagePath = null;

        if ($this->replyToCommentId) {
            // ... (código existente)
            $commentData['comment'] = $this->replyComment;
            // ... (código existente)

            $this->replyToCommentId = null;
            $this->replyComment = ''; // Limpia el campo de respuesta después de guardar
        }

        if ($this->image) {
            $imagePath = $this->image->store('images/comments', 'public');
        }

        $commentData = [
            'comment' => $this->newComment,
            'user_id' => $userId,
            'course_id' => $courseId,
            'lesson_id' => $lessonId,
        ];

        if ($imagePath) {
            $commentData['image_path'] = $imagePath;
        }

        if ($this->replyToCommentId) {
            $parentComment = Comment::find($this->replyToCommentId);

            if ($parentComment) {
                $commentData['parent_comment_id'] = $parentComment->id;
            }
        }

        Comment::create($commentData);

        $this->newComment = '';
        $this->image = null;
        $this->replyToCommentId = null;

        session()->flash('success', '¡Comentario guardado exitosamente!');
    }



    public function deleteComment($commentId)
    {
        // Verificar si el comentario pertenece al usuario autenticado antes de eliminarlo
        $comment = Comment::find($commentId);
        if ($comment && $comment->user_id === auth()->user()->id) {
            $comment->delete();
        }
    }

    public function editComment($commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment && $comment->user_id === auth()->user()->id) {
            $this->editCommentId = $commentId;
            $this->editedComment = $comment->comment;
        }
    }

    public function saveEditedComment()
    {
        $comment = Comment::find($this->editCommentId);
        if ($comment && $comment->user_id === auth()->user()->id) {
            $comment->update(['comment' => $this->editedComment]);
            $this->editCommentId = null;
            $this->editedComment = '';
        }
    }

    public function cancelEditComment()
    {
        $this->editCommentId = null;
        $this->editedComment = '';
    }

    public function clearImage()
    {
        $this->image = null;
    }

    public function replyToComment($commentId)
    {
        $this->replyToCommentId = $commentId;
    }

    public function cancelReply()
    {
        $this->replyToCommentId = null;
        $this->newComment = '';
    }

    public function startReply($commentId)
    {
        $this->replyToCommentId = $commentId;
        $this->replyComment = ''; // Limpia el campo de respuesta cuando se inicia una respuesta
    }

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


}
