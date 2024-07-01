<?php
namespace App\Models;
use CodeIgniter\Model;

class CommentModel extends Model{
    protected $allowedFields = ["comment", "blog_id"];
    protected $table = "comments";
}