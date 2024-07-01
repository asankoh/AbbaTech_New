<?php
namespace App\Models;
use CodeIgniter\Model;

class FeaturedBlogModel extends Model {
    // match with database name
    protected $allowedFields = ["title", "description", "author", "date_published", "content"];
    protected $table = "featured_blog";
}


