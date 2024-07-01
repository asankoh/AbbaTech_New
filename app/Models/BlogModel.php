<?php
namespace App\Models;
use CodeIgniter\Model;

class BlogModel extends Model {
    // match with database name
    protected $allowedFields = ["title", "description", "author", "date_published","date", "content"];
    protected $table = "blog";
}