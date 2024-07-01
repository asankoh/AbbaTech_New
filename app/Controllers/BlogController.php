<?php

namespace App\Controllers;
use App\Models\BlogModel;
use App\Models\FeaturedBlogModel;
use App\Models\CommentModel;
use App\Models\FeaturedCommentModel;

class BlogController extends BaseController {

    public function create(){
        $model = new \App\Models\CommentModel();
        // $featuredModel = new \App\Models\FeaturedCommentModel;
        $data= $this->request->getPost();
        $model->insert($data);
        dd($model->insertID());
    }

    
    public function HomeIndex(): string{
        $model = new FeaturedBlogModel;
        $data = $model->findAll();

        return view("Home/index.php", ["featured_blog"=> $data]);
    }

    public function AboutIndex(): string{
        return view("About/index.php");
    }

    public function HomeDetail($id){
        $model = new FeaturedBlogModel;
        // $featuredModel = new FeaturedCommentModel;
        $featured_blog = $model->find($id);

        $patternTagStyling = [
            '/\[([^\]]+)\]/' => '<code>$1</code>',    // Wrap text inside square brackets with <code> tags
            '/\!([^?]+)\?/' => '<h2>$1</h2>',  // Wrap text inside curly braces with <strong> tags
            // '/\[img:([^\]]+)\]/' => function ($matches) {
            //     $filename = $matches[1];
            //     $imagePath = "../../img/{$filename}";
            // },
        ];

        // $comments = $featuredModel->where('featured_blog_id', $id)->findAll();
        // Perform text processing (e.g., wrap code blocks) on blog content
        $styledContent = $this->processBlogContent($featured_blog['content'], $patternTagStyling);


        return view("Home/detail.php", ["blog" => $featured_blog, "styledContent" => $styledContent]);

    }

    
public function BlogIndex(): string
{
    // Instantiate BlogModel to retrieve all blog posts
    $blogModel = new BlogModel();
    $blogs = $blogModel->findAll();
    // $comments = $commentModel->where('blog_id', $blogId)->findAll();


    // Pass blog data (including comments) to the view for display
    return view('Blogs/index.php', ['blogs' => $blogs]);
}

    public function BlogDetail($id) {
        $blogModel = new BlogModel;
        $commentModel = new CommentModel();

        $blog = $blogModel->find($id);

        $patternTagStyling = [
            '/\[([^\]]+)\]/' => '<code>$1</code>',    // Wrap text inside square brackets with <code> tags
            '/\!([^?]+)\?/' => '<h2>$1</h2>',  // Wrap text inside curly braces with <strong> tags
            '/\%([^?]+)\%/' => '<ol>$1</ol>',
            // '/\<([^>]+)\>/' => '<em>$1</em>'           // Wrap text inside angle brackets with <em> tags
        ];
        // Perform text processing (e.g., wrap code blocks) on blog content
        $comments = $commentModel->where('blog_id', $id)->findAll();

        $styledContent = $this->processBlogContent($blog['content'], $patternTagStyling);

        return view("Blogs/detail.php", ["blog" => $blog, "styledContent" => $styledContent, "comments" => $comments]);
        }

    // Private method to process blog content (wrap text in square brackets with <h1> tags)
        private function processBlogContent($content, $patternTagStyling) {
        // Process each pattern-tag pair sequentially using preg_replace()
        foreach ($patternTagStyling as $pattern => $replacement) {
            $content = preg_replace($pattern, $replacement, $content);
        }

        return $content;
    }
}
  