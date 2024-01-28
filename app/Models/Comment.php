<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function reply()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    //Para permitir respuestas a un comentario.

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getContent()
    {
        return $this->attributes['content'];
    }

    public function setContent($content)
    {
        $this->attributes['content'] = $content;
    }

    public function getPosted()
    {
        return $this->attributes['posted'];
    }

    public function setPosted($posted)
    {
        $this->attributes['posted'] = $posted;
    }

}
