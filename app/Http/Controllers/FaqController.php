<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$users = DB::table('users')
            ->select(DB::raw('count(*) as user_count, status'))
            ->where('status', '<>', 1)
            ->groupBy('status')
            ->get();*/

       /* $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();*/

       /* $users = DB::table('users')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();*/


       /* return $constituencies = DB::table('constituencies')
            ->select(DB::raw('count(*) as con_count, ctype_id'))
            ->groupBy('ctype_id')
            ->get();*/

       /* return $constituencies = DB::table('constituencies')
            ->join('states','states.id','=','constituencies.state_id')
            ->select('constituencies.pc_name','states.name2')
            ->get();*/

       /* $categories = Category::select(DB::raw('categories.*, count(*) as `aggregate`'))
            ->join('pictures', 'categories.id', '=', 'pictures.category_id')
            ->groupBy('category_id')
            ->orderBy('aggregate', 'desc')
            ->paginate(10);
        */

       /* return $tags = Tag::select(DB::raw('tags.*'))
            ->join('faqs','tags.id','=','faqs.tag_id')
            //->groupBy('tag_id')
            ->orderBy('faqs.que_order','desc')
            ->get();*/

        /*return $tags = Tag::select(DB::raw('tags.*'))
            ->join('faqs','tags.id','=','faqs.tag_id')
            ->select('tags.id','tags.name','faqs.*')
            ->orderBy('faqs.que_order','asc')
            ->groupBy('tag_id')
            ->get();*/

       /* $faqs = Faq::with('tags')->groupBy('order')->orderBy('que_order')->get();
        return $faqs;*/



       /*return $faqs = DB::table('faqs')
           ->join('tags','tags.id','=','faqs.tag_id')
           ->select(DB::raw('count(*) as user_count, status'))
           //->select('tags.order as order')
           ->orderBy('faqs.que_order')
           ->groupBy('tags.tag_id')
           ->get();
*/

        $tags = Tag::with(['faqs' => function($query){
            $query->orderBy('que_order','asc');
        }])->orderBy('order','asc')
            ->get();

        return $tags;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
