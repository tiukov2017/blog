<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Tag;

use Illuminate\Http\Request;

class AnalyticController extends Controller {
    
    public function analytic()
    {
        $tags = Tag::all();
        foreach($tags as $tag){
            $posts = $tag->posts;
            foreach($posts as $post){
                
                $pattern = '~(\w+)~';
                preg_match_all($pattern, strip_tags($post->body), $words);
                
                foreach($words[0] as $word){
                    if(isset($stats[$tag->tag][$word])){
                        $stats[$tag->tag][$word] = $stats[$tag->tag][$word]+1;
                    } else {
                        $stats[$tag->tag][$word] = 1;
                    }
                    
                }
            }
        }
        return view('analytic',['analytics'=>$stats]);
        //dd($stats);
    }

}
