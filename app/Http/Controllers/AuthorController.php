<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/authors",
     *   tags={"Author"},
     *   summary="AuthorController:list",
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    /**
     * @OA\Get(
     *   path="/api/authors/{id}",
     *   tags={"Author"},
     *   summary="AuthorController:show",
     *    @OA\Parameter(
     *       name="id",
     *       in="path",
     *       required=true,
     *       @OA\Schema(
     *           type="integer",
     *       )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/

    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }

    /**
     * @OA\Post(
     *   path="/api/authors/create",
     *   tags={"Author"},
     *   summary="AuthorController:create",
     *   @OA\RequestBody(
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *             example={
     *                 "name": "John Doe",
     *                 "email": "johndoe@gmail.com",
     *                 "github": "@johndoe",
     *                 "twitter": "johnDoe1",
     *                 "location": "texas,usa",
     *                 "latest_article_published": "2020-10-10"
     *              }
     *         )
     *     )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function create(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

        /**
     * @OA\Post(
     *   path="/api/authors/{id}",
     *   tags={"Author"},
     *   summary="AuthorController:update",
     *   @OA\Parameter(
     *       name="id",
     *       in="path",
     *       required=true,
     *       @OA\Schema(
     *           type="integer",
     *       )
     *   ),
     *   @OA\RequestBody(
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *             example={
     *                 "name": "John Doe",
     *                 "email": "johndoe@gmail.com",
     *                 "github": "@johndoe",
     *                 "twitter": "johnDoe1",
     *                 "location": "texas,usa",
     *                 "latest_article_published": "2020-10-10"
     *              }
     *         )
     *     )
     *   ),
     * 
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    /**
     * @OA\Delete(
     *   path="/api/authors/{id}",
     *   tags={"Author"},
     *   summary="AuthorController:destory",
     *   @OA\Parameter(
     *       name="id",
     *       in="path",
     *       required=true,
     *       @OA\Schema(
     *           type="integer",
     *       )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}