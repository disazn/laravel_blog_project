<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Http\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    /**
     * @var BlogService
     */

    private BlogService $service;

    /**
     * Constructor
     * @param BlogService $service
     */


    public function __construct(BlogService $service)
    {
        $this->service=$service;
    }

    /**
     * Create
     *
     * @param BlogPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function create(BlogPostRequest $request)
    {
        $data = $request->validated();

        $this->service->create($data);

        return redirect()->route('home')->with('success','Блог успешно сохранен');
    }

    /**
     * My Blog
     *
     * @return View
     */
    public function myBlog(Request $request)
    {
        $sort = $request->get('sort');

//        dd(); //function tekseru

        $data = $this->service->myBlog($sort);

        return view('my-Blog' , compact('data'));
    }

    /**
     * One Blog Page
     *
     * @return View
     */
    public function oneBlog(int $id)
    {
        $blog = $this->service->oneBlog($id);

        return view('one-blog', compact('blog'));
    }

    /**
     * One blog Update page
     *
     * @return View
     */
    public function oneBlogUpdate(int $id)
        {
            $blog = $this->service->oneBlog($id);

            return view('one-blog-update', compact('blog'));
        }

    /**
    * One blog Update
    *
    * @return View
    */
        public function oneBlogUpdatePost( int $id, BlogPostRequest $request)
            {
                $data = $request->validated();

                $data['id'] = $id;

                $this->service->oneBlogUpdate($data);

                $blog = $this->service->oneBlog($id);

                return view('one-blog', compact('blog'));
            }

    /**
    *
    * One blog Delete
    *
    * @return View
    */
        public function oneBlogDelete( int $id)
            {
                $this->service->oneBlogDelete($id);

                $data = $this->service->myBlog();

                return view('my-Blog' , compact('data'));
            }

}
