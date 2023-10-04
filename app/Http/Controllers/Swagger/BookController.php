<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/books",
 *     summary="Получить все книги",
 *     tags={"Book"},
 *          @OA\Parameter(
 *          name="page",
 *          in="query",
 *          description="Номер страницы",
 *          required=false,
 *          @OA\Schema(
 *              type="integer",
 *              default=1
 *          )
 *      ),
 *     @OA\RequestBody(
 *         request="GET",
 *         description="Get books",
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Post(
 *      path="/api/books/",
 *      summary="Добавить книгу с указанием авторов",
 *      tags={"Book"},
 *      @OA\RequestBody(
 *          request="POST",
 *          description="Create book",
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="title", type="string", example="Понедельник начинается в субботу"),
 *                      @OA\Property(property="description", type="string", example="Но что страннее, что непонятнее всего, это то, как авторы могут брать подобные сюжеты, признаюсь, это уж совсем непостижимо, это точно… нет, нет, совсем не понимаю."), *
 *                      @OA\Property(property="published_at", type="date", example="2023-10-04"),
 *                      @OA\Property(property="authors", type="array, integers", example="[1,2,3]")
 *                  ),
 *             }
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="title", type="string", example="Понедельник начинается в субботу"),
 *              @OA\Property(property="description", type="string", example="Но что страннее, что непонятнее всего, это то, как авторы могут брать подобные сюжеты, признаюсь, это уж совсем непостижимо, это точно… нет, нет, совсем не понимаю."), *
 *              @OA\Property(property="published_at", type="date", example="2023-10-04"),
 *          )
 *      ),
 * ),
 * @OA\Get(
 *      path="/api/books/{book}",
 *      summary="Get book",
 *      tags={"Book"},
 *      @OA\Parameter(
 *          description="ID книги",
 *          in="path",
 *          name="book",
 *          required=true,
 *          example=1
 *      ),
 *      @OA\RequestBody(
 *          request="GET",
 *          description="Get book",
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Ok"
 *      ),
 *  ),
 *
 * @OA\Put(
 *       path="/api/books/{book}",
 *       summary="Update book, Under maintanance",
 *       tags={"Book"},
 *       @OA\RequestBody(
 *           request="Put",
 *           description="Update book",
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="Ok"
 *       ),
 * ),
 *
 * @OA\Delete(
 *        path="/api/books/{book}",
 *        summary="Списать книгу",
 *        tags={"Book"},
 *        @OA\Parameter(
 *            description="ID книги",
 *            in="path",
 *            name="book",
 *            required=true,
 *            example=5
 *        ),
 *        @OA\RequestBody(
 *            request="Delete",
 *            description="Delete book",
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="Ok"
 *        ),
 * ),
 **/
class BookController extends Controller
{
}
