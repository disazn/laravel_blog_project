<?php

namespace App\Http\Services;

use App\Models\BlogModel;
use Ramsey\Collection\Collection;
use function PHPUnit\Framework\returnArgument;

class BlogService
{

    /**
     * Create
     *
     * @param array $data
     * @return BlogModel
     */

    public function create(array $data): BlogModel
    {

        $blogData ['message']  = $data['message'];
        $blogData ['name']     = auth()->user()->name;
        $blogData ['email']    = auth()->user()->email;

        return BlogModel::create($blogData);

    }

    /**
     * My Blog
     */

    public function myBlog($sort)
    {
        return  BlogModel::where('email', auth()->user()->email)->orderBy('created_at', $sort)->get();

    }

    /**
     * One Blog
     *
     * @param  int $id id
     */
    public function oneBlog(int $id)
    {
        return BlogModel::find($id);    // select * from blogs where id = $id (1, 2, ..any);
                                                     // eloquent orm
    }

    /**
     * One Blog update by data
     *
     *
     * @param  array $data Data
     */
    public function oneBlogUpdate(array $data)
    {

        $blog = BlogModel::find($data['id']);

        $blog->message = $data['message'];

        $blog->save();
                                                     // eloquent orm
    }

    /**
     * One Blog delete by id
     *
     *
     * @param  int $id id
     */
    public function oneBlogDelete(int $id)
    {
       return BlogModel::find($id)->delete();

                                                     // eloquent orm
    }

}
