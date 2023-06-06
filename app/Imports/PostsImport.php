<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToModel, WithHeadingRow
{
    /**
     * Create a new post instance after importing.
     *
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $post = new Post([
            'title' => $row['title'],
            'description' => $row['description'],
            'file' => $row['file'],
        ]);
        $post->save();

        return $post;
    }
}
