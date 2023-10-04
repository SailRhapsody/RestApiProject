<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
/**
* @OA\Post(
 *      path="/api/loans/",
 *      summary="Выдать книгу",
 *      tags={"Loans"},
 *      @OA\RequestBody(
 *          request="POST",
 *          description="Create loan",
 *          @OA\JsonContent(
 *              allOf={
    *                  @OA\Schema(
 *                      @OA\Property(property="book_id", type="integer", example=1),
 *                      @OA\Property(property="reader_id", type="integer", example=2),
 *                      @OA\Property(property="return_date", type="date", example="2023-10-04"),
    *                  ),
 *             }
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
*               @OA\Property(property="book_id", type="integer", example=1),
 *              @OA\Property(property="reader_id", type="integer", example=2),
 *              @OA\Property(property="return_date", type="date", example="2023-10-04"),
 *          ),
 *      ),
 * ),
 **/
class LoanController extends Controller
{
}
