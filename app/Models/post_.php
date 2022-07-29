<?php

namespace App\Models;



class post 
{
    private static $blog_posts = [
        [
            "title"=>"Artikel post pertama",
            "slug"=>"artikel-post-pertama",
            "author"=>"Tedy wibisono",
            "artikel"=>"    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum consequuntur ipsam debitis illo animi odit aperiam, ea unde molestiae necessitatibus, enim, sunt doloribus. Asperiores ut numquam sapiente nobis eum dolorum consequatur rem fugit temporibus quaerat beatae vitae repudiandae, expedita aliquid quos ad atque ea eos. Expedita quaerat nulla dignissimos obcaecati fuga asperiores, explicabo eum nihil ipsa ea perferendis in cum autem aliquam voluptas id, dolorum dicta ut ullam quisquam nisi animi laboriosam est. Modi blanditiis dolor pariatur ut in, eveniet nobis quisquam explicabo fuga debitis et neque dicta animi ea quidem consequuntur quibusdam? Cupiditate pariatur quas illum. Dolores corrupti optio ex excepturi nobis minima est iste ipsam nostrum cum, veritatis, a amet vel alias facilis unde esse. Sint nostrum similique facere, vero sit aliquam, delectus tempora quam enim suscipit perferendis culpa atque, totam quasi. Voluptate dolorum fugit, sit vero quasi ipsam quod sunt odio architecto aliquam inventore aut in quia."
        ],
        [
            "title"=>"Artikel post kedua",
            "slug"=>"artikel-post-kedua",
            "author"=>"Bowo sudrajad",
            "artikel"=>"    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum consequuntur ipsam debitis illo animi odit aperiam, ea unde molestiae necessitatibus, enim, sunt doloribus. Asperiores ut numquam sapiente nobis eum dolorum consequatur rem fugit temporibus quaerat beatae vitae repudiandae, expedita aliquid quos ad atque ea eos. Expedita quaerat nulla dignissimos obcaecati fuga asperiores, explicabo eum nihil ipsa ea perferendis in cum autem aliquam voluptas id, dolorum dicta ut ullam quisquam nisi animi laboriosam est. Modi blanditiis dolor pariatur ut in, eveniet nobis quisquam explicabo fuga debitis et neque dicta animi ea quidem consequuntur quibusdam? Cupiditate pariatur quas illum. Dolores corrupti optio ex excepturi nobis minima est iste ipsam nostrum cum, veritatis, a amet vel alias facilis unde esse. Sint nostrum similique facere, vero sit aliquam, delectus tempora quam enim suscipit perferendis culpa atque, totam quasi. Voluptate dolorum fugit, sit vero quasi ipsam quod sunt odio architecto aliquam inventore aut in quia."
        ]
        ];
    public static function all(){
        return collect(self::$blog_posts); 
    }
    public static function find($slug)
    {
        $post= static::all();

        return $post->firstWhere('slug' , $slug);
    }
}